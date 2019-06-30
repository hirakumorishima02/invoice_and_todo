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

Auth::routes();
Route::get('/', 'PageController@index');
Route::get('/home', 'HomeController@index')->name('home');

// ユーザーページ
Route::get('/user', 'UserController@user');

// クライアント情報の追加・更新・削除
Route::get('/addClient', 'TodoController@addClient');
Route::post('/addNewClient','TodoController@addNewClient');
Route::get('/editClient/{id}', 'TodoController@editClient');
Route::post('/updateClient/{id}','TodoController@updateClient')->name('updateClient');
Route::delete('/deleteClient/{id}','TodoController@deleteClient')->name('deleteClient');

// 案件情報の追加・更新・削除
Route::get('items/{id}', 'TodoController@items')->name('todo.items');
Route::get('/addItem', 'TodoController@addItem');
Route::get('/editItem', 'TodoController@editItem');
Route::post('addNewItem','TodoController@addNewItem')->name('addNewItem');
Route::get('/editItem/{id}', 'TodoController@editItem');
Route::post('/updateItem/{id}','TodoController@updateItem')->name('updateItem');
Route::post('/updateItemStates/{id}','TodoController@updateItemStates');
Route::delete('/deleteItem/{id}','TodoController@deleteItem');

// ユーザー情報編集
Route::get('/editUser', 'InvoiceController@editUser');
Route::post('/updateUser','InvoiceController@updateUser');

// 請求書
Route::get('/invoices/{clientId}', 'InvoiceController@invoices');
Route::get('/invoice/{clientId}/invoice/{invoiceId}', 'InvoiceController@invoice');
Route::get('/checkClient', 'InvoiceController@checkClient');
Route::get('toAddInvoice/{id}','InvoiceController@toAddInvoice');
Route::get('/addInvoice', 'InvoiceController@addInvoice');
Route::post('addNewInvoice','InvoiceController@addNewInvoice')->name('addNewInvoice');
Route::post('addInvoice','InvoiceController@addInvoice');