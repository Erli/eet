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

Route::get('/', function()
{
    return view('homepage');
});
Route::get('/posts/', 'PostController@index')->name('posts');
Route::get('/item/', 'ItemController@index')->name('items');
Route::get('/orders/', 'OrderController@index')->name('orders');
Route::get('/orders/{id}', 'OrderController@detail')->where('id', '[0-9]+')->name('order-detail');



