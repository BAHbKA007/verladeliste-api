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

// We Liste
Route::get('we', 'WeController@index');
// einzelner We
Route::get('we/{id}', 'WeController@show');
// Neuen We anlegen
Route::post('we', 'WeController@store');
// Update We
Route::put('we', 'WeController@store');
// Lösche We
Route::delete('we/{id}', 'WeController@destroy');
// We WHERE
Route::post('we/where', 'WeController@where');
// We WHERE first ohne länderbeschränkung
Route::get('we/where/first', 'WeController@wherefirst');

// Lieferant Liste
Route::get('lieferant', 'LieferantController@index');
// einzelner Lieferant
Route::get('lieferant/{id}', 'LieferantController@show');
// Neuen Lieferant anlegen
Route::post('lieferant', 'LieferantController@store');
// Update Lieferant
Route::put('lieferant', 'LieferantController@store');
// Lösche Lieferant
Route::delete('lieferant/{id}', 'LieferantController@destroy');

// Länder Liste
Route::get('land', 'LandController@index');

// LKW Liste
Route::get('lkw', 'LkwController@index');
// einzelner LKW
Route::get('lkw/{id}', 'LkwController@show');
// Neuen LKW anlegen
Route::post('lkw', 'LkwController@store');
// Update LKW
Route::put('lkw', 'LkwController@lkw_edit');
// Lösche LKW
Route::delete('lkw/{id}', 'LkwController@destroy');