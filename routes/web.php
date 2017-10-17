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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('products', 'ProductsController@index')->name('products');

Route::get('products/{url}', 'ProductsController@show')->name('product');

Route::get('{url}', 'CategoriesController@show')->name('category');


Route::post('search', 'ProductsController@searchResult');


// Route::get('search/{url}', 'ProductsController@searchResult')->name('str');



