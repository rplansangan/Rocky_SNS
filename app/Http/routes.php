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
Route::get('test', function() {
	
});
Route::get('update_notif', function() {
	$notif = Notification::withTrashed()->get();
	
	foreach($notif as $n) {
		$params = json_decode($n->params, true);
		$n->notif_type = $params['notif_type'];
		$n->save();
	}
	
	echo true;
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
Route::get('files/get/thumb/{user_id}/{file_id}', array(
	'as' => 'files.get.thumb',
	'uses' => 'UploadsController@getThumb'
));

Route::get('video', array(
	'as' => 'video.search',
	'uses' => 'HomeController@videos'
));
Route::get('video/{user_id}/{file_id}', array(
	'as' => 'video.get',
	'uses' => 'PostsController@getVideo'
));
Route::get('video/upload', array(
	'as' => 'video.uploadView',
	'uses' => 'UploadsController@uploadView'
));
Route::post('video/upload', array(
	'as' => 'video.upload',
	'uses' => 'UploadsController@video'
));
Route::get('video/myvideo', array(
	'as' => 'video.myvideo',
	'uses' => 'HomeController@myvideo'
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
Route::post('register', array(
	'as' => 'register',
	'uses' => 'RegistrationController@register'
));
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
Route::get('merchant/{id}/{advertise_id}', array(
	'as' => 'merch_adview',
	'uses' => 'MerchantController@merchadview'
	));
Route::get('checknewpost', array(
	'as' => 'post.check',
	'uses' => 'PostsController@checknewpost'
	));
Route::get('getnewfeeds', array(
	'as' => 'get.newfeeds',
	'uses' => 'PostsController@getnewfeeds'
	));

//Pet Foundation
Route::post('register_petfoundation', array(
	'as' => 'register_petfoundation',
	'uses' => 'PetfoundationController@activate_petfoundation'
));
Route::get('found_pets', array(
	'as' => 'found_pets',
	'uses' => 'HomeController@foundPets'
));
Route::get('mising_pets', array(
	'as' => 'missing_pets',
	'uses' => 'HomeController@missingPets'
));
Route::get('pfoundationtemp', array(
	'as' => 'pfoundationtemp',
	'uses' => 'PetfoundationController@pfoundationTemp'
));



Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
]);

