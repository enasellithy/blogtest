<?php

 Route::get('/admin',[
        'uses'       => 'AdminController@index',
        'as'         => 'content.admin',
        'roles'      => ['Admin','Editor']
        ]);
Route::post('/add-role',[
	'uses'  => 'UserController@addRole',
	'as'    => 'add-role',
	'roles' => ['admin']
	]);
Route::resource('/user','UserController',['roles' => ['Admin']]);
Route::get('user/{user}/edit','UserController@edit',['roles' => ['admin']]);
Route::post('user/{user}/update','UserController@update',['roles' => ['admin']]);
Route::get('user/{user}/delete','UserController@destroy',
	['roles' => ['admin']]);
Route::get('admin/post','AdminController@getPostIndex',['Admin','Editor']);
Route::get('admin/comment','AdminController@getCommentIndex',['Admin','Editor']);
Route::get('admin/{comment}/edit','AdminController@editComment',
	['roles' => ['admin']]);
Route::post('comment/{comment}/update','AdminController@updateComment',
	['roles' => ['admin']]);
Route::get('comment/{comment}/delete','AdminController@deleteComment',
	['roles' => ['admin']]);
Route::resource('post','PostController',['roles' => ['admin','editor']]);
Route::get('post/{post}/edit','PostController@edit');
Route::post('post/{post}/update','PostController@update');
Route::get('post/{post}/delete','PostController@destroy');
/*
// Upload Image
Route::get('public/images/post/{$image}',function($name){
			return public_path('images/post/'.$name); 
	});
*/