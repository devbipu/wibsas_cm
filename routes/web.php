<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\AgentsController;


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

Route::get('/getinstalledsoft/{id}', [ClientsController::class, "getInstlledSoft"]);



//***Agents***//
Route::get('/home/agents', [AgentsController::class, 'onshowAgentPage']);
Route::post('/addagent', [AgentsController::class, 'onAgentAdd']);
Route::get('/all-agents', [AgentsController::class, 'onAgentShow']);

