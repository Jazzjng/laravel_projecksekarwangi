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

Route::prefix('pelayanan')->group(function() {
    // VIEW
    Route::get('/rawatjalan', 'PelayananController@rawatJalan');
    Route::get('/igd', 'PelayananController@igd');
    Route::get('/rawatinap', 'PelayananController@rawatinap');
    Route::get('/penunjang', 'PelayananController@penunjang');
    Route::get('/add', 'PelayananController@addpelayanan');

    //ADD
    Route::post('/save', 'PelayananController@store');

    //Update
    Route::get('update/{id}','PelayananController@update');
    //Delete
    Route::get('delete/{id}', 'PelayananController@destroy');

});
