<?php

use Illuminate\Support\Facades\Route;

//Not-Logged in Routes
Route::group(['prefix' => '/','middleware' => []], function() {
	Route::get('/', function () {
		return view('index');
	});

	Route::get('login', [
			'uses' => 'AuthController@index',
			'as' => 'login'
		]);
	Route::post('post-login', 'AuthController@postLogin'); 
	Route::get('registration', 'AuthController@registration');
	Route::post('post-registration', 'AuthController@postRegistration'); 
});

//Logged in Routes
Route::group(['prefix' => '/','middleware' => ['auth']], function() {
	Route::get('dashboard', [
			'uses' => 'AuthController@dashboard',
			'as' => 'dashboard'
		]);
	Route::get('logout', [
			'uses' => 'AuthController@logout',
			'as' => 'logout'
		]);
	Route::resource('leaves','LeaveApplicationController');
});

//APIs
Route::group(['prefix' => '/api/','middleware' => []], function() {
	Route::get('XmlFiles/download/{token}/{id}', [
			'uses' => 'FileController@download',
			'as' => 'api.download'
		]);
	Route::post('XmlFiles/upload', [
			'uses' => 'FileController@upload',
			'as' => 'api.upload'
		]);
});