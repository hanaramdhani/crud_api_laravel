<?php

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;

// use Illuminate\Routing\Route;

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

Route::get('password', function () {
    return bcrypt('hana');
});


// Route::get('categories', 'API\categoriesController@index')->middleware('auth:api');
Route::get('categories', 'API\categoriesController@index');
Route::get('categories/{id}', 'API\categoriesController@show');
Route::post('categories', 'API\categoriesController@store');
Route::delete('categories/{id}', 'API\categoriesController@destroy');
Route::patch('categories/{id}', 'API\categoriesController@update');

Route::get('kamar', 'API\kamarController@index');
Route::get('kamar/{id}', 'API\kamarController@show');
Route::post('kamar', 'API\kamarController@store');
Route::patch('kamar/{id}', 'API\kamarController@update');
Route::delete('kamar/{id}', 'API\kamarController@destroy');

Route::get('pemesanan', 'API\pemesananController@index');
Route::get('pemesanan/{id}', 'API\pemesananController@show');
Route::post('pemesanan', 'API\pemesananController@store');
Route::patch('pemesanan/{id}', 'API\pemesananController@update');
Route::delete('pemesanan/{id}', 'API\pemesananController@destroy');

Route::get('kategori', 'API\kategoriController@index');

Route::get('kategoriAdmin', 'API\kategorisController@index');
Route::get('kategoriAdmin/{id}', 'API\kategorisController@show');
Route::post('kategoriAdmin', 'API\kategorisController@store');
Route::patch('kategoriAdmin/{id}', 'API\kategorisController@update');
Route::delete('kategoriAdmin/{id}', 'API\kategorisController@destroy');


Route::get('historiPemesanan', 'API\historiPemesananController@index');

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('wajib', 'AuthController@wajib');
});