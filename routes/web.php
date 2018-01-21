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

Route::post('add/product', 'ProductController@add')->name('addProduct');

Route::post('add/category', 'CategoryController@add')->name('addCategory');

Route::post('users/{user}/allow', 'UserController@allow')->name('allowCategory');
