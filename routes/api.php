<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    // Customer routes
    Route::group(['prefix' => 'customers'], function(){
        Route::get('/', 'CustomerController@index')->name('customerList');
        Route::get('/{id}', 'CustomerController@show')->name('customer');
        Route::post('/', 'CustomerController@create')->name('customer_create');
        Route::put('/{id}', 'CustomerController@update')->name('customer_update');
    });


    // Product routes
    Route::group(['prefix' => 'products'], function(){
        Route::get('/', 'ProductController@index')->name('productList');
        Route::get('/{id}', 'ProductController@show')->name('product');
        Route::post('/', 'ProductController@create')->name('product_create'); 
        Route::put('/{id}', 'ProductController@update')->name('product_update');
    });

    // Order routes
    Route::group(['prefix' => 'orders'], function(){
        Route::get('/', 'OrderController@index')->name('orderList');
        Route::get('/{id}', 'OrderController@show')->name('order');
        Route::post('/', 'OrderController@create')->name('order_create'); 
        Route::put('/{id}', 'OrderController@update')->name('order_update');
    });
