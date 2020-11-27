<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::prefix('/front')->group(function (){

    Route::group(['middleware' => 'user'], function () {

        Route::get('/cart', 'CartController@index')->name('cart.index');
        Route::post('/cart', 'CartController@store')->name('cart.store');
        Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');
        Route::post('/cart/switchToSaveForLater/{id}', 'CartController@switchToSaveForLater')->name('cart.switchToSaveForLater');

        Route::delete('/saveForLater/{id}', 'SaveForLaterController@destroy')->name('saveForLater.destroy');
        Route::post('/saveForLater/switchToCart/{id}', 'SaveForLaterController@switchToCart')->name('saveForLater.switchToCart');
    });


});
