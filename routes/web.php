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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/add-to-cart/{id}', [
    'uses' => 'ProductsController@getAddToCart',
    'as' => 'products.addToCart'
]);


Route::get('/shopping-cart/delete/{id}', 'ProductsController@deleteItemFromShoppingCart');
Route::get('/shopping-cart/remove-one/{id}', 'ProductsController@removeOneFromShoppingCart');
Route::get('/shopping-cart/add-one/{id}', 'ProductsController@addOneToShoppingCart');
Route::get('/products/cat/{id}', 'ProductsController@productsByCat');

Route::get('/shopping-cart', 'ProductsController@getCart');
Route::resource('categories', 'CategoriesController');
Route::resource('products', 'ProductsController');
Route::resource('users', 'UsersController');
Route::resource('orders', 'OrdersController');

Route::get('/home', 'HomeController@index')->name('home');

