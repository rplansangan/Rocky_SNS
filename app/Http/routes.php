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

Route::get('/', 'WelcomeController@index');
Route::get('register', array(
	'as' => 'register',
	'uses' => 'WelcomeController@register'
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

