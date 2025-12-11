<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction_log_model;

class transaction_log_controller extends Controller
{
    public function index(){
        $model = new transaction_log_model();
        $dbresults = $model->Get_All_Transaction_Log();
        $data = ['loglist' => $dbresults];
        return view('/pos/transaction/log/index', $data);
    }  
}
