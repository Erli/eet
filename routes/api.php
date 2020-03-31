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



Route::post('posts', 'PostController@store');
Route::get('posts', 'PostController@get');
Route::delete('posts/{id}', 'PostController@delete');


Route::get('order-items', 'OrderItemController@get');
Route::post('order-items', 'OrderItemController@store');
Route::delete('order-items/{id}', 'OrderItemController@delete');

Route::post('order', 'OrderController@store');
Route::get('orders', 'OrderController@get');
Route::get('order/{id}', 'OrderController@getById');

Route::post('items', 'ItemController@store');
Route::post('item/update', 'ItemController@update');
Route::get('items', 'ItemController@get');
Route::get('item/{id}', 'ItemController@getById');
Route::delete('items/{id}', 'ItemController@delete');
