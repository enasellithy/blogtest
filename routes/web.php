<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

/*Route::get('/sms',function(\Nexmo\Laravel\Facade\Nexmo){
    Nexmo::message()->send([
        'to' => '201203298102',
        'from' =>  'Enas',
        'text' => 'App Hello'
        ]);
});*/

Route::group(['middleware'=>'web'],function(){
    Route::get('/','PostController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    Route::get('blog/{slug}',[
            'as' => 'blog.single',
            'uses' => 'PostController@getSingle'
            ])->where('slug','[\w\d\-\_]+');
    Route::get('user/{user}/show','UserController@show');
    
    Route::get('post/{post}/show','PostController@show');
    Route::post('comment/store','CommentController@store');
    Route::post('sub','PostController@saveSub');

    
});

/*
|-------------------------------------------------------------------------
| Admin Routes
|-------------------------------------------------------------------------
*/
//Route::group(['middleware'=>'admin'],function(){
//Route::group(['middleware'=>'roles',['roles'=>['admin']]],function(){
/*Route::group(['namespace' => 'Admin',['perfix'=> 'admin','middleware'=>'roles',['roles'=>['admin']]]],function(){
    //
   
});*/
Route::group(['perfix'=>'admin','middleware'=>'roles','namespace' => 'Admin'],function(){
   require_once __DIR__.'/admin.php';
});
 
    /*Route::get('/admin',[
        'uses'       => 'AdminController@admin',
        'as'         => 'content.admin',
        //'middleware' => 'roles',
        'roles'      => ['admin']
        ]);*/
//});
