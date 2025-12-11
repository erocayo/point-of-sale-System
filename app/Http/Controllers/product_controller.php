<?php

namespace App\Http\Controllers;

use App\Models\product_model;
use Illuminate\Http\Request;

class product_controller extends Controller
{
    public function index(){
        $model = new product_model();
        $dbresults = $model->Get_All_Product_Entries();
        $data = ['productlist' => $dbresults];
        return view('pos/products/index', $data);
    }

public function edit($PRODUCT_ID)
{
    $model = new product_model();

    $categories = $model->Get_Product_Categories();

    $dbresults = $model->Get_Specific_Product_Entry($PRODUCT_ID);

    $data = [
        'productlist' => $dbresults[0],
        'categorylist' => $categories
    ];

    return view('pos/products/edit', $data);
}


   public function update($PRODUCT_ID, Request $request)
{
    $model = new product_model();

    // Get inputs from the form
    $PRODUCT_NAME = $request->input('PRODUCT_NAME');
    $DESCRIPTION = $request->input('DESCRIPTION');
    $PRICE = $request->input('PRICE');
    $STOCK_LEVEL = $request->input('STOCK_LEVEL');
    $PRODUCT_CATEGORY_ID = $request->input('PRODUCT_CATEGORY_ID');

    // Call the model function to update the product
    $model->Set_Update_Product_Entry($PRODUCT_ID,$PRODUCT_CATEGORY_ID, $PRODUCT_NAME, $DESCRIPTION, $PRICE, $STOCK_LEVEL);

    return redirect('/pos/products'); // Redirect back to product list
}

    public function delete($PRODUCT_ID){
        $model = new product_model();
        $dbresults = $model->Get_Specific_Product_Entry($PRODUCT_ID);
        $data = [
            'productlist' => $dbresults
        ];
        return view('pos/products/delete', $data);
    }

    public function destroy($PRODUCT_ID){
        $model = new product_model();
        $model->Set_Destroy_Product_Entry($PRODUCT_ID);
        return redirect('/pos/products');
        }


}
