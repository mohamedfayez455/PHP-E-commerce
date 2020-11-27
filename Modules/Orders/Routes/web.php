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

        config()->set('auth.defaults.guards' , 'user');

//        Route::resource('order', 'OrdersController');

        //paypall
        Route::get('/execute-payment', 'PaypallController@execute')->name('execute-payment');
        Route::post('/create-payment', 'PaypallController@create')->name('create-payment');



        Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
        Route::post('/order', 'OrdersController@store')->name('order.store');
        Route::delete('/cancel/{id}', 'OrdersController@destroy')->name('order.destroy');

    });
});


Route::prefix('/admin')->group(function (){
    Route::group(['middleware' => 'admin'], function () {
        config()->set('auth.defaults.guards' , 'admin');
          Route::resource('orders', 'AdminOrderController');
          Route::get('order/show/{id}', 'AdminOrderController@order_show')->name('order.show');
          Route::get('order/update/{id}', 'AdminOrderController@order_edit')->name('order.edit');
          Route::put('order/update/{id}', 'AdminOrderController@order_update')->name('order.update');
          Route::put('order/update/{id}/status', 'AdminOrderController@status')->name('order.status');

    });
});

