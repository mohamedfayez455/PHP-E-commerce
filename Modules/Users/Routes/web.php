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

    Route::group(['middleware' => 'IsGuest:user'], function () {

        Route::get('/login', 'UsersController@get_login');
        Route::post('/login', 'UsersController@post_login')->name('login');

        Route::get('/register', 'UsersController@get_register');
        Route::post('/register', 'UsersController@post_register')->name('register');

    });

//        Route::get('/home', 'UsersController@home')->name('home');
    Route::group(['middleware' => 'user'], function () {

        config()->set('auth.defaults.guards' , 'user');

        Route::get('/logout', 'UsersController@logout');

    });
});

