<?php

namespace App\Http\Controllers;

use App\Models\product_model;
use App\Models\Sale_Transaction_Model;
use Illuminate\Http\Request;

class summary extends Controller
{
public function report(){
    $saleModel = new Sale_Transaction_Model();
        $productModel = new product_model();

        // Monthly Sales Summary
        $monthlySummary = $saleModel->Get_Monthly_Sale_Summary_With_Totals();

        // Product Stock Summary
        $productSummary = $productModel->Get_Product_Stock_Summary();

        // Return to view
        return view('pos/manager/reports', compact(
            'monthlySummary',
            'productSummary'
        ));
    }
}
