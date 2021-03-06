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
		Route::get('list','AdminController\NewsController@list_news')->name('news.list');
		Route::get('news-data','AdminController\NewsController@get_news_data')->name('news.data');
		Route::get('add','AdminController\NewsController@add')->name('news.add');
		Route::post('add','AdminController\NewsController@create')->name('news.create');
		Route::post('edit/{id?}','AdminController\NewsController@create')->name('news.edit');
		Route::get('detail','AdminController\NewsController@get_detail')->name('news.detail');
		Route::get('delete/{id?}','AdminController\NewsController@delete')->name('news.delete');
	});
	// =========================================Category=======================================
	Route::group(['prefix' => 'category'], function() {
		Route::get('list','AdminController\CategoryController@list_categories')->name('category.list');
		Route::get('add','AdminController\CategoryController@add')->name('category.add');
		Route::post('add','AdminController\CategoryController@create')->name('category.create');
	});
	Route::group(['prefix' => 'video'], function() {
		Route::get('list','AdminController\VideoController@admin_index')->name('admin.video.index');
		Route::get('video-data','AdminController\VideoController@get_video_data')->name('admin.video.data');
		Route::get('create','AdminController\VideoController@create')->name('admin.video.create');
		Route::post('create','AdminController\VideoController@store')->name('admin.video.store');
		Route::get('detail','AdminController\VideoController@get_detail')->name('admin.video.detail');
		Route::post('edit/{id?}','AdminController\VideoController@edit')->name('admin.video.edit');
		Route::get('delete/{id?}','AdminController\VideoController@delete')->name('admin.video.delete');
	});
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
