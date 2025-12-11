<?php

namespace App\Http\Controllers;

use App\Models\product_category_model;

use Illuminate\Http\Request;

class product_category_controller extends Controller
{
    public function index(){
        $model = new product_category_model();
        $dbresults = $model->Get_All_Product_Category();
        $data = ['categorylist' => $dbresults];
        return view('pos/products/category/index', $data);
    }

    public function edit($PRODUCT_CATEGORY_ID){
    $model = new product_category_model();
    $dbresults = $model->Get_Specific_Product_Category($PRODUCT_CATEGORY_ID);

    // Cast the first element to object
    $category = (object) $dbresults[0];

    $pricingRules = [
        'Fixed Price',
        'Discount Price',
        'Tiered Pricing',
        'Bundle Pricing',
        'Promotional Price',
        'Member Price',
        'Cost-Plus'
    ];

    $data = [
        'categorylist' => $category,
        'rulelist' => $pricingRules
    ];

    return view('pos/products/category/edit', $data);
}

    public function update($PRODUCT_CATEGORY_ID, Request $request){
        $model = new product_category_model();
        $CATEGORY_NAME = $request->input('CATEGORY_NAME');
        $DESCRIPTION = $request->input('DESCRIPTION');
        $TAX_RATE = $request->input('TAX_RATE');
        $PRICING_RULE= $request->input('PRICING_RULE');
        $model->Set_Update_Product_Category($PRODUCT_CATEGORY_ID, $CATEGORY_NAME, $DESCRIPTION, $TAX_RATE, $PRICING_RULE);
        
        return redirect('/pos/products/category');
    }

}
