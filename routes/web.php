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
    return view('web.index');
});


/* Dashboard Index   */
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

   Route::get('{path?}',function(){
       return view('dashboard.index2');
   })->where('path', '[\/\w\.-]*');

});
