<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class transaction_details_model extends Model
{
public function Get_All_Sale_Transaction_Details($SALE_TRANSACTION_ID)
{
    $details = DB::table('sale_transaction_details as std')
        ->join('product as p', 'std.PRODUCT_ID', '=', 'p.PRODUCT_ID')
        ->join('product_category as pc', 'p.PRODUCT_CATEGORY_ID', '=', 'pc.PRODUCT_CATEGORY_ID')
        ->select('std.*', 'p.PRODUCT_NAME', 'pc.TAX_RATE')
        ->where('std.SALE_TRANSACTION_ID', $SALE_TRANSACTION_ID)
        ->get();

    foreach ($details as $d) {
        $d->subtotal = $d->UNIT_PRICE * $d->QUANTITY;
        $d->tax_amount = $d->subtotal * ($d->TAX_RATE / 100); // divide by 100
        $d->line_total = $d->subtotal + $d->tax_amount;
    }

    return $details;
}

public function Set_Sale_Transaction_Details_Entry($SALE_TRANSACTION_ID, $PRODUCT_ID, $UNIT_PRICE, $QUANTITY)
{
    $subtotal = $UNIT_PRICE * $QUANTITY;

    // Just store subtotal in TOTAL
    return DB::insert(
        'INSERT INTO sale_transaction_details 
        (SALE_TRANSACTION_ID, PRODUCT_ID, UNIT_PRICE, QUANTITY, TOTAL) 
        VALUES (?,?,?,?,?)',
        [$SALE_TRANSACTION_ID, $PRODUCT_ID, $UNIT_PRICE, $QUANTITY, $subtotal]
    );
}


public function Get_Specific_Sale_Transaction_Detail($SALE_TRANSACTION_DETAILS_ID)
{
    return DB::select(
        'SELECT * FROM sale_transaction_details WHERE SALE_TRANSACTION_DETAILS_ID = ?',
        [$SALE_TRANSACTION_DETAILS_ID]
    );
}

public function Update_Sale_Transaction_Detail($SALE_TRANSACTION_DETAILS_ID, $PRODUCT_ID, $UNIT_PRICE, $QUANTITY, $TOTAL)
{
    return DB::update(
        'UPDATE sale_transaction_details
         SET PRODUCT_ID = ?, UNIT_PRICE = ?, QUANTITY = ?, TOTAL = ?
         WHERE SALE_TRANSACTION_DETAILS_ID = ?',
        [$PRODUCT_ID, $UNIT_PRICE, $QUANTITY, $TOTAL, $SALE_TRANSACTION_DETAILS_ID]
    );
}

public function Get_Total_By_Transaction($SALE_TRANSACTION_ID)
{
    $result = DB::select(
        'SELECT SUM(TOTAL) AS total_sum 
         FROM sale_transaction_details 
         WHERE SALE_TRANSACTION_ID = ?',
        [$SALE_TRANSACTION_ID]
    );

    // Return 0 if there are no details yet
    return $result[0]->total_sum ?? 0;
}

public function Set_Destroy_Sale_Transaction_Detail($SALE_TRANSACTION_DETAILS_ID)
{
    return DB::delete(
        'DELETE FROM sale_transaction_details WHERE SALE_TRANSACTION_DETAILS_ID = ?',
        [$SALE_TRANSACTION_DETAILS_ID]
    );
}

}
