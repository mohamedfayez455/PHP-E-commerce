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

        Route::get('/home', 'FrontController@home')->name('home');
        Route::post('/search', 'FrontController@search')->name('search');
        Route::get('/stores', 'FrontController@stores')->name('store');
        Route::get('/product/{id}', 'FrontController@product')->name('product');
        Route::get('/department/{id}', 'FrontController@department')->name('department');

        Route::group(['middleware' => 'user'], function () {
            Route::get('/profile/{id}', 'FrontController@profile')->name('profile');
        });


});
