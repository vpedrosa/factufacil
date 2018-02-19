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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('clients','ClientController');
Route::get('clients/{client}/new-invoice/', 'InvoiceController@createWithClient')->name('clients.create-invoice');

Route::get('invoices','InvoiceController@index')->name('invoices.index');
Route::get('invoices/create','InvoiceController@create')->name('invoices.create');
Route::post('invoices','InvoiceController@store')->name('invoices.store');
Route::get('invoices/{invoice}','InvoiceController@show')->name('invoices.show');
Route::get('invoices/{invoice}/edit','InvoiceController@edit')->name('invoices.edit');
Route::get('invoices/{invoice}/add-line','InvoiceLineController@create')->name('invoices.add-line');
Route::patch('invoices/{invoice}/edit','InvoiceController@update')->name('invoices.update');
Route::delete('invoices/{invoice}','InvoiceController@delete')->name('invoices.destroy');
Route::get('invoice-lines','InvoiceLineController@create')->name('invoice-lines.create');
Route::post('invoice-lines','InvoiceLineController@store')->name('invoice-lines.store');
