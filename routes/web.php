<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;

//--------AUTH CONTROLLER AND ALL ROUTINGS ABOUT LOGIN/REGISTER AND LOGOUT-----------\\

Route::controller(AuthController::class)->group(function()

{

    Route::get('/', 'index')->name('login');

    Route::get('/login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('valid_registration');

    Route::post('validate_login', 'validate_login')->name('valid_login');
    
});

//-------------HOME CONTROLLER AND ALL ROUTING ABOUT WITHDRAW,DEPOSIT,CUSTOMER DETAILS

Route::controller(HomeController::class)->group(function()

    {   
    
        Route::get('index','index')->name('index');
    
        Route::get('/customerData/{id}','customerDetail');
    
        Route::post('withdrawProcess','withdrawProcess')->name('withdrawProcess');
    
        Route::post('depositProcess','depositProcess')->name('depositProcess');
    
    });