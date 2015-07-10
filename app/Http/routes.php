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
Route::get('test', array(
    'as' => 'test',
    'uses' => 'WelcomeController@test',
));

Route::get('/', array(
    'as' => 'index',
    'uses' => 'WelcomeController@index',
));
Route::post('check_email', array(
	'as' => 'check.email',
	'uses' => 'LoginController@check_email'
));
Route::post('files/newsfeed', array(
	'as' => 'files.newsfeed',
	'uses' => 'UploadsController@newsfeed'
));

// Login
Route::post('login', array(
	'as' => 'login',
	'uses' => 'LoginController@signin'
));
Route::get('login/attempt', array(
	'as' => 'login.attempt',
	'uses' => 'LoginController@attempted'
));
Route::get('login/forgot', [
	'as' => 'login.forgot',
	'uses' => 'LoginController@forgotView'
]);
Route::get('login/forgot/msg', [
	'as' => 'login.forgot.message',
	'uses' => 'LoginController@forgotMessage'
]);
Route::post('login/forgot/process', [
	'as' => 'login.forgot.process',
	'uses' => 'LoginController@forgotProcess'
]);
Route::get('login/forgot/from/{id}/{hash}', [
	'as' => 'login.forgot.validate',
	'uses' => 'LoginController@validatePass'
]);
Route::get('login/forgot/resend/{id}', [
	'as' => 'login.forgot.resend',
	'uses' => 'LoginController@resendToken'
]);
Route::post('login/forgot/process_pass', [
	'as' => 'login.forgot.process_pass',
	'uses' => 'LoginController@processPass'
]);
Route::get('logout', array(
	'as' => 'logout',
	'uses' => 'LoginController@logout'
));
// Registration & Validation
Route::post('register', array(
	'as' => 'register',
	'uses' => 'RegistrationController@register'
));

Route::get('register/add_pet', [
	'as' => 'register.add_pet',
	'uses' => 'RegistrationController@registerPetOpt'
]);

Route::get('register/validate/{id}/{hash}', array(
	'middleware' => 'verified',
	'as' => 'register.validateHash',
	'uses' => 'RegistrationController@validateRegistration'
));
Route::get('register/resend/{id}', array(
	'middleware' => 'verified',
	'as' => 'register.validateRehash',
	'uses' => 'RegistrationController@resend'
));
Route::get('message', array(
	'middleware' => 'verified',
	'as' => 'validate',
	'uses' => 'RegistrationController@validateMessage'
));
Route::get('register/{id}', array(
	'middleware' => 'verified',
	'as' => 'register.details',
	'uses' => 'RegistrationController@details'
));
Route::post('register/update', array(
	'as' => 'register.detailsUpdate',
	'uses' => 'RegistrationController@updateDetails'
));
Route::get('register/{id}/pet', array(
	'as' => 'register.petdetails',
	'uses' => 'RegistrationController@registerpet',
));
Route::post('register/{id}/register_pet', array(
	'as' => 'register.petRegister',
	'uses' => 'RegistrationController@petRegister'
));
Route::post('register/pet/field', array(
	'as' => 'register.pet.refreshField',
	'uses' => 'RegistrationController@refreshPetFields'
));

/*Profile route*/
Route::get('profile/change', array(
'as' => 'profile.get.view',
'uses' => 'ProfileController@getSettingsView'
));
Route::post('profile/change/process', array(
'as' => 'profile.get.dispatch',
'uses' => 'ProfileController@getSettingsDispatcher'
));
Route::get('petlist/{id}', array(
	'as' => 'profile.petlist',
	'uses' => 'ProfileController@petlist'
));
Route::get('profile/{id}/pet/{pet_id}', array(
	'as' => 'profile.showPetProfile',
	'uses' => 'ProfileController@showPetProfile'
));
Route::post('likes/set/{post_id}', array(
	'as' => 'likes.set',
	'uses' => 'PostsController@setLike'
));
Route::post('comment/set/{post_id}', array(
	'as' => 'comments.set',
	'uses' => 'PostsController@createComment'
));
Route::post('posts/del', array(
	'as' => 'posts.del.dispatcher',
	'uses' => 'PostsController@deleteDispatch'
));
Route::post('newsfeed/refresh', array(
	'as' => 'newsfeed.refresh',
	'uses' => 'PostsController@getNextNewsFeed'
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
Route::get('profile/friends/{id}', array(
	'as' => 'profile.friends',
	'uses' => 'ProfileController@userFriends'
));
Route::get('profile/edit', array(
	'as' => 'profile.settings',
	'uses' => 'ProfileController@settings'
));
Route::post('profile/edit', array(
	'as' => 'profile.setings.patch',
	'uses' => 'ProfileController@editProfile'
));

Route::get('profile/{id}', array(
	'as' => 'profile.showProfile',
	'uses' => 'ProfileController@showProfile',
	'after' => 'cache:5'    
));


Route::get('home', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));


//inside sns
Route::get('pet/lovers', [
	'as' => 'public.lovers',
	'uses' => 'WelcomeController@petlovers'
]);

Route::get('pet/lovers/dogsoftheweek', [
	'as' => 'public.dogsoftheweek',
	'uses' => 'WelcomeController@dogsWeek'
]);

Route::get('pet/lovers/nearestpetshop', [
	'as' => 'public.nearestpetshop',
	'uses' => 'WelcomeController@nearestPS'
]);

Route::get('pet/lovers/nearestvet', [
	'as' => 'public.nearestvet',
	'uses' => 'WelcomeController@nearestVet'
]);

Route::get('pet/lovers/neighbors', [
	'as' => 'public.neighbors',
	'uses' => 'WelcomeController@rockyNeighbors'
]);

Route::get('pet/missingpets', [
	'as' => 'public.missingpets',
	'uses' => 'WelcomeController@missingPets'
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
	Route:;get('list_errors/{id}', [
        'as' => 'admin.single.error',
        'uses' => 'DashboardController@displaySingleError'
	]);
});
Route::get('test2', ['uses' => 'TestController@index']);