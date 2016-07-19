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

// --------------------- //
// Páginas da Loja //
// --------------------- //

Route::group(['prefix'=>'store', 'where'=>['id'=>'[0-9]+']], function() {

    Route::get('{category}/by-category',    ['as'=>'store.category', 'uses'=>'StoreController@category']);
    Route::get('{product}/product',         ['as'=>'store.product', 'uses'=>'StoreController@product']);
    Route::get('{tag}/tag',                 ['as'=>'store.tag', 'uses'=>'StoreController@tag']);
    Route::get('cart',                      ['as'=>'cart', 'uses'=>'CartController@index']);
    Route::get('cart/{id}/add',             ['as'=>'cart.add', 'uses'=>'CartController@add']);
    Route::get('cart/{id}/{qtd}/update',    ['as'=>'cart.update', 'uses'=>'CartController@update']);
    Route::get('cart/{id}/remove',          ['as'=>'cart.remove', 'uses'=>'CartController@destroy']);

});

// --------------------- //
// Home da Loja          //
// --------------------- //

Route::get('/',     'StoreController@index');
Route::get('/home',     ['as'=>'home', 'uses'=>'StoreController@index']);
Route::get('/store',    ['as'=>'store', 'uses'=>'StoreController@index']);
Route::get('/login',            ['as'=>'login',             'uses'=>'LoginController@index']);
Route::get('/login/autorizar',  ['as'=>'login.autorizar',   'uses'=>'LoginController@autorizar']);
Route::get('/logout',           ['as'=>'logout',            'uses'=>'LoginController@logout']);

Route::group(['middleware'=>'auth'], function(){
    Route::get('checkout/placeorder', ['as' => 'store.checkout.place', 'uses' => 'CheckoutController@place']);
    Route::get('account/orders', ['as' => 'account.orders', 'uses' => 'AccountController@orders']);
});

Route::group(['middleware'=>'auth_admin', 'prefix'=>'admin', 'where'=>['id'=>'[0-9]+']], function() {

    // Area Admin
    Route::get('/', ['as'=>'admin', 'uses'=>'AdminController@index']);

    Route::get('/pedidos',          ['as'=>'admin.pedidos', 'uses'=>'AdminController@orders']);
    Route::post('/pedidos/status',  ['as'=>'admin.pedidos.status', 'uses'=>'AdminController@status']);

    Route::group(['prefix'=>'products'], function() {
        get('/',            ['as'=>'admin.products',            'uses'=>'ProductsController@index']);
        get('/create',      ['as'=>'admin.products.create',     'uses'=>'ProductsController@create']);
        post('/store',      ['as'=>'admin.products.store',      'uses'=>'ProductsController@store']);
        get('{id}/destroy', ['as'=>'admin.products.destroy',    'uses'=>'ProductsController@destroy']);
        get('{id}/edit',    ['as'=>'admin.products.edit',       'uses'=>'ProductsController@edit']);
        put('{id}/update',  ['as'=>'admin.products.update',     'uses'=>'ProductsController@update']);

    });

    Route::group(['prefix'=>'categories'], function() {
        get('/',            ['as'=>'admin.categories',            'uses'=>'CategoriesController@index']);
        get('/create',      ['as'=>'admin.categories.create',     'uses'=>'CategoriesController@create']);
        post('/store',      ['as'=>'admin.categories.store',      'uses'=>'CategoriesController@store']);
        get('{id}/destroy', ['as'=>'admin.categories.destroy',    'uses'=>'CategoriesController@destroy']);
        get('{id}/edit',    ['as'=>'admin.categories.edit',       'uses'=>'CategoriesController@edit']);
        put('{id}/update',  ['as'=>'admin.categories.update',     'uses'=>'CategoriesController@update']);

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
