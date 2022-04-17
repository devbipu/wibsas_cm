<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AgentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BillingController;



Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//client adding route



Route::get('home/clients', [ClientsController::class, 'clientsShow']);
Route::post('/addclients', [ClientsController::class, 'onClintAdd']);


//show clients

Route::get('/all-clients', [ClientsController::class, 'onShowClients']);
Route::get('/home/clients/{id}', [ClientsController::class, 'onSinglePage']);

//add client soft data
Route::post('/addsoftware', [ClientsController::class, 'onSoftAdd']);

// get soft data by client id

Route::post('/getinstalledsoft/', [ClientsController::class, "getInstlledSoft"]);

Route::get('/home/product-perclient/{id}', [ClientsController::class, 'getproductByClientId']);



//***Agents***//
Route::get('/home/agents', [AgentsController::class, 'onshowAgentPage']);
Route::post('/addagent', [AgentsController::class, 'onAgentAdd']);
Route::get('/all-agents', [AgentsController::class, 'onAgentShow']);
//show in soft ins page
Route::get('/get-all-agents', [AgentsController::class, 'getAllAgents']);



// all-install
Route::get('/home/all-install', [HomeController::class, 'allInstallShow']);
// Route::post('/get-soft-insdata', [HomeController::class, 'allSoftDataById']);







//*******billings*******// 

Route::get('/home/all-bill', [BillingController::class, 'allBills']);
Route::get('/get-all-install-billing', [BillingController::class, 'getAllBilling']);
Route::get('/home/billing-report', [BillingController::class, 'billReportShow']);
Route::get('/home/dh-billing-report', [BillingController::class, 'dhBillReport']);


//change-payment-status
Route::post('/change-payment-status', [BillingController::class, 'onDHPayChange']);



Route::get('/checkPayStatus', [BillingController::class, 'checkPayStatus']);
Route::get('/checkQueryDatas/{id}', [BillingController::class, 'showQueryData']);