<?php
use SNS\Models\Posts;
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
Route::get('test', function() {
	$collection = Posts::all();
	
	echo "<pre>";
	print_r($collection);
	echo "</pre>";
});
Route::get('testupload/{uid}/{fid}', array(
	'uses' => 'UploadsController@getImage'
));
Route::post('test/upload', array(
	'as' => 'test.upload',
	'uses' => 'UploadsController@testUpload'
));
Route::post('files/newsfeed', array(
	'as' => 'files.newsfeed',
	'uses' => 'UploadsController@newsfeed'
));
Route::get('files/get/image/{user_id}/{file_id}', array(
	'as' => 'files.get.image',
	'uses' => 'UploadsCOntroller@getImage'
));

Route::get('/', array(
	'as' => 'index',
	'uses' => 'WelcomeController@index'
));
// Login
Route::post('login', array(
	'as' => 'login',
	'uses' => 'LoginController@signin'
));
Route::get('login/attempt', array(
	'as' => 'login.attempted',
	'uses' => 'LoginController@attempted'
));

Route::get('logout', array(
	'as' => 'logout',
	'uses' => 'LoginController@logout'
));
// Registration & Validation
Route::any('register', array(
	'as' => 'register',
	'uses' => 'RegistrationController@register'
));
Route::get('register/validate/{id}/{hash}', array(
	'as' => 'register.validateHash',
	'uses' => 'RegistrationController@validateRegistration'
));
Route::get('register/resend/{id}', array(
	'as' => 'register.validateRehash',
	'uses' => 'RegistrationController@resend'
));
Route::get('message', array(
	'as' => 'validate',
	'uses' => 'RegistrationController@validateMessage'
));
Route::get('register/{id}', array(
	'as' => 'register.details',
	'uses' => 'RegistrationController@details'
));
Route::post('register/update/{id}', array(
	'as' => 'register.detailsUpdate',
	'uses' => 'RegistrationController@updateDetails'
));


/*Profile route*/
Route::get('profile/{id}', array(
	'as' => 'profile.showProfile',
	'uses' => 'ProfileController@showProfile'
));


Route::get('home', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
	));
Route::get('mypet', array(
	'as' => 'mypet',
	'uses' => 'HomeController@map'
	));
Route::get('pet_of_the_day', array(
	'as' => 'pet_of_the_day',
	'uses' => 'HomeController@pet_of_the_day'
	));
Route::get('trending', array(
	'as' => 'trending',
	'uses' => 'HomeController@trending'
	));
Route::get('advertised', array(
	'as' => 'advertised',
	'uses' => 'HomeController@advertised'
	));
Route::get('shop', array(
	'as' => 'shop',
	'uses' => 'HomeController@shop'
	));
Route::get('trackers', array(
	'as' => 'trackers',
	'uses' => 'HomeController@trackers'
	));

// Route::any('test', array(
// 	'as' => 'test',
// 	'uses' => 'HomeController@test'
// 	));
Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
]);

