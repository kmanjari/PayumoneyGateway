<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('payment-gateway', 'PaymentController@doPayment');


Route::post('/payment/success', function () {

    return 'Success';
});

Route::post('/payment/failure', function () {

    return 'failure';
});
