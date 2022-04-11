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

Route::prefix('tentang')->group(function() 
{
    Route::get('edit/{id}/edit', 'TentangController@update');
    Route::post('simpan', 'TentangController@store');

    Route::get('/sejarah', 'TentangController@sejarah');
    Route::get('/profil', 'TentangController@profil');
    Route::get('/visimisi', 'TentangController@visimisi');
});
