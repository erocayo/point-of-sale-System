<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sale_Transaction_Model extends Model
{
public function Update_Total_Price($SALE_TRANSACTION_ID)
{
    $details = DB::table('sale_transaction_details as std')
        ->join('product as p', 'std.PRODUCT_ID', '=', 'p.PRODUCT_ID')
        ->join('product_category as pc', 'p.PRODUCT_CATEGORY_ID', '=', 'pc.PRODUCT_CATEGORY_ID')
        ->select('std.UNIT_PRICE', 'std.QUANTITY', 'pc.TAX_RATE')
        ->where('std.SALE_TRANSACTION_ID', $SALE_TRANSACTION_ID)
        ->get();

    $totalPrice = 0;
    foreach ($details as $d) {
        $subtotal = $d->UNIT_PRICE * $d->QUANTITY;
        $tax = $subtotal * ($d->TAX_RATE / 100);
        $totalPrice += $subtotal + $tax;
    }

    // Update transaction total including tax
    DB::table('sale_transaction')
        ->where('SALE_TRANSACTION_ID', $SALE_TRANSACTION_ID)
        ->update(['TOTAL_PRICE' => $totalPrice]);
}



    public function Get_All_Sale_Transaction()
    {
        return DB::table('sale_transaction as st')
            ->join('user as u', 'u.USER_ID', '=', 'st.USER_ID')
            ->select(
                'st.*',
                'u.USERNAME'
            )
            ->get();
    }
    public function Get_Pending_Sale_Transaction()
    {
        return DB::table('sale_transaction as st')
            ->join('user as u', 'u.USER_ID', '=', 'st.USER_ID')
            ->select(
                'st.*',
                'u.USERNAME'
            )
            ->where('st.STATUS', 'pending')
            ->get();
    }

    public function Set_New_Sale_Transaction($USER_ID, $TOTAL_PRICE, $STATUS)
    {
        DB::insert(
            'INSERT INTO sale_transaction (USER_ID, TOTAL_PRICE, STATUS) VALUES (?, ?, ?)',
            [$USER_ID, $TOTAL_PRICE, $STATUS]
        );

        return DB::getPdo()->lastInsertId();
    }
public function Get_Specific_Sale_Transaction($SALE_TRANSACTION_ID)
{
    return DB::table('sale_transaction as st')
        ->join('user as u', 'u.USER_ID', '=', 'st.USER_ID')
        ->select(
            'st.*',
            'u.USERNAME'
        )
        ->where('st.SALE_TRANSACTION_ID', $SALE_TRANSACTION_ID)
        ->first();
}


    public function Update_Transaction_Status($SALE_TRANSACTION_ID, $STATUS)
    {
        return DB::update(
            'UPDATE sale_transaction SET STATUS = ? WHERE SALE_TRANSACTION_ID = ?',
            [$STATUS, $SALE_TRANSACTION_ID]
        );
    }

public function Get_Monthly_Sale_Summary_With_Totals()
{
    return DB::table('sale_transaction as st')
        ->join('sale_transaction_details as std', 'st.SALE_TRANSACTION_ID', '=', 'std.SALE_TRANSACTION_ID')
        ->join('product as p', 'p.PRODUCT_ID', '=', 'std.PRODUCT_ID')
        ->join('product_category as pc', 'pc.PRODUCT_CATEGORY_ID', '=', 'p.PRODUCT_CATEGORY_ID')
        ->join('sale_transaction_log as log', function($join) {
            $join->on('st.SALE_TRANSACTION_ID', '=', 'log.SALE_TRANSACTION_ID')
                 ->where('log.ACTION_TYPE', 'confirmed');
        })
        ->select(
            DB::raw("DATE_FORMAT(log.created_at, '%Y-%m') AS month"),
            DB::raw("COUNT(DISTINCT st.SALE_TRANSACTION_ID) AS transaction_count"),
            DB::raw("SUM(std.UNIT_PRICE * std.QUANTITY) AS subtotal"),
            DB::raw("SUM((std.UNIT_PRICE * std.QUANTITY) * (pc.TAX_RATE / 100)) AS tax_amount"),
            DB::raw("SUM((std.UNIT_PRICE * std.QUANTITY) * (1 + pc.TAX_RATE / 100)) AS line_total")
        )
        ->where('st.STATUS', 'completed')
        ->groupBy('month')
        ->orderBy('month', 'ASC')
        ->get();
}

public function Get_This_Month_Transactions()
    {
        // Get the first and last day of current month
        $start = date('Y-m-01 00:00:00');
        $end   = date('Y-m-t 23:59:59');

        return DB::table('sale_transaction as st')
            ->join('sale_transaction_log as log', function($join){
                $join->on('st.SALE_TRANSACTION_ID', '=', 'log.SALE_TRANSACTION_ID')
                     ->where('log.ACTION_TYPE', 'confirmed');
            })
            ->join('sale_transaction_details as std', 'st.SALE_TRANSACTION_ID', '=', 'std.SALE_TRANSACTION_ID')
            ->join('product as p', 'p.PRODUCT_ID', '=', 'std.PRODUCT_ID')
            ->join('product_category as pc', 'pc.PRODUCT_CATEGORY_ID', '=', 'p.PRODUCT_CATEGORY_ID')
            ->select(
                'st.SALE_TRANSACTION_ID',
                'st.USER_ID',
                'st.STATUS',
                DB::raw("log.created_at as confirmed_at"),
                'std.PRODUCT_ID',
                'p.PRODUCT_NAME',
                'std.UNIT_PRICE',
                'std.QUANTITY',
                DB::raw("(std.UNIT_PRICE * std.QUANTITY) as subtotal"),
                DB::raw("((std.UNIT_PRICE * std.QUANTITY) * (pc.TAX_RATE / 100)) as tax_amount"),
                DB::raw("((std.UNIT_PRICE * std.QUANTITY) * (1 + pc.TAX_RATE / 100)) as line_total")
            )
            ->whereBetween('log.created_at', [$start, $end])
            ->where('st.STATUS', 'completed')
            ->orderBy('log.created_at', 'DESC')
            ->get();
    }
}