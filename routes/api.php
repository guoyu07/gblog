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
	Route::name('category.create')->post('category', 'CategoryController@create');
	Route::name('category.modify')->post('category/{category}', 'CategoryController@modify');
});


//User
Route::group([], function(){

    Route::name('user.sigin')->post('sign_in', 'Home\UserController@sigin');

});
