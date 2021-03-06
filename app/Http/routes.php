<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('redis', ['uses' => 'TestController@cache']);
Route::get('/', array(
    'as' => 'index',
    'uses' => 'WelcomeController@index',
));
Route::get('add_pet', array(
    'as' => 'add.pet',
    'uses' => 'RegistrationController@addPet',
));
Route::post('check_email', array(
	'as' => 'check.email',
	'uses' => 'LoginController@check_email'
));
Route::post('files/newsfeed', array(
	'as' => 'files.newsfeed',
	'uses' => 'UploadsController@newsfeed'
));
Route::post('search', array(
	'as' => 'do.search',
	'uses' => 'HomeController@search'
));
Route::get('search', array(
	'as' => 'neighbors.search',
	'uses' => 'HomeController@neighborsSearch'
));
Route::get('get/notification', array(
	'as' => 'get.notification',
	'uses' => 'HomeController@notification'
));
Route::post('profile/req/friend', array(
	'as' => 'profile.request.friend',
	'uses' => 'ProfileController@dispatchFriendRequest'
));
Route::post('profile/req/friend_ignore', array(
	'as' => 'profile.request.friend_ignore',
	'uses' => 'ProfileController@ignoreFriendReq'
));
Route::post('profile/req/accept/', array(
	'as' => 'profile.request.add_friend',
	'uses' => 'ProfileController@acceptFriendRequest'
));
// Login
Route::post('login', array(
	'as' => 'login',
	'uses' => 'LoginController@signin'
));
Route::get('logout', array(
	'as' => 'logout',
	'uses' => 'LoginController@logout'
));
// Registration & Validation
Route::post('register', array(
	'as' => 'register',
	'uses' => 'RegistrationController@register'
));
Route::post('register/pet', array(
	'as' => 'register.petRegister',
	'uses' => 'RegistrationController@petRegister'
));
Route::post('check_email', array(
	'as' => 'check.email',
	'uses' => 'LoginController@check_email'
));

//Friends
Route::post('profile/req/friend', array(
	'as' => 'profile.request.friend',
	'uses' => 'ProfileController@dispatchFriendRequest'
));
//newsfeed

Route::post('comment', array(
	'as' => 'get.comment',
	'uses' => 'PostsController@getComment'
));
Route::post('insert/comment', array(
	'as' => 'insert.comment',
	'uses' => 'UploadsController@insertComment'
));
Route::post('islike', array(
	'as' => 'is.liked',
	'uses' => 'PostsController@isLike'
));
Route::post('getnewsfeed', array(
	'as' => 'get.newsfeed',
	'uses' => 'PostsController@getnewsfeed'
));
Route::post('video', array(
	'as' => 'get.video',
	'uses' => 'HomeController@getVideo'
));
//profile
Route::get('profile/edit_settings', array(
	'as' => 'profile.edit',
	'uses' => 'ProfileController@getSettingsView'
	));
Route::get('profile/{id}', array(
	'as' => 'profile.view',
	'uses' => 'ProfileController@showProfile'
	));
Route::post('profile/update', array(
	'as' => 'profile.doUpdate',
	'uses' => 'ProfileController@editProfile'
));
Route::get('settings', array(
	'as' => 'profile.settings',
	'uses' => 'HomeController@settings'
));
Route::post('profilemid', array(
	'as' => 'view.profilemenu',
	'uses' => 'ProfileController@viewit'
));
//home
Route::get('home', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));


//inside sns
Route::get('profile/{user_id}/about', [
	'as' => 'profile.about',
	'uses' => 'ProfileController@showAbout'
]);
Route::get('profile/{user_id}/gallery', [
	'as' => 'profile.gallery',
	'uses' => 'ProfileController@showGallery'
]);
Route::get('profile/{user_id}/pets/{pet_id}', [
	'as' => 'profile.showPetProfile',
	'uses' => 'ProfileController@showPetProfile'
]);
Route::get('profile/{user_id}/pets', [
	'as' => 'profile.petslist',
	'uses' => 'ProfileController@petsList'
]);

Route::get('home/petsoftheweek', [
	'as' => 'public.dogsoftheweek',
	'uses' => 'HomeController@dogsWeek'
]);

Route::get('home/petshop', [
	'as' => 'public.nearestpetshop',
	'uses' => 'HomeController@nearestPS'
]);

Route::get('home/veterinarian', [
	'as' => 'public.nearestvet',
	'uses' => 'HomeController@nearestVet'
]);

Route::get('home/petfoundation', [
	'as' => 'public.foundation',
	'uses' => 'HomeController@petFoundation'
]);

Route::get('neighbors', [
	'as' => 'public.neighbors',
	'uses' => 'HomeController@rockyNeighbors'
]);

Route::get('myuploads', [
	'as' => 'public.myuploads',
	'uses' => 'HomeController@myUploads'
]);

Route::get('history', [
	'as' => 'public.history',
	'uses' => 'HomeController@history'
]);

Route::get('pet/missingpets', [
	'as' => 'public.missingpets',
	'uses' => 'HomeController@missingPets'
]);

Route::get('underconstruction', [
	'as' => 'uc',
	'uses' => 'WelcomeController@uc'

]);

Route::group(['prefix' => 'administration', 'namespace' => 'Admin', 'middleware' => ['auth', 'manage']], function() {
	Route::get('main', [
		'as' => 'admin.main',
		'uses' => 'DashboardController@main'
	]);
	Route::get('overview', [
		'as' => 'admin.stats.overview',
		'uses' => 'DashboardController@statsOverview'
	]);
	Route::get('list_user', [
		'as' => 'admin.list.user',
		'uses' => 'DashboardController@listUsers'
	]);
	Route::get('list_user/{id}', [
		'as' => 'admin.list.user.data',
		'uses' => 'DashboardController@userData'
	]);
	Route::get('list_errors', [
		'as' => 'admin.list.errors',
		'uses' => 'DashboardController@listErrors'
	]);
	Route::get('list_errors/{id}', [
        'as' => 'admin.single.error',
        'uses' => 'DashboardController@displaySingleError'
	]);
});
Route::post('test', array(
    'as' => 'test',
    'uses' => 'WelcomeController@test',
));