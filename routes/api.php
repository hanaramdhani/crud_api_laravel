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

Route::get('categories', 'API\categoriesController@index');
Route::get('categories/{id}', 'API\categoriesController@show');
Route::post('categories', 'API\categoriesController@store');
Route::delete('categories/{id}', 'API\categoriesController@destroy');
Route::patch('categories/{id}', 'API\categoriesController@update');