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
use App\Http\Controllers\ProductController;

Route::get('wel', function () {
    return view('welcome');
});

Route::get('particularProduct','App\Http\Controllers\ProductController@particularProduct');
Route::get('/','App\Http\Controllers\ProductController@showProduct');
Route::get('productAdd','App\Http\Controllers\ProductController@productAdd');
Route::post('productSave','App\Http\Controllers\ProductController@productSave');
