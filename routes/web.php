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

	Route::group(['prefix' => 'portfolio', 'as' => 'portfolio.'], function(){
		
		Route::group(['prefix' => 'items', 'as' => 'items.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'ItemController@index']);
			Route::get('create', ['as' => 'create', 'uses' => 'ItemController@create']);
			Route::post('create', ['as' => 'save', 'uses' => 'ItemController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'ItemController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'ItemController@update']);
		});


		Route::group(['prefix' => 'skills', 'as' => 'skills.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'SkillController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'SkillController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'SkillController@edit']);
			Route::post('updated', ['as' => 'update', 'uses' => 'SkillController@update']);
		});

		Route::group(['prefix' => 'industries', 'as' => 'industries.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'IndustryController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'IndustryController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'IndustryController@edit']);
			Route::post('updated', ['as' => 'update', 'uses' => 'IndustryController@update']);
		});

		Route::group(['prefix' => 'type', 'as' => 'types.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'TypeController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'TypeController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'TypeController@edit']);
			Route::post('updated', ['as' => 'update', 'uses' => 'TypeController@update']);
		});

	});


	Route::group(['prefix' => 'helpers', 'as' => 'helpers.'], function(){
		
		Route::group(['prefix' => 'starter', 'as' => 'starter.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'StarterController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'StarterController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'StarterController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'StarterController@update']);
			Route::post('delete', ['as' => 'delete', 'uses' => 'StarterController@delete']);
		});


		Route::group(['prefix' => 'tech-star', 'as' => 'tech_star.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'TechStarController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'TechStarController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'TechStarController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'TechStarController@update']);
			Route::post('delete', ['as' => 'delete', 'uses' => 'TechStarController@delete']);
		});

		Route::group(['prefix' => 'portfolio-initiator', 'as' => 'portfolio_initiator.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'PortfolioInitiatorController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'PortfolioInitiatorController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'PortfolioInitiatorController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'PortfolioInitiatorController@update']);
			Route::post('delete', ['as' => 'delete', 'uses' => 'PortfolioInitiatorController@delete']);
		});

		Route::group(['prefix' => 'ender', 'as' => 'ender.'], function(){
			Route::get('/', ['as' => 'index', 'uses' => 'EnderController@index']);
			Route::post('create', ['as' => 'save', 'uses' => 'EnderController@save']);
			Route::get('edit/{id?}', ['as' => 'edit', 'uses' => 'EnderController@edit']);
			Route::post('update', ['as' => 'update', 'uses' => 'EnderController@update']);
			Route::post('delete', ['as' => 'delete', 'uses' => 'EnderController@delete']);
		});



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

	Route::group(['prefix' => 'leaves', 'as' => 'leaves.'], function(){
		Route::get('/', ['as' => 'index', 'uses' => 'LeaveController@index']);
		Route::get('request', ['as' => 'create', 'uses' => 'LeaveController@create']);
		Route::post('create', ['as' => 'save', 'uses' => 'LeaveController@save']);
		Route::get('view/{id?}', ['as' => 'edit', 'uses' => 'LeaveController@edit']);
		
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
