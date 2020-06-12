<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['admin','auth']], function(){

});
Route::group(['prefix'=>'dashboard', 'middleware'=>['auth']], function(){
	Route::get('/', 'HomeController@index');
	Route::resource('user', 'UserController');
	Route::get('account/setting', 'UserController@setting')->name('user.setting');
	Route::post('change-password', 'UserController@changePassword')->name('change.password');
	Route::post('upload-avatar', 'UserController@uploadAvatar')->name('upload.avatar');
});