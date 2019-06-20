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

Route::get('/', 'PageController@index');
Route::get('/user', 'UserController@user');
Route::get('/addClient', 'TodoController@addClient');
Route::get('/addItem', 'TodoController@addItem');
Route::get('/editItem', 'TodoController@editItem');
Route::get('/items/{id}', 'TodoController@items');
Route::get('/invoice', 'InvoiceController@invoice');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// クライアント情報の追加・更新・削除
Route::post('/addNewClient','TodoController@addNewClient');
Route::get('/editClient/{id}', 'TodoController@editClient');
Route::post('/updateClient/{id}','TodoController@updateClient');
Route::delete('/deleteClient/{id}','TodoController@deleteClient');

// 案件情報の追加・更新・削除
Route::post('addNewItem','TodoController@addNewItem');
Route::get('/editItem/{id}', 'TodoController@editItem');
Route::post('/updateItem/{id}','TodoController@updateItem');
Route::delete('/deleteItem/{id}','TodoController@deleteItem');

// ユーザー情報編集
Route::get('/editUser', 'InvoiceController@editUser');
Route::post('/updateUser','InvoiceController@updateUser');