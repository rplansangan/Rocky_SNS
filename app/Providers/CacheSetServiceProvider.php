<?php namespace SNS\Providers;

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
	 *
	 * @var array
	 */
	private $redisParams;

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->redisParams = config('database.redis.default');
		
		$cache = new Client($this->redisParams);
		
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
