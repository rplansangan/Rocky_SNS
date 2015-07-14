<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Additional Compiled Classes
	|--------------------------------------------------------------------------
	|
	| Here you may specify additional classes to include in the compiled file
	| generated by the `artisan optimize` command. These should be classes
	| that are included on basically every request into the application.
	|
	*/

	'files' => [

		realpath(__DIR__.'/../app/Providers/AppServiceProvider.php'),
		//realpath(__DIR__.'/../app/Providers/BusServiceProvider.php'),
		realpath(__DIR__.'/../app/Providers/ConfigServiceProvider.php'),
		//realpath(__DIR__.'/../app/Providers/EventServiceProvider.php'),
		realpath(__DIR__.'/../app/Providers/RouteServiceProvider.php'),
		realpath(__DIR__.'/../app/Providers/CacheLayerProvider.php'),
		
		realpath(__DIR__.'/../app/Http/Kernel.php'),

		// Controllers
 		realpath(__DIR__.'/../app/Http/Controllers/Controller.php'),
 		realpath(__DIR__.'/../app/Http/Controllers/HomeController.php'),		
 		realpath(__DIR__.'/../app/Http/Controllers/LoginConttroller.php'),
 		realpath(__DIR__.'/../app/Http/Controllers/ProfileController.php'),
 		realpath(__DIR__.'/../app/Http/Controllers/RegistrationController.php'),
 		realpath(__DIR__.'/../app/Http/Controllers/UploadsController.php'),
 		realpath(__DIR__.'/../app/Http/Controllers/WelcomeController.php'),
		
		// Middlewares
		realpath(__DIR__.'/../app/Http/Middleware/Authenticate.php'),
		realpath(__DIR__.'/../app/Http/Middleware/RedirectIfAuthenticated.php'),
		
		// Libraries - Cache
		realpath(__DIR__.'/../app/Libraries/Cache/Initialize.php'),
		realpath(__DIR__.'/../app/Libraries/Cache/Get.php'),

		realpath(__DIR__.'/../app/Libraries/Traits/Expires.php'),
		realpath(__DIR__.'/../app/Libraries/Traits/Keys.php'),

		// Libraries - Repositories
		realpath(__DIR__.'/../app/Libraries/Repositories/CommentsRepository.php'),
		realpath(__DIR__.'/../app/Libraries/Repositories/ImageRepository.php'),
		realpath(__DIR__.'/../app/Libraries/Repositories/LikeRepository.php'),
		realpath(__DIR__.'/../app/Libraries/Repositories/NewsfeedRepository.php'),
		realpath(__DIR__.'/../app/Libraries/Repositories/PostRepository.php'),
		
		// Libraries - Services
		realpath(__DIR__.'/../app/Libraries/Services/FriendService.php'),
		realpath(__DIR__.'/../app/Libraries/Services/PasswordService.php'),
		realpath(__DIR__.'/../app/Libraries/Services/PostService.php'),
		realpath(__DIR__.'/../app/Libraries/Services/ValidationService.php'),
		
		// Libraries - Traits
// 		realpath(__DIR__.'/../app/Libraries/Traits/LoginTrait.php'),
// 		realpath(__DIR__.'/../app/Libraries/Traits/ProfPicTrait.php'),
		
		// Models - Admin
		realpath(__DIR__.'/../app/Models/Admin/ErrorLogs.php'),
		
		// Models
<<<<<<< HEAD
// 		realpath(__DIR__.'/../app/Models/Comments.php'),
// 		realpath(__DIR__.'/../app/Models/EmailValidation.php'),
// 		realpath(__DIR__.'/../app/Models/FriendRequest.php'),
 		realpath(__DIR__.'/../app/Models/Images.php'),
 		realpath(__DIR__.'/../app/Models/Likes.php'),
// 		realpath(__DIR__.'/../app/Models/MissingPets.php'),
 		realpath(__DIR__.'/../app/Models/Newsfeed_view.php'),
// 		realpath(__DIR__.'/../app/Models/PetFoundation.php'),
// 		realpath(__DIR__.'/../app/Models/PetFoundationImages.php'),
=======
 		realpath(__DIR__.'/../app/Models/Comments.php'),
 		realpath(__DIR__.'/../app/Models/EmailValidation.php'),
 		realpath(__DIR__.'/../app/Models/FriendRequest.php'),
 		realpath(__DIR__.'/../app/Models/Images.php'),
 		realpath(__DIR__.'/../app/Models/Likes.php'),
 		realpath(__DIR__.'/../app/Models/MissingPets.php'),
 		realpath(__DIR__.'/../app/Models/Newsfeed_view.php'),
 		realpath(__DIR__.'/../app/Models/PetFoundation.php'),
 		realpath(__DIR__.'/../app/Models/PetFoundationImages.php'),
>>>>>>> origin/master
 		realpath(__DIR__.'/../app/Models/Pets.php'),
 		realpath(__DIR__.'/../app/Models/Posts.php'),
 		realpath(__DIR__.'/../app/Models/Registration.php'),
 		realpath(__DIR__.'/../app/Models/User.php'),
 		realpath(__DIR__.'/../app/Models/UserFriends.php'),

	],

	/*
	|--------------------------------------------------------------------------
	| Compiled File Providers
	|--------------------------------------------------------------------------
	|
	| Here you may list service providers which define a "compiles" function
	| that returns additional files that should be compiled, providing an
	| easy way to get common files from any packages you are utilizing.
	|
	*/

	'providers' => [
		//
	],

];
