<?php
Route::get('/', function () {
    return view('index');
});
Route::get('/cobavar', function () {
    return (Auth::User()->id);
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/user/data', 'Admin\UsersController@data')->name('datauser');
    Route::resource('user', 'Admin\UsersController');
    Route::get('/product/data', 'Admin\ProductsController@data')->name('dataproducts');
    Route::post('/product/addcat', 'Admin\ProductsController@addcat')->name('addcat');
    Route::post('/product/updatecat', 'Admin\ProductsController@updatecat')->name('updatecat');
    Route::post('/product/delcat', 'Admin\ProductsController@delcat')->name('delcat');
    Route::resource('product', 'Admin\ProductsController');
    Route::get('/order', 'Admin\OrderController@index');
    Route::get('/order/data', 'Admin\OrderController@data')->name('dataorder');
    Route::get('/order/{id}/show', 'Admin\OrderController@listproduct')->name('listproduct');
    Route::get('/order/{id}/payed', 'Admin\OrderController@payed')->name('payed');
    Route::get('/order/{id}/status', 'Admin\OrderController@status')->name('status');
});
Route::group(['middleware' => ['auth', 'role:member']], function () {
    Route::resource('profile','Member\MembersController');
    Route::post('profile/updatepass','Member\MembersController@updatepass')->name('passupdate');
    Route::post('profile/addrs','Member\MembersController@addrs')->name('addrs');
    Route::get('profile/addrs/{id}','Member\MembersController@deladdrs')->name('deladdrs');
    Route::get('/basketadd','Member\MembersController@basketadd');
    Route::get('/basket','Member\MembersController@basket');
});
Route::get('/{id}/show','DataSiteController@show');