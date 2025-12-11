<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class product_category_model extends Model
{
    public function Get_All_Product_Category(){
        return DB::select('SELECT * FROM product_category');
    }

        public function Get_Specific_Product_Category($PRODUCT_CATEGORY_ID){
        return DB::select('SELECT * FROM product_category WHERE PRODUCT_CATEGORY_ID = ?', [$PRODUCT_CATEGORY_ID]);
    }

    public function Set_Update_Product_Category($PRODUCT_CATEGORY_ID, $CATEGORY_NAME, $DESCRIPTION, $TAX_RATE, $PRICING_RULE ){
    return DB::update(
        'UPDATE product_category 
        SET CATEGORY_NAME = ?, DESCRIPTION = ?, TAX_RATE = ?, PRICING_RULE = ?
        WHERE PRODUCT_CATEGORY_ID = ?',
        [$CATEGORY_NAME, $DESCRIPTION, $TAX_RATE, $PRICING_RULE, $PRODUCT_CATEGORY_ID]
    );
}

}
