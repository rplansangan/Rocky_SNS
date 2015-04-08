<?php namespace SNS\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'SNS\Services\Registrar'
		);
		
		$this->app->bind('postservice', function() {
			return new \SNS\Libraries\Services\PostService;
		});
		
		$this->app->bind('storagehelper', function() {
			return new \SNS\Libraries\Helpers\StorageHelper;
		});
		
		$this->app->bind('likerepository', function() {
			return new \SNS\Libraries\Repositories\LikeRepository;
		});
		
		$this->app->bind('commentsrepository', function() {
			return new \SNS\Libraries\Repositories\CommentsRepository;
		});
		
		$this->app->bind('friendservice', function() {
			return new \SNS\Libraries\Services\FriendService;
		});
		
		$this->app->bind('notifservice', function() {
			return new \SNS\Libraries\Services\NotificationService;
		});
	}

}
