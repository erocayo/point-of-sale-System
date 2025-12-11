<?php

use App\Http\Controllers\Auth_Controller;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\product_category_controller;
use App\Http\Controllers\product_controller;
use App\Http\Controllers\Sale_Transaction_Controller;
use App\Http\Controllers\sale_transaction_details_controller;
use App\Http\Controllers\summary;
use App\Http\Controllers\transaction_log_controller;
use App\Http\Controllers\user_controller;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\SessionAuth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('welcome');
});

Route::middlewareGroup('sessionAuth', [SessionAuth::class]);
Route::middlewareGroup('role', [RoleMiddleware::class]);

Route::get('/pos',[Dashboard::class, 'Welcome']);
Route::get('/pos/login',[Auth_Controller::class, 'Show_LogIn'])->name('login');
Route::post('/pos/login',[Auth_Controller::class, 'LogIn']);
Route::post('/pos/logout',[Auth_Controller::class, 'LogOut'])->name('logout');

Route::middleware(['sessionAuth', 'role:1'])->group(function () { // ADMIN
    // USER
route::get('pos/admin/dashboard',[Dashboard::class, 'admin']);
route::get('/pos/user', [user_controller::class, 'index']);
route::get('/pos/user/add', [user_controller::class, 'add']);
route::post('/pos/user/create', [user_controller::class, 'create']);
route::get('/pos/user/{USER_ID}/edit', [user_controller::class, 'edit']);
route::post('/pos/user/{USER_ID}/update', [user_controller::class, 'update']);
route::get('/pos/user/{USER_ID}/delete', [user_controller::class, 'delete']);
route::get('/pos/user/{USER_ID}/destroy', [user_controller::class, 'destroy']);

// PRODUCT CATEGORY
route::get('/pos/products/category', [product_category_controller::class, 'index']);
route::get('/pos/products/category/{PRODUCT_CATEGORY_ID}/edit', [product_category_controller::class, 'edit']);
route::post('/pos/products/category/{PRODUCT_CATEGORY_ID}/update', [product_category_controller::class, 'update']);

route::get('/pos/transaction/log', [transaction_log_controller::class, 'index']);
});

Route::middleware(['sessionAuth', 'role:2'])->group(function () { //CASHIER
// SALE TRANSACTION
route::get('pos/cashier/dashboard',[Dashboard::class, 'cashier']);
route::get('pos/transaction', [Sale_Transaction_Controller::class, 'index']);
route::post('pos/transaction/create', [Sale_Transaction_Controller::class, 'create']);
Route::get('/pos/transaction/{SALE_TRANSACTION_ID}/confirm',[Sale_Transaction_Controller::class, 'confirm']);
Route::get('/pos/transaction/{SALE_TRANSACTION_ID}/cancel', [Sale_Transaction_Controller::class, 'cancel']);
route::get('/pos/transaction/{SALE_TRANSACTION_ID}/receipt', [Sale_Transaction_Controller::class, 'receipt']);

// SALE TRNSACTION DETAILS
route::get('pos/transaction/{SALE_TRANSACTION_ID}/details', [sale_transaction_details_controller::class, 'index']);
route::get('pos/transaction/{SALE_TRANSACTION_ID}/details/add', [Sale_Transaction_Details_Controller::class, 'add']);
route::post('pos/transaction/{SALE_TRANSACTION_ID}/details/create', [Sale_Transaction_Details_Controller::class, 'create']);
route::get('pos/transaction/{SALE_TRANSACTION_ID}/details/{SALE_TRANSACTION_DETAILS_ID}/edit', [Sale_Transaction_Details_Controller::class, 'edit']);
route::post('pos/transaction/{SALE_TRANSACTION_ID}/details/{SALE_TRANSACTION_DETAILS_ID}/update', [Sale_Transaction_Details_Controller::class, 'update']);
route::get('pos/transaction/{SALE_TRANSACTION_ID}/details/{SALE_TRANSACTION_DETAILS_ID}/destroy', [Sale_Transaction_Details_Controller::class, 'destroy']);

});

Route::middleware(['sessionAuth', 'role:3'])->group(function () { // manager
//PRODUCTS
route::get('pos/manager/dashboard',[Dashboard::class, 'manager']);
route::get('pos/manager/transaction',[Dashboard::class, 'transaction']);
route::get('/pos/products', [product_controller::class, 'index']);
route::get('/pos/products/{PRODUCT_ID}/edit', [product_controller::class, 'edit']);
route::post('/pos/products/{PRODUCT_ID}/update', [product_controller::class, 'update']);
route::get('/pos/products/{PRODUCT_ID}/delete', [product_controller::class, 'delete']);
route::get('/pos/products/{PRODUCT_ID}/destroy', [product_controller::class, 'destroy']);
route::get('/pos/manager/reports', [summary::class, 'report']);
});