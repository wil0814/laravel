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
	//return view('index');

    return view('welcome');
});

Route::get('/home','homeController@index');

Route::get('/new','newController@create');

Route::post('/input', 'newController@input');

Route::post('/page','pageController@view');

Route::post('/find','homeController@select');













