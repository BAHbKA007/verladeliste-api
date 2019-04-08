<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Artikel Liste
Route::get('artikel', 'ArtikelController@index');

// einzelner Artikel
Route::get('artikel/{id}', 'ArtikelController@show');

// Neuen Artikel anlegen
Route::post('artikel', 'ArtikelController@store');

// Update Artikel
Route::put('artikel', 'ArtikelController@store');

// Lösche Artikel
Route::delete('artikel', 'ArtikelController@destroy');