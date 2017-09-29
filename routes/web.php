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

Route::get('/test', 'MainController@test');
Route::get('/grid', 'MainController@getGrid');
Route::post('/notify', 'MainController@postNotify');
Route::get('/add-product', 'MainController@getAddProduct');
Route::post('/add-product', 'MainController@postAddProduct');
Route::get('/orders', 'MainController@getOrders');
Route::get('/inventory', 'MainController@getInventory');
Route::get('/racks', 'MainController@getAddRack');
Route::post('/racks', 'MainController@postAddRack');
Route::post('/racks/delete/{rack}', 'MainController@postDeleteRack');
Route::get('/robots', 'MainController@getAddRobot');
Route::post('/robots', 'MainController@postAddRobot');
Route::post('/robots/delete/{robot}', 'MainController@postDeleteRobot');
Route::get('/', 'MainController@getInventory');
Route::post('/inventory/{product}', 'MainController@postChangeRack');
Route::get('/products/{product}', 'MainController@getProduct');
Route::post('/items/{item}/change-rack', 'MainController@postItemChangeRack');
Route::get('/items/{item}/get', 'MainController@getGetItem');
