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

Route::get('/test', 'MainController@request');
Route::post('/test', 'MainController@postRequest');
Route::get('/add-product', 'MainController@getAddProduct');
Route::post('/add-product', 'MainController@postAddProduct');
Route::get('/orders', 'MainController@getOrders');
Route::get('/inventory', 'MainController@getInventory');
Route::get('/add-rack', 'MainController@getAddRack');
Route::post('/add-rack', 'MainController@postAddRack');
Route::post('/racks/delete/{rack}', 'MainController@postDeleteRack');
Route::post('/inventory/{product}', 'MainController@postChangeRack');
Route::get('/inventory/{product}', 'MainController@getChangeRack');

