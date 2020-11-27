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


Route::prefix('/admin')->group(function (){

    Route::group(['middleware' => 'IsGuest:admin'], function () {
        Route::get('/login', 'AdminLoginController@get_login');
        Route::post('/login', 'AdminLoginController@post_login')->name('login');
    });

    Route::group(['middleware' => 'admin'], function () {

        config()->set('auth.defaults.guards' , 'admin');

        Route::get('/home', 'AdminLoginController@home')->name('home.admin');
        Route::get('/logout', 'AdminLoginController@logout');
        Route::resource('admins', 'AdminsController');

    });
});
