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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('product/store', 'ProductController@store')->name('storeProduct');

Route::post('category/store', 'CategoryController@store')->name('storeCategory');

Route::post('users/{user}/update', 'UserController@update')->name('updateUserCategory');

Route::get('products/delete/{product}', 'ProductController@delete')->name('deleteProduct');

Route::get('categories/delete/{category}', 'CategoryController@delete')->name('deleteCategory');

Route::post('products/{product}/update', 'ProductController@update')->name('updateProduct');

Route::post('categories/{category}/update', 'CategoryController@update')->name('updateCategory');

Route::get('users/delete/{user}', 'UserController@delete')->name('deleteUser');

Route::get('product/getStoreModal', 'ProductController@getStoreModalPartial');

Route::get('product/getUpdatePartial', 'ProductController@getUpdateModalPartial');
