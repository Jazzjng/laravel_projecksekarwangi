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
    //save route
    Route::post('simpan', 'TentangController@store');
    Route::post('simpanDokter', 'TentangController@saveDokter');
    Route::post('/search', 'TentangController@searchDokter');

    //update route
    Route::get('edit/{id}/edit', 'TentangController@update');
    Route::get('updateDokter/{id}', 'TentangController@updateDokter');
    
    //view route
    Route::get('/sejarah', 'TentangController@sejarah');
    Route::get('/profil', 'TentangController@profil');
    Route::get('/visimisi', 'TentangController@visimisi');
    Route::get('/dokter', 'TentangController@dokter');
    Route::get('/denah', 'TentangController@denah');
    Route::get('/galeri', 'TentangController@galeri');
    Route::get('/kepuasanMasyarakat', 'TentangController@kepuasanMasyarakat');

    //delete route
    Route::get('deleteDokter/{id}', 'TentangController@deleteDokter');
    Route::get('deleteEvent/{id}', 'TentangController@deleteEvent');

});
