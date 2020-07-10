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

Route::get('/', function () {
    return view('index');
});

Route::post('/stl/create', 'StlController@create')->name('create_stl');

Route::post('/tag/upload', 'StlController@create')->name('create_tag');

Route::post('/category/upload', 'StlController@create')->name('create_category');
