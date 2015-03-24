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

Route::post('test', function(){
	?>
	<li class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="{{ URL::asset('assets/images/browncat.png') }}" withd="64px" height="64px" alt="profile picture">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">Superdog</h4>
			<small class="media-heading">March 18 2015 12:00:00 am</small>
			<p>However, for most routes and controller actions, you will be returning a full Illuminate\Http\Response instance or a view. Returning a full Response instance allows you to customize the response's HTTP status code and headers. A Response instance inherits from the Symfony\Component\HttpFoundation\Response class, providing a variety of methods for building HTTP </p>
			<p><a href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a></p>
			<div class="col-lg-11">
				<form method="POST" action="{{ url('login') }}" class="form-horizontal " role="form">
					<div class="form-group">
						<textarea class="form-control" max="500" name="post_message" id="post_message" placeholder=" Say Something..."></textarea>
					</div>
					<div class="form-group text-right hide_submit">
						<div class="row">
							<div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
								<input type="file" name="userfile" id="fileuploader" class="form-control">
							</div>
							<div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
								<input type="submit" value="post" class="btn btn-color">
							</div>
						</div>
					</div>
				</form>			
			</div>
		</div>
	</li>
	<?php
});
Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
]);

