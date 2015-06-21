<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// --------------------- //
// Padrões de Parametros //
// --------------------- //

Route::pattern('id', '[0-9]+');

Route::get('/', 'ExemploController@index');
Route::get('home', 'HomeController@index');

Route::get('exemplo', 'ExemploController@index');

// --------------------- //
// Nomeado Rotas ------- //
// --------------------- //

Route::get('produtos', ['as'=>'produtos', function() {

	echo Route::currentRouteName();
	// return "Produtos";

}]);

// --------------------- //
// Grupos de Rotas ----- //
// --------------------- //

Route::group(['prefix'=>'admin'], function() {
	
	get("categories", "AdminCategoriesController@index");
	get("categories/editar/{category}", "AdminCategoriesController@editar");
	get("products", "AdminProductsController@index");

});
