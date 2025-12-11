<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale_Transaction_Model;
use App\Models\user_model;
use App\Models\transaction_details_model;
use App\Models\product_model;
use App\Models\transaction_log_model;

class Sale_Transaction_Controller extends Controller
{
    public function index(){
        $model = new Sale_Transaction_Model();
        $dbresults = $model->Get_Pending_Sale_Transaction();
        $data = ['transactionlist' => $dbresults];
        return view('pos/transaction/index', $data);
    }

    public function add(){
    return view('pos/transaction/add');
    }

public function create(Request $request)
{
    $USER_ID = $request->session()->get('USER_ID');
    $TOTAL_PRICE = 0;
    $STATUS = 'pending';

    $model = new Sale_Transaction_Model();

    $SALE_TRANSACTION_ID = $model->Set_New_Sale_Transaction($USER_ID, $TOTAL_PRICE, $STATUS);

$log = new transaction_log_model();
$log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'created');

    return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/details');
}

public function confirm($SALE_TRANSACTION_ID)
{
    $transactionModel = new Sale_Transaction_Model();
    $detailModel = new transaction_details_model();
    $productModel = new product_model();

    // 1. Get all transaction details
    $details = $detailModel->Get_All_Sale_Transaction_Details($SALE_TRANSACTION_ID);

    // 2. Reduce stock for each product
    foreach ($details as $detail) {
        $productModel->Update_Stock($detail->PRODUCT_ID, $detail->QUANTITY);
    }

    // 3. Update transaction status to completed
    $transactionModel->Update_Transaction_Status($SALE_TRANSACTION_ID, 'completed');

    $log = new transaction_log_model();
    $log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'confirmed');
    return redirect('/pos/transaction/' . $SALE_TRANSACTION_ID . '/receipt');
}

public function receipt($SALE_TRANSACTION_ID)
{
    $transactionModel = new Sale_Transaction_Model();
    $detailModel = new transaction_details_model();
    $logModel = new transaction_log_model();

    $transaction = $transactionModel->Get_Specific_Sale_Transaction($SALE_TRANSACTION_ID);

    // ★ Use the new function
    $details = $detailModel->Get_All_Sale_Transaction_Details($SALE_TRANSACTION_ID);

    $completed_log = $logModel->Get_Completed_Date($SALE_TRANSACTION_ID);

    return view('pos/transaction/receipt', [
        'transaction' => $transaction,
        'details' => $details,
        'completed_log' => $completed_log
    ]);
}


public function cancel($SALE_TRANSACTION_ID)
{
    $model = new Sale_Transaction_Model();
    $model->Update_Transaction_Status($SALE_TRANSACTION_ID, 'deleted');

    $log = new transaction_log_model();
    $log->Add_Transaction_Log($SALE_TRANSACTION_ID, 'deleted');
    return redirect('/pos/transaction');
}


}
