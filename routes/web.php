<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function(){

	Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

	Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){

		Route::get('api-keys', ['as' => 'api_keys', 'uses' => 'AdminController@APIKeys']);
		Route::get('profile', ['as' => 'profile', 'uses' => 'AdminController@profile']);
		Route::post('profile', ['as' => 'profile_update', 'uses' => 'AdminController@updateProfile']);
		
	});


	Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
		
		Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
		Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
		Route::post('create', ['as' => 'save', 'uses' => 'UserController@save']);
		Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'UserController@edit']);
		Route::post('update', ['as' => 'update', 'uses' => 'UserController@update']);


		Route::group(['prefix' => 'designations', 'as' => 'designations.'], function(){

			Route::get('/', ['as' => 'index', 'uses' => 'DesignationController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'DesignationController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'DesignationController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'DesignationController@update']);
	
		});

	});
	

});


Route::group(['namespace' => 'App\Http\Controllers\Bidder', 'prefix' => 'bidder', 'as' => 'bidder.', 'middleware' => 'role:bidder'], function(){

	Route::get('/', ['as' => 'index', 'uses' => 'BidderController@index']);

	Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){
		Route::get('/', ['as' => 'index', 'uses' => 'BidderController@settings']);
		Route::post('update', ['as' => 'update', 'uses' => 'BidderController@updateSettings']);
	});
	
});


Route::get('/home', function(){
    return redirect(route('bidder.index'));
})->name('home');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes(['register' => false]);

Route::get('storage/images/{dir}/{filename?}', function ($dir, $filename) {
	return Storage::get(config('constants.images_dir') . $dir . '/' . $filename);
})->name('image_source');
