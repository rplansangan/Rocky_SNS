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
Route::get('logout', array(
	'as' => 'logout',
	'uses' => 'LoginController@logout'
));
// Registration & Validation
Route::post('register', array(
	'as' => 'register',
	'uses' => 'RegistrationController@register'
));
Route::post('register/{id}/register_pet', array(
	'as' => 'register.petRegister',
	'uses' => 'RegistrationController@petRegister'
));

//profile
Route::get('profile/edit_settings', array(
	'as' => 'profile.edit',
	'uses' => 'ProfileController@getSettingsView'
	));
Route::post('profile/update', array(
	'as' => 'profile.doUpdate',
	'uses' => 'ProfileController@editProfile'
));
//home
Route::get('home', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));


//inside sns
Route::get('home/dogsoftheweek', [
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

Route::get('neighbors', [
	'as' => 'public.neighbors',
	'uses' => 'HomeController@rockyNeighbors'
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
	Route:;get('list_errors/{id}', [
        'as' => 'admin.single.error',
        'uses' => 'DashboardController@displaySingleError'
	]);
});
Route::get('test2', ['uses' => 'TestController@index']);
