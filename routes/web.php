<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/new', 'NewController@index')->name('new');
Route::post('/store', 'NewController@store')->name('store');

Route::get('/continue', 'ContinueController@index')->name('continue');
Route::get('/edit/{id}', 'ContinueController@edit')->name('edit');
Route::post('/update', 'ContinueController@update')->name('update');
Route::get('/delete/{id}', 'ContinueController@delete')->name('delete');
Route::get('/detail/{id}', 'ContinueController@detail')->name('detail');

Route::get('/report', 'ReportController@index')->name('report');

Route::get('/export', 'ExportController@index')->name('export');
Route::post('/exportexcel', 'ExportController@exportexcel')->name('exportexcel');