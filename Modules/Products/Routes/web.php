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


Route::group(['prefix' => '/admin'], function () {
    Route::group(['middleware' => 'admin'], function () {

        config()->set('auth.defaults.guards' , 'admin');

        Route::resource('products' , 'ProductsController' );

        Route::get('product/photos/{id}' , 'ProductsController@get_photo' )->name('image.index');
        Route::delete('product/photo/{id}' , 'ProductsController@delete_photo' )->name('image.delete');
        Route::post('product/photos' , 'ProductsController@create_photo' )->name('image.create');

    });
});



Route::prefix('/front')->group(function (){

    Route::group(['middleware' => 'user'], function () {
        Route::resource('reviews' , 'ReviewController' );
        Route::post('review/store' , 'ReviewController@post_store' )->name('review.create');
    });

});
