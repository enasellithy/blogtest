<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware'=>'web'],function(){
    Route::get('/','PostController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    Route::get('blog/{slug}',[
            'as' => 'blog.single',
            'uses' => 'PostController@getSingle'
            ])->where('slug','[\w\d\-\_]+');
    Route::get('user/{user}/show','UserController@show');
    Route::resource('post','PostController');
    Route::get('post/{post}/edit','PostController@edit');
    Route::post('post/{post}/update','PostController@update');
    Route::get('post/{post}/delete','PostController@destroy');
    Route::get('post/{post}/show','PostController@show');
    Route::post('comment/store','CommentController@store');

    // Upload Image
    Route::get('public/images/post/{$image}',function($name){
    			return public_path('images/post/'.$name); 
    	});
});

/*
|-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------
*/
Route::group(['middleware'=>'admin'],function(){
    Route::get('/admin','AdminController@index');
    Route::resource('/user','UserController');
    Route::get('user/{user}/edit','UserController@edit');
    Route::post('user/{user}/update','UserController@update');
    Route::get('user/{user}/delete','UserController@destroy');
    Route::get('admin/post','AdminController@getPostIndex');
    Route::get('admin/comment','AdminController@getCommentIndex');
    Route::get('admin/{comment}/edit','AdminController@editComment');
    Route::post('comment/{comment}/update','AdminController@updateComment');
    Route::get('comment/{comment}/delete','AdminController@deleteComment');
});
