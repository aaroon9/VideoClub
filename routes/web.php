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

//Llamar a un controlador, el @ indica que llama dentro del archivo a uno en concreto.
//Route::get('/{id?}', 'MoviesController@showMovie');

Route::get('/', 'HomeController@getHome');

/*Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/logout', function () {
    return view('logout');
});*/

Route::group(['middleware' => 'auth'], function() {
	Route::get('/catalog', 'CatalogController@getIndex');

	Route::get('/catalog/show/{id}', 'CatalogController@getShow');

	Route::get('/catalog/create', 'CatalogController@getCreate');

	Route::get('/catalog/edit/{id}', 'CatalogController@getEdit');

	Route::post('/catalog/create', 'CatalogController@postCreate');

	Route::put('/catalog/edit/{id}', 'CatalogController@putEdit');

	Route::put('/catalog/rent/{id}', 'CatalogController@putRent');

	Route::put('/catalog/return/{id}', 'CatalogController@putReturn');

	//Alquiler
	Route::put('/catalog/rent/{id}', 'AlquilerController@putInsert');

	Route::put('/catalog/return/{id}', 'AlquilerController@putReturn');

	Route::put('/catalog/moredays/{id}', 'AlquilerController@addMore');

<<<<<<< HEAD

	Route::put('/catalog/moredays/{id}', 'AlquilerController@addMore');

	Route::put('/catalog/moredays/{id}', 'AlquilerController@addMore');

	Route::put('/catalog/return/{id}', 'AlquilerController@addMore');
=======
>>>>>>> 99aab9554ef297711fcd02fc2b9e5d0f1dfeb374

	/*Rutas para eliminar*/
	Route::delete('/catalog/delete/{id}', 'CatalogController@deleteMovie');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
