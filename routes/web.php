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

Route::get('/', 'FrontController@index');


Auth::routes();

Route::group(['prefix'=>'dashboard/admin', 'middleware'=>['admin','auth']], function(){
	Route::resource('users', 'AdminUserController');
});
Route::group(['prefix'=>'dashboard', 'middleware'=>['auth']], function(){
	Route::resource('user', 'UserController');
	Route::get('account/setting', 'UserController@setting')->name('user.setting');
	Route::post('change-password', 'UserController@changePassword')->name('change.password');
	Route::post('upload-avatar', 'UserController@uploadAvatar')->name('upload.avatar');

	Route::resource('jamaah', 'JamaahController');

	Route::resource('masuk', 'MasukController');
	Route::post('filter-masuk', 'MasukController@filter')->name('filter.masuk');

	Route::resource('keluar', 'KeluarController');
	Route::post('filter-keluar', 'KeluarController@filter')->name('filter.keluar');

	Route::resource('saldo', 'SaldoController');
	Route::post('filter-saldo', 'SaldoController@filter')->name('filter.saldo');

	Route::resource('zakat', 'ZakatController');
	Route::post('filter-zakat', 'ZakatController@filter')->name('filter.zakat');

	Route::resource('kegiatan', 'KegiatanController');

	Route::resource('profil', 'ProfilController');
	Route::post('upload-foto', 'ProfilController@uploadFoto')->name('upload.foto');

});