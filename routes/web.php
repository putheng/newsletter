<?php

Route::group(['middleware' => 'role:admin'], function () {

	Route::get('/api/admin/profile', 'AdminController@profile');
	Route::get('/api/admin/news', 'Admin\NewsController@show');
	Route::post('/api/admin/news/delete', 'Admin\NewsController@destroy');
	Route::post('/api/admin/news/create', 'Admin\NewsController@store');

	Route::get('/admin/{vue?}', 'AdminController@index')
		->name('index')->where('vue', '[\/\w\.-]*');

});

Route::get('/', 'HomeController@index');
Route::get('/news/{news}', 'HomeController@show')->name('news.show');
Route::post('/api/v1/news/create', 'Admin\NewsController@storeImage');

Auth::routes();