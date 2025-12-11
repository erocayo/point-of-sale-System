<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product_model extends Model
{ 
    protected $table = 'product';

    protected $primaryKey = 'PRODUCT_ID';

    public $timestamps = false;

    public function Get_All_Product_Entries(){
        return DB::select('SELECT * FROM product');
    }

    public function Get_Product_Categories() {
    return DB::select('SELECT PRODUCT_CATEGORY_ID, CATEGORY_NAME FROM product_category');
    }


     public function Get_Specific_Product_Entry($PRODUCT_ID){
        return DB::select('SELECT * FROM product WHERE PRODUCT_ID = ?', [$PRODUCT_ID]);
    }

    public function Set_Update_Product_Entry($PRODUCT_ID, $PRODUCT_CATEGORY_ID, $PRODUCT_NAME, $DESCRIPTION, $PRICE, $STOCK_LEVEL){
    return DB::update(
        'UPDATE product 
        SET PRODUCT_CATEGORY_ID = ?, PRODUCT_NAME = ?, DESCRIPTION = ?, PRICE = ?, STOCK_LEVEL = ?
                WHERE PRODUCT_ID = ?',
        [$PRODUCT_CATEGORY_ID, $PRODUCT_NAME, $DESCRIPTION, $PRICE, $STOCK_LEVEL, $PRODUCT_ID]
    );
}

    public function Set_Destroy_Product_Entry($PRODUCT_ID){
        return DB::delete('DELETE FROM product WHERE PRODUCT_ID =? ', [$PRODUCT_ID]);
    }

    public function Update_Stock($PRODUCT_ID, $QUANTITY)
{
    return DB::update(
        'UPDATE product SET STOCK_LEVEL = STOCK_LEVEL - ? WHERE PRODUCT_ID = ?',
        [$QUANTITY, $PRODUCT_ID]
    );
}

public function Get_Product_Stock_Summary()
{
    $products = $this->all();
    $productSummary = [];

    foreach ($products as $product) {
        // Calculate initial stock before any sales
        $total_sold = DB::table('sale_transaction_details as td')
            ->join('sale_transaction_log as log', function($join) {
                $join->on('td.SALE_TRANSACTION_ID', '=', 'log.SALE_TRANSACTION_ID')
                     ->where('log.ACTION_TYPE', 'confirmed');
            })
            ->where('td.PRODUCT_ID', $product->PRODUCT_ID)
            ->sum('td.QUANTITY');

        $stock = ($product->STOCK_LEVEL ?? 0) + $total_sold;

        // Get sales per month
        $movements = DB::table('sale_transaction_details as td')
            ->join('sale_transaction_log as log', function($join) {
                $join->on('td.SALE_TRANSACTION_ID', '=', 'log.SALE_TRANSACTION_ID')
                     ->where('log.ACTION_TYPE', 'confirmed');
            })
            ->select(
                DB::raw("DATE_FORMAT(log.created_at, '%Y-%m') as month"),
                DB::raw("SUM(td.QUANTITY) as stock_out")
            )
            ->where('td.PRODUCT_ID', $product->PRODUCT_ID)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        foreach ($movements as $m) {
            $beginning_stock = $stock;
            $stock_out = $m->stock_out;
            $ending_stock = $beginning_stock - $stock_out;

            $productSummary[] = [
                'product_name' => $product->PRODUCT_NAME,
                'month' => $m->month,
                'beginning_stock' => $beginning_stock,
                'stock_out' => $stock_out,
                'ending_stock' => $ending_stock
            ];

            $stock = $ending_stock; // next month starts with previous ending stock
        }
    }

    return $productSummary;
}
}
