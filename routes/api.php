<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/user',function(Request $request){
	return $request->user();
})->middleware('auth:api');

Route::group(['perfix'=>'api'],function(){
	Route::get('post','ApiController@post');
	Route::get('author/{id}/posts','ApiController@authorPost');
	Route::get('author/show','ApiController@getUser');
	Route::post('apiuser/login','ApiController@apiUser');
	Route::get('test',function(){
		return 'Welcome To Api';
	});
});