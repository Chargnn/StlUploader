<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@index')->name('index');

Route::post('/stl/create', 'StlController@create')->name('create_stl');
Route::get('/stl/detach-tag', 'StlController@detachTag')->name('detach_tag');
Route::get('/stl/detach-category', 'StlController@detachCategory')->name('detach_cat');
Route::get('/stl/delete', 'StlController@delete')->name('delete_stl');

Route::post('/tag/upload', 'TagController@create')->name('create_tag');
Route::get('/tag/delete', 'TagController@delete')->name('delete_tag');

Route::post('/category/upload', 'CategoryController@create')->name('create_cat');
Route::get('/category/delete', 'CategoryController@delete')->name('delete_cat');

Auth::routes();
