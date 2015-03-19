<?php

use SNS\Models\Registration;
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
	
});

Route::get('/', array(
	'as' => 'index',
	'uses' => 'WelcomeController@index'
));
// Login
Route::any('login', array(
	'as' => 'login',
	'uses' => 'LoginController@signin'
));

// Registration & Validation
Route::any('register', array(
	'as' => 'register',
	'uses' => 'EmailValidationController@register'
));
Route::get('register/validate/{id}/{hash}', array(
	'as' => 'register.validateHash',
	'uses' => 'EmailValidationController@validateRegistration'
));
Route::get('register/validate/resend/{id}', array(
	'as' => 'register.validateRehash',
	'uses' => 'EmailValidationController@resend'
));

Route::get('home', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
	));
Route::get('mypet', array(
	'as' => 'mypet',
	'uses' => 'HomeController@map'
	));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

