<?php

use Illuminate\Http\Request;

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
Route::get('/datamenu','DataSiteController@index')->name('datamenu');
Route::get('/alamat/prov','DataSiteController@alamatprov')->name('prov');
Route::get('/alamat/kab/{id}','DataSiteController@alamatkab')->name('kab');
Route::get('/alamat/kec/{id}','DataSiteController@alamatkec')->name('kec');
