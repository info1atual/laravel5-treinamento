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

Route::group(['prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function() {

    Route::get('/', 'HomeController@index');
    Route::group(['prefix'=>'products'], function() {
        get('/',            ['as'=>'products',            'uses'=>'ProductsController@index']);
        get('/create',      ['as'=>'products.create',     'uses'=>'ProductsController@create']);
        post('/store',      ['as'=>'products.store',      'uses'=>'ProductsController@store']);
        get('{id}/destroy', ['as'=>'products.destroy',    'uses'=>'ProductsController@destroy']);
        get('{id}/edit',    ['as'=>'products.edit',       'uses'=>'ProductsController@edit']);
        put('{id}/update',  ['as'=>'products.update',     'uses'=>'ProductsController@update']);

    });

    Route::group(['prefix'=>'categories'], function() {
        get('/',            ['as'=>'categories',            'uses'=>'CategoriesController@index']);
        get('/create',      ['as'=>'categories.create',     'uses'=>'CategoriesController@create']);
        post('/store',      ['as'=>'categories.store',      'uses'=>'CategoriesController@store']);
        get('{id}/destroy', ['as'=>'categories.destroy',    'uses'=>'CategoriesController@destroy']);
        get('{id}/edit',    ['as'=>'categories.edit',       'uses'=>'CategoriesController@edit']);
        put('{id}/update',  ['as'=>'categories.update',     'uses'=>'CategoriesController@update']);

    });

    Route::group(['prefix'=>'images'], function() {

        get('{id}/product',         ['as'=>'products.images',       'uses'=>'ProductsController@images']);
        get('create/{id}/product',  ['as'=>'products.images.create','uses'=>'ProductsController@createImage']);
        post('store/{id}/product',  ['as'=>'products.images.store', 'uses'=>'ProductsController@storeImage']);
        get('destroy/{id}/image',   ['as'=>'products.images.destroy','uses'=>'ProductsController@destroyImage']);

    });

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

// --------------------- //
// Padrões de Parametros //
// --------------------- //

Route::pattern('id', '[0-9]+');
// Route::get('/',     'StoreController@index');
Route::get('/',     'HomeController@index');
Route::get('/home', 'HomeController@index');
