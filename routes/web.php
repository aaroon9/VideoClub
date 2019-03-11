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

	//user
	Route::get('/mysite', 'AuthController@mySite');
	Route::get('/mysite/show/{id}', 'AuthController@getView');

	//Cart
	Route::get('/mycart', 'CartController@getView');
	Route::put('/mycart/addItem/{id}', 'CartController@createItem');
	Route::put('/mycart/destroyItem', 'CartController@destroyCart');

	// facturas
	Route::put('/myinvoices', 'InvoicesController@myinvoices');
	Route::get('/getMyinvoices', 'InvoicesController@getInvoices');
	Route::get('/download/{id}', 'InvoicesController@getDownload');

	/*Rutas para eliminar*/
	Route::delete('/catalog/delete/{id}', 'CatalogController@deleteMovie');

	// Search
	Route::get('/search', 'CatalogController@search');



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');
