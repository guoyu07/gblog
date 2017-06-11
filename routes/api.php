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


//Admin  
Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function(){
	
	/**
	 * Category Manage
	 */
	Route::group(['prefix' => 'category'], function() {
		Route::name('category.create')->post('/', 'CategoryController@create');
		Route::name('category.changeStatus')->post('{category}', 'CategoryController@changeStatus');
		Route::name('category.list')->get('/', 'CategoryController@lists');
		Route::name('category.delete')->delete('{category}', 'CategoryController@delete');
	});

	Route::group(['prefix' => 'article'], function () {
		Route::name('article.publish')->post('publish', 'ArticleController@publish');
	});


	/**
	 * Notificatin Count
	 */
	Route::group(['prefix' => 'notification'], function(){
		Route::name('message.list')->get('message', 'NotificationController@message');
		Route::name('messageBox.list')->get('messagebox', 'NotificationController@messageBox');
	});

	/**
	 * User
	 */
	Route::group(['prefix' => 'user'], function(){
		Route::name('user.details')->get('/', 'UserController@details');
	});


	/**
	 * COmmon api
	 */
	Route::group([], function(){

		Route::name('file.upload.icon')->post('upload.icon', 'UploadController@iconUpload');

	});


});


//User
Route::group([], function(){

    Route::name('user.sigin')->post('sign_in', 'Home\UserController@sigin');

});
