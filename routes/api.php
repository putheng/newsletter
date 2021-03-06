<?php

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');

Route::group(['middleware' => ['auth:api'], 'prefix' => 'v2'], function(){
	Route::group(['middleware' => 'role:admin'], function () {

		Route::get('me', 'AdminController@profile');
		Route::get('news/my', 'AdminController@news');

		Route::post('news/delete', 'Admin\NewsController@destroy');
		Route::post('news/create', 'Admin\NewsController@storeImage');

	});
});

Route::get('/news', 'Admin\NewsController@show');
Route::get('/news/{news}', 'NewsController@show');