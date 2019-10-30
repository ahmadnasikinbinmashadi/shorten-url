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
    return redirect(route('admin.getLogin'));
});

/**
 * PREFIX AUTH
 */
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
    Route::get('login', 'LoginController@index')->name('admin.getLogin');
    Route::post('login', 'LoginController@store')->name('admin.postLogin');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {
	Route::get('dashboard', 'HomeController@index')->name('dashboard.index');

	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});
