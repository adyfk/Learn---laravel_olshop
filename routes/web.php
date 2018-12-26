<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/user/data', 'Admin\UsersController@data')->name('datauser');
    Route::resource('user', 'Admin\UsersController');
    Route::get('/product/data', 'Admin\ProductsController@data')->name('dataproducts');
    Route::resource('product', 'Admin\ProductsController');
});
