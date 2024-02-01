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

Route::get('/data-ktp', 'DataKtpController@show')->name('data-ktp');

Route::get('/data-ktp/tambah', 'DataKtpController@goToAdd');
Route::post('/data-ktp/save-data', 'DataKtpController@add');

Route::get('/data-ktp/edit/{id}', 'DataKtpController@goToEdit');
Route::post('/data-ktp/update/{id}', 'DataKtpController@update');

Route::get('/data-ktp/delete/{$id}', 'DataKtpController@delete');

Route::get('/data-ktp/exportcsv', 'DataKtpController@exportCsv');
Route::get('/data-ktp/exportpdf', 'DataKtpController@exportPdf');
Route::get('/data-ktp/import', 'DataKtpController@import');




