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


Route::get('/', array(
	'as' => 'index',
	'uses' => 'WelcomeController@index'
));
// Login
Route::any('login', array(
	'as' => 'login',
	'uses' => 'LoginController@signin'
));
Route::any('do_login', array(
	'as' => 'login',
	'uses' => 'LoginController@login'
));
// Registration & Validation
Route::any('register', array(
	'as' => 'register',
	'uses' => 'EmailValidationController@register'
));
Route::post('register/validate', array(
	'as' => 'register.sendValidation',
	'uses' => 'EmailValidationController@sendValidation'
));
Route::get('register/validate/{id}/{hash}', array(
	'as' => 'register.validateHash',
	'uses' => 'EmailValidationController@validateRegistration'
));
Route::get('register/resend/{id}', array(
	'as' => 'register.validateRehash',
	'uses' => 'EmailValidationController@resend'
));
Route::get('message', array(
	'as' => 'validate',
	'uses' => 'EmailValidationController@validateMessage'
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
	'as' => 'mypet',
	'uses' => 'HomeController@pet_of_the_day'
	));
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

