<?php namespace SNS\Libraries\Providers;

use Illuminate\Support\ServiceProvider;
use Predis\Client;

/**
 * 
 * @author Rap
 *
 */
class CacheSetServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		
		$cache = new Client(config('database.redis.default'));
		
		$this->app->bind('Set', function() use($cache) {
			return new \SNS\Libraries\Cache\Set($cache);
		});
		
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return ['SNS\Libraries\Cache\Set'];
	}

}
