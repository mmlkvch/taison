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

Route::get('/', ['as' => 'home', 'uses' => function (){
    return view('welcome');
}]);


Route::get('cart', 'ProductController@cart')->name('products.cart');

Route::get('add-to-cart/{id}', 'ProductController@addToCart')->name('products.addToCart');
Route::get('send', 'ProductController@send')->name('products.send');

Route::resource('products', 'ProductController');