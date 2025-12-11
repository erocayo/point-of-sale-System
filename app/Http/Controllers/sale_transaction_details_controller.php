<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction_details_model;
use App\Models\product_model;
use App\Models\Sale_Transaction_Model;
use App\Models\transaction_log_model;

class sale_transaction_details_controller extends Controller
{
    public function index($SALE_TRANSACTION_ID)
    {
        $detailModel = new transaction_details_model();
        $transactionModel = new Sale_Transaction_Model();

        // Get details and transaction info
        $details = $detailModel->Get_All_Sale_Transaction_Details($SALE_TRANSACTION_ID);
        $transaction = $transactionModel->Get_Specific_Sale_Transaction($SALE_TRANSACTION_ID);

        $data = [
            'SALE_TRANSACTION_ID' => $SALE_TRANSACTION_ID,
            'transaction' => $transaction, // one record
            'detailslist' => $details
        ];

        return view('pos/transaction/details/index', $data);
    }


    public function add($SALE_TRANSACTION_ID)
    {
        $productModel = new product_model();
        $products = $productModel->Get_All_Product_Entries();
        $data = [
            'SALE_TRANSACTION_ID' => $SALE_TRANSACTION_ID,
            'productlist' => $products
        ];

        return view('pos/transaction/details/add', $data);
    }

public function create(Request $request, $SALE_TRANSACTION_ID)
{
    $productModel = new product_model();
    $detailModel = new transaction_details_model();
    $transactionModel = new Sale_Transaction_Model();

    $request->validate([
        'PRODUCT_ID' => 'required|integer',
        'QUANTITY' => 'required|integer|min:1',
    ]);

    // Get product info, including category tax rate
    $product = $productModel->Get_Specific_Product_Entry($request->PRODUCT_ID)[0];
    $unitPrice = $product->PRICE;
    $taxRate = $product->CATEGORY_TAX_RATE ?? 0; // adjust the column name to your join

    // Insert detail record with tax
    $detailModel->Set_Sale_Transaction_Details_Entry(
        $SALE_TRANSACTION_ID,
        $request->PRODUCT_ID,
        $unitPrice,
        $request->QUANTITY,
        $unitPrice * $request->QUANTITY, // subtotal
        $taxRate
    );

    // Recalculate total for transaction
    $transactionModel->Update_Total_Price($SALE_TRANSACTION_ID);

    $log = new transaction_log_model();
    $log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'detail added');

    return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details');
}


    public function edit($SALE_TRANSACTION_ID, $SALE_TRANSACTION_DETAILS_ID)
    {
        $detailModel = new transaction_details_model();
        $productModel = new product_model();

        // Fetch the detail record
        $detailArray = $detailModel->Get_Specific_Sale_Transaction_Detail($SALE_TRANSACTION_DETAILS_ID);

        // If not found, redirect back with an error
        if (empty($detailArray)) {
            return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details')
                ->with('error', 'Transaction detail not found.');
        }

        // Get the first (and only) record
        $detail = $detailArray[0];

        // Fetch all products for the dropdown
        $products = $productModel->Get_All_Product_Entries();

        return view('pos/transaction/details/edit', [
            'SALE_TRANSACTION_ID' => $SALE_TRANSACTION_ID,
            'detail' => $detail,
            'productlist' => $products
        ]);
    }


    public function update(Request $request, $SALE_TRANSACTION_ID, $SALE_TRANSACTION_DETAILS_ID)
    {
        $request->validate([
            'PRODUCT_ID' => 'required|integer',
            'QUANTITY' => 'required|numeric|min:0.01', // allow decimals
        ]);

        $productModel = new product_model();
        $detailModel = new transaction_details_model();

        $product = $productModel->Get_Specific_Product_Entry($request->PRODUCT_ID);
        $unitPrice = (float) $product[0]->PRICE;
        $quantity = (float) $request->QUANTITY;
        $total = $unitPrice * $quantity;

        $detailModel->Update_Sale_Transaction_Detail(
            $SALE_TRANSACTION_DETAILS_ID,
            $request->PRODUCT_ID,
            $unitPrice,
            $quantity,
            $total
        );

        // Update transaction total
        $transactionModel = new Sale_Transaction_Model();
        $newTotal = $detailModel->Get_Total_By_Transaction($SALE_TRANSACTION_ID);
        $transactionModel->Update_Total_Price($SALE_TRANSACTION_ID, $newTotal);

        // After updating the detail
        $log = new transaction_log_model();
        $log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'detail updated');


        return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details');
    }

    public function destroy($SALE_TRANSACTION_ID, $SALE_TRANSACTION_DETAILS_ID)
    {
        $detailModel = new transaction_details_model();
        $transactionModel = new Sale_Transaction_Model();

        // Delete the detail
        $detailModel->Set_Destroy_Sale_Transaction_Detail($SALE_TRANSACTION_DETAILS_ID);

        // Recalculate the transaction total
        $newTotal = $detailModel->Get_Total_By_Transaction($SALE_TRANSACTION_ID);
        $transactionModel->Update_Total_Price($SALE_TRANSACTION_ID, $newTotal);

        $log = new transaction_log_model();
        $log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'detail deleted');

        // Redirect back to the details page
        return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details')
            ->with('success', 'Detail deleted and total updated.');
    }
}
