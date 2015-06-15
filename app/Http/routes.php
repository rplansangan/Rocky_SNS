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
	'uses' => 'PetfoundationController@petfoundation'
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
Route::get('foundation/register', [
	'as' => 'foundation.profile.register',
	'uses' => 'PetfoundationController@registerView'
]);
Route::post('foundation/register/process', array(
	'as' => 'foundation.profile.register_process',
	'uses' => 'PetfoundationController@activate_petfoundation'
));
Route::post('foundation/edit', [
	'as' => 'foundation.profile.edit',
	'uses' => 'PetfoundationController@editFoundation'
]);
Route::get('found_pets', array(
	'as' => 'found_pets',
	'uses' => 'HomeController@foundPets'
));
Route::get('missing_pets', array(
	'as' => 'missing_pets',
	'uses' => 'PetsController@missingPets'
));
Route::get('pfoundationtemp', array(
	'as' => 'pfoundationtemp',
	'uses' => 'PetfoundationController@pfoundationTemp'
));
Route::get('foundation/{id}/adoption', array(
	'as' => 'foundation.adoption',
	'uses' => 'PetfoundationController@adoptList'
));
Route::get('foundation/list', [
	'as' => 'foundation.list.all',
	'uses' => 'PetfoundationController@showAll'
]);
Route::get('foundation/projects', array(
	'as' => 'foundation.projects',
	'uses' => 'PetfoundationController@foundProjects'
));
Route::post('foundation/adopt', [
	'as' => 'foundation.adopt.add',
	'uses' => 'PetfoundationController@addAdoption'
]);
Route::get('foundation/images/{id}/{i_id}', [
	'as' => 'foundation.get.image',
	'uses' => 'PetfoundationController@getImage'
]);
Route::get('foundation/search', [
	'as' => 'foundation.search',
	'uses' => 'PetfoundationController@search'
]);

//Vet
Route::get('vettemp', array(
	'as' => 'vet_temp',
	'uses' => 'HomeController@vetTemp'
));

Route::get('vetprofile', array(
	'as' => 'vetprof',
	'uses' => 'HomeController@vetProfile'
));

//test
Route::get('layoutone', array(
	'as' => 'layoutone',
	'uses' => 'WelcomeController@layoutOne'
));

// Upgrades
Route::get('upgrade/{action}', [
	'as' => 'upgrade.main',
	'uses' => 'UpgradesController@main'
]);

//email

Route::post('checkemail', array(
	'as' => 'checkemail',
	'uses' => 'RegistrationController@checkemail'
));

// Lost and Found Pets routes
Route::get('get_missingpets', [
	'as' => 'get_missingpets',
	'uses' => 'PetsController@get_missingpets'
]);
Route::get('get_foundpets', [
	'as' => 'get_foundpets',
	'uses' => 'PetsController@get_foundpets'
]);
Route::get('pets/found/list', [
	'as' => 'pets.found.list',
	'uses' => 'PetsController@foundPets'
]);
Route::get('pets/image/get/{id}', [
	'as' => 'pets.image.get',
	'uses' => 'PetsController@getImage'
]);
Route::post('findpets', [
	'as' => 'findpets',
	'uses' => 'PetsController@findpets'
]);
Route::post('pets/getinfo', array(
	'as' => 'pets.get.info',
	'uses' => 'PetsController@getpetinfo'
));
Route::post('pets/found/add', array(
	'as' => 'pets.found.add',
	'uses' => 'PetsController@addmissingpet'
));
Route::post('pets/lost/add', array(
	'as' => 'pets.lost.add',
	'uses' => 'PetsController@addlostpet'
));
Route::post('foundpetinfo', array(
	'as' => 'foundpetinfo',
	'uses' => 'PetsController@getpetselectedinfo'
));

//front nav
Route::get('pet/lovers', [
	'as' => 'public.lovers',
	'uses' => 'WelcomeController@petlovers'
]);
Route::get('pet/shops', [
	'as' => 'public.shops',
	'uses' => 'WelcomeController@petshops'
]);
Route::get('pet/foundations', [
	'as' => 'public.foundations',
	'uses' => 'WelcomeController@petfoundation'
]);
Route::get('pet/videos', [
	'as' => 'public.videos',
	'uses' => 'WelcomeController@petvideos'
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
});
