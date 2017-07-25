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

Route::group(['prefix' => 'admin', 'middleware' =>	'auth'], function() {
	Route::get('','AdminController\SystemController@index')->name('system');
	// =========================================News=======================================
	Route::group(['prefix' => 'news'], function() {
		Route::get('list','AdminController\NewsController@list')->name('news.list');
		Route::get('add','AdminController\NewsController@add')->name('news.add');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
