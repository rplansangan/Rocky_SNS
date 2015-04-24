<?php
use SNS\Libraries\Facades\Notification;
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
	custom_print_r(Registration::find(1)->with(array('prof_pic'))->get());
	echo '1';
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
	'uses' => 'UploadsController@getImage'
));

Route::get('/', array(
	'as' => 'index',
	'uses' => 'WelcomeController@index'
));
Route::get('signup', array(
	'as' => 'signup',
	'uses' => 'WelcomeController@signup'
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
Route::get('register/{id}/pet', array(
	'as' => 'register.petdetails',
	'uses' => 'RegistrationController@registerpet',
));
Route::post('register/{id}/register_pet', array(
	'as' => 'register.petRegister',
	'uses' => 'RegistrationController@petRegister'
));

/*Profile route*/
Route::get('profile/{id}', array(
	'as' => 'profile.showProfile',
	'uses' => 'ProfileController@showProfile'
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
Route::post('comments/del', array(
	'as' => 'comments.del',
	'uses' => 'PostsController@deleteComment'
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
Route::get('profile_settings', array(
	'as' => 'profile.settings',
	'uses' => 'ProfileController@settings'
));
Route::post('profile/edit', array(
	'as' => 'profile.setings.patch',
	'uses' => 'ProfileController@editProfile'
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
Route::get('shop', array(
	'as' => 'shop',
	'uses' => 'HomeController@shop'
	));
Route::get('trackers', array(
	'as' => 'trackers',
	'uses' => 'HomeController@trackers'
	));
Route::get('search', array(
	'as' => 'search',
	'uses' => 'HomeController@search'
	));
Route::get('compete', array(
	'as' => 'compete',
	'uses' => 'HomeController@compete'
));
Route::get('videos', array(
	'as' => 'videos',
	'uses' => 'HomeController@videos'
));
Route::get('rockyranger', array(
	'as' => 'rockyranger',
	'uses' => 'HomeController@rockyranger'
));
Route::get('petfoundation', array(
	'as' => 'petfoundation',
	'uses' => 'HomeController@petfoundation'
));

/* ADVERTISE */
Route::get('merchant/{id}', array(
	'as' => 'merchant.profile',
	'uses' => 'MerchantController@merchantProf'
));
Route::get('merchant_activation', array(
	'as' => 'advertised',
	'uses' => 'MerchantController@show_advertise_view'
));
Route::get('add_advertise', array(
	'as' => 'addadvertise',
	'uses' => 'HomeController@addadvertise'
	));
Route::get('activate_merchant', array(
	'as' => 'activate_merchant',
	'uses' => 'MerchantController@merchant_activation'
	));
Route::post('add_advertisement', array(
	'as' => 'ads.add_advertisement',
	'uses' => 'MerchantController@add_advertisement'
));
Route::post('register_activate_merchant', array(
	'as' => 'register_activate_merchant',
	'uses' => 'MerchantController@activate_merchant'
	));
Route::post('merchant/post', array(
	'as' => 'merchant.post',
	'uses' => 'MerchantController@add_advertisement'
	));
Route::get('profile/{id}/{advertised_id}', array(
	'as' => 'profile.advertised',
	'uses' => 'MerchantController@showAdvertised'
));
Route::get('add_advertisment', array(
	'as' => 'add_advertisement',
	'uses' => 'MerchantController@viewAdform'
));
Route::post('merchant/inquire', array(
	'as' => 'merchant.inquire',
	'uses' => 'MerchantController@addOrderInquire'
	));
Route::get('checknewpost', array(
	'as' => 'post.check',
	'uses' => 'PostsController@checknewpost'
	));
Route::get('getnewfeeds', array(
	'as' => 'get.newfeeds',
	'uses' => 'PostsController@getnewfeeds'
	));

Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
]);

