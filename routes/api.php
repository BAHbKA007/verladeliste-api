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
Route::delete('artikel/{id}', 'ArtikelController@destroy');

// entladung Liste
Route::get('entladung', 'EntladungController@index');
// einzelner entladung
Route::get('entladung/{id}', 'EntladungController@show');
// Neuen entladung anlegen
Route::post('entladung', 'EntladungController@store');
// Update entladung
Route::put('entladung', 'EntladungController@store');
// Lösche entladung
Route::delete('entladung/{id}', 'EntladungController@destroy');

// Gebinde Liste
Route::get('gebinde', 'GebindeController@index');
// einzelner Gebinde
Route::get('gebinde/{id}', 'GebindeController@show');
// Neuen Gebinde anlegen
Route::post('gebinde', 'GebindeController@store');
// Update Gebinde
Route::put('gebinde', 'GebindeController@store');
// Lösche Gebinde
Route::delete('gebinde/{id}', 'GebindeController@destroy');