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

Route::get('/home', [App\Http\Controllers\DefaultController::class, 'index'])->name('home');

Route::prefix('informasi/')->group(function() {
  Route::get('informasi', 'InformasiController@index');
  Route::get('getInformasi', 'InformasiController@getInformasi');
  Route::post('simpanInformasi', 'InformasiController@store');
  Route::get('deleteInformasi/{id}', 'InformasiController@destroy');
  Route::get('editInformasi/{id}/edit', 'InformasiController@editInformasi');
});
