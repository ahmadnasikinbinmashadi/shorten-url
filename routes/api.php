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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// API V1
Route::group(['prefix' => 'v1'], function() {
	// Authentication user
	Route::group(['prefix' => 'auth'], function() {
		Route::post('signup', 'AuthController@signup')->name('shorty.signup');
		Route::post('login', 'AuthController@login')->name('shorty.login');
	});
	// Menus of module
	Route::group(['middleware' => 'auth:api'], function() {
		Route::get('/shorten/logout', 'AuthController@logout')->name('shorty.logout');
		Route::post('/shorten', 'ShortyController@shorten')->name('shorty.shorten');
		Route::get('/shorten', 'ShortyController@findShortCode')->name('shorty.find-short-code');
		Route::get('/shorten/stats', 'ShortyController@Stats')->name('shorty.stats');
	});
});
