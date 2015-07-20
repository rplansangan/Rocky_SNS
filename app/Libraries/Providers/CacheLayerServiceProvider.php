<?php namespace SNS\Libraries\Providers;

use Illuminate\Support\ServiceProvider;
use Predis\Client;

/**
 * 
 * @author Rap
 *
 */
class CacheLayerServiceProvider extends ServiceProvider {

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
    public function register() {        
        $cache = new Client(config('database.redis.default'));
        
        $this->app->bind('Initialize', function() use($cache) { 
        	return new \SNS\Libraries\Cache\Initialize($cache);
        });
        
        $this->app->bind('Get', function() use($cache) {
			return new \SNS\Libraries\Cache\Get($cache);
        });
    }
}
