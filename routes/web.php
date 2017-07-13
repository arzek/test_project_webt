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

Route::get('/',"MainCotroller@index");
Route::get('/get_currencies',"MainCotroller@get_currencies");
Route::get('/load_currencies',"MainCotroller@load_currencies");
Route::get('/fast_load_currencies',"MainCotroller@fast_load_currencies");
