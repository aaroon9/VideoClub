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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => 'auth.basic.once'], function() {
    Route::post('v1/catalog', 'v1Controller@store');
    Route::put('v1/catalog/{id}', 'v1Controller@update');
    Route::delete('v1/catalog/{id}', 'v1Controller@destroy');
    Route::put('v1/catalog/{id}/rent', 'v1Controller@putRent');
    Route::put('v1/catalog/{id}/return', 'v1Controller@putReturn');
});

Route::get('v1/catalog', 'v1Controller@index');
Route::get('v1/catalog/{id}', 'v1Controller@show');

