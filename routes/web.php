<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientsController;


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