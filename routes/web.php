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

Route::get('/', 'OutlayIncomeController@index');

Route::post('add_record', 'OutlayIncomeController@addRecord');
Route::get('delete/{id}', 'OutlayIncomeController@deleteRecord');
Route::get('select_by_date/{date}', 'OutlayIncomeController@selectByDate');
Route::get('get_record', 'OutlayIncomeController@getRecord');
Route::get('get_currency_dollar', 'CurrencyController@getCurrency');
