<?php

namespace App\Http\Controllers;

use App\Models\Sale_Transaction_Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
public function Welcome(){

    return view('pos/index');
}

public function admin(Request $request){
$username = $request->session()->get('USERNAME');
    return view('pos/admin/index', ['username' => $username]);
}
public function cashier(Request $request){
$username = $request->session()->get('USERNAME');
    return view('pos/cashier/index', ['username' => $username]);
}
public function manager(Request $request){
$username = $request->session()->get('USERNAME');
    return view('pos/manager/index', ['username' => $username]);
}
public function transaction(Request $request){
$transactionModel = new Sale_Transaction_Model();
        $transactions = $transactionModel->Get_This_Month_Transactions();

        return view('pos/manager/transaction', compact('transactions'));
}
}
