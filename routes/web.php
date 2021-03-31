<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AppTestController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CommonController;


//Reuse common tasks
Route::get('common/filter-portfolio-items', [CommonController::class, 'filterItems'])->name('common.filter_portfolio_items');
Route::get('common/sync-project-details/{id?}', [CommonController::class, 'syncProjectDetails'])->name('common.sync_project_details');
Route::post('common/bid-now', [CommonController::class, 'bidNow'])->name('common.bid_now');

//admin
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:admin'], function(){

	Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);
	Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

	Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
		Route::get('missed', ['as' => 'missed', 'uses' => 'ProjectController@missed']);
		Route::get('missed/details/{id?}', ['as' => 'missed.details', 'uses' => 'ProjectController@missedDetails']);

		Route::get('bidded', ['as' => 'bidded', 'uses' => 'ProjectController@bidded']);
		Route::get('bidded/details/{id?}', ['as' => 'bidded.details', 'uses' => 'ProjectController@biddedDetails']);
		Route::get('bidded/mark-as-replied/{id?}', ['as' => 'bidded.mark_as_replied', 'uses' => 'ProjectController@markAsReplied']);

		Route::get('replied', ['as' => 'replied', 'uses' => 'ProjectController@replied']);
		Route::get('replied/details/{id?}', ['as' => 'replied.details', 'uses' => 'ProjectController@repliedDetails']);
		Route::get('replied/mark-as-accepted/{id?}', ['as' => 'replied.mark_as_accepted', 'uses' => 'ProjectController@markAsAccepted']);

		Route::get('accepted', ['as' => 'accepted', 'uses' => 'ProjectController@accepted']);
		Route::get('accepted/details/{id?}', ['as' => 'accepted.details', 'uses' => 'ProjectController@acceptedDetails']);

		//Route::get('details', ['as' => 'details', 'uses' => 'ProjectController@details']);
		Route::get('filters', ['as' => 'filters', 'uses' => 'ProjectController@filters']);
		Route::post('filters/update', ['as' => 'filters.update', 'uses' => 'ProjectController@updateFilters']);
	});

	Route::group(['prefix' => 'settings', 'as' => 'settings.'], function(){

		Route::get('freelancer-api-client', ['as' => 'freelancer_api_client', 'uses' => 'FreelancerApiClientController@index']);
		Route::post('freelancer-api-client', ['as' => 'freelancer_api_client.update', 'uses' => 'FreelancerApiClientController@update']);

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
			Route::get('sync', ['as' => 'sync', 'uses' => 'SkillController@sync']);
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

	Route::group(['prefix' => 'leaves-management', 'as' => 'leaves_management.'], function(){

		Route::group(['prefix' => 'leaves', 'as' => 'leaves.'], function(){

			Route::get('/', ['as' => 'index', 'uses' => 'LeaveController@index']);
			Route::get('view/{id?}', ['as' => 'edit', 'uses' => 'LeaveController@edit']);
		});

		Route::group(['prefix' => 'requests', 'as' => 'requests.'], function(){
			
			Route::get('/', ['as' => 'index', 'uses' => 'LeaveRequestController@index']);
			Route::get('view/{id?}', ['as' => 'edit', 'uses' => 'LeaveRequestController@edit']);
			Route::post('accept', ['as' => 'accept', 'uses' => 'LeaveRequestController@accept']);
			Route::post('reject', ['as' => 'reject', 'uses' => 'LeaveRequestController@reject']);
		});

	});
	
});

//admin close

//bidder
Route::group(['namespace' => 'App\Http\Controllers\Bidder', 'prefix' => 'bidder', 'as' => 'bidder.', 'middleware' => 'role:bidder'], function(){

	Route::get('/', ['as' => 'index', 'uses' => 'BidderController@index']);
	Route::get('bid-later-counter', ['as' => 'bid_later_counter', 'uses' => 'ProjectController@bidLaterCounter']);

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

	Route::group(['prefix' => 'projects', 'as' => 'projects.'], function(){
		
		Route::get('live-feed', ['as' => 'live_feed', 'uses' => 'LiveFeedController@liveFeed']);
		Route::get('get-live-feed', ['as' => 'get_live_feed', 'uses' => 'LiveFeedController@getLiveFeed']);
		Route::get('details/get-portfolio-items', ['as' => 'details.get_portfolio_items', 'uses' => 'LiveFeedController@getPortfolioItems']);
		Route::get('details/{id?}', ['as' => 'details', 'uses' => 'LiveFeedController@liveFeedDetails']);

		Route::get('sync-live-feed-details/{id?}', ['as' => 'sync_live_feed_details', 'uses' => 'LiveFeedController@syncLiveFeedDetails']);
		Route::post('bid-now', ['as' => 'bid_now', 'uses' => 'LiveFeedController@bidNow']);
		Route::get('mark-as-miss-it/{id?}', ['as' => 'mark_as_miss_it', 'uses' => 'LiveFeedController@markAsMissIt']);
		Route::get('mark-as-bid-later/{id?}', ['as' => 'mark_as_bid_later', 'uses' => 'LiveFeedController@markAsBidLater']);

		Route::get('bid-later', ['as' => 'bid_later', 'uses' => 'ProjectController@bidLater']);
		Route::get('bid-later-details/{id?}', ['as' => 'bid_later_details', 'uses' => 'ProjectController@bidLaterDetails']);
		Route::get('miss-project/{id?}', ['as' => 'miss_project', 'uses' => 'ProjectController@missProject']);
		
	});
	
});
//bidder close


//Test Freelancer APi's: request & response
Route::get('freelancer-api/request/{type?}', [ApiController::class, 'request'])->name('bidder.freelancer_api.request');
Route::get('freelancer-api/response/{type?}', [ApiController::class, 'response'])->name('bidder.freelancer_api.response');

Route::get('/home', function(){
    return redirect(route('bidder.index'));
})->name('home');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');

Auth::routes(['register' => false]);

Route::get('storage/images/{dir}/{filename?}', function ($dir, $filename) {
	return Storage::get(config('constants.images_dir') . $dir . '/' . $filename);
})->name('image_source');

View::composer(['admin.layouts.master'], function($view){
	$view->with('phase_2', \App\Models\Option::where('key', 'phase_2')->first());
	$view->with('pending_requests', \App\Models\Leave::where('status', 'pending')->count());
});

View::composer(['bidder.layouts.master'], function($view){
	$view->with('phase_2', \App\Models\Option::where('key', 'phase_2')->first());
	$view->with('bid_later_counter', \App\Models\Project::where('user_id', Auth::user()->id)->where('status', 'bid_later')->count());
});

//test app routes
Route::get(config('app-test.app_test_route'),[AppTestController::class,'index'])->name('app_test.index');
Route::post(config('app-test.app_test_route'),[AppTestController::class,'appAuthConfirmation'])->name('app_test.app_auth_confirmation');
Route::post(config('app-test.app_test_route') . '/login',[AppTestController::class,'login'])->name('app_test.login');