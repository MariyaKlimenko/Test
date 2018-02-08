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

Route::post('product/store', 'ProductController@store')
    ->name('storeProduct')
    ->middleware('role:admin');

Route::post('category/store', 'CategoryController@store')
    ->name('storeCategory')
    ->middleware('role:admin');

Route::post('users/{user}/update', 'UserController@update')
    ->name('updateUserCategory')
    ->middleware('role:admin');

Route::get('products/delete/{product}', 'ProductController@delete')
    ->name('deleteProduct')
    ->middleware('role:admin');

Route::get('categories/delete/{category}', 'CategoryController@delete')
    ->name('deleteCategory')
    ->middleware('role:admin');

Route::post('products/{product}/update', 'ProductController@update')
    ->name('updateProduct')
    ->middleware('role:admin');

Route::post('categories/{category}/update', 'CategoryController@update')
    ->name('updateCategory')
    ->middleware('role:admin');

Route::get('users/delete/{user}', 'UserController@delete')
    ->name('deleteUser')
    ->middleware('role:admin');

Route::get('product/getStoreModal', 'ProductController@getStoreModalPartial')
    ->name('getStoreProductModal')
    ->middleware('role:admin');

Route::get('product/getUpdatePartial', 'ProductController@getUpdateModalPartial')
    ->name('getUpdateProductModal')
    ->middleware('role:admin');

Route::get('category/getStoreModal', 'CategoryController@getStoreModalPartial')
    ->name('getStoreCategoryModal')
    ->middleware('role:admin');

Route::get('category/getUpdatePartial', 'CategoryController@getUpdateModalPartial')
    ->name('getUpdateCategoryModal')
    ->middleware('role:admin');

Route::get('user/getUpdateCategoriesPartial', 'UserController@getUpdateModalPartial')
    ->name('getUpdateUserCategoryModal')
    ->middleware('role:admin');