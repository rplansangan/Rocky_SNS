<?php namespace SNS\Providers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Redis\Database;
use Illuminate\Support\ServiceProvider;
use Predis\Client;

/**
 * 
 * @author Rap
 *
 */
class CacheLayerProvider extends ServiceProvider {
    
    /**
     * 
     * @var array
     */
    private $redisParams;
    
    public function register() {
        $this->redisParams = config('database.redis.default');
        
        $cache = new Client($this->redisParams);
        
        $this->app->bind('Initialize', function($app) use ($cache) { 
        	return new \SNS\Libraries\Cache\Initialize($cache);
        });
        
        $this->app->bind('Get', function() use ($cache) {
			return new \SNS\Libraries\Cache\Get($cache);
        });
    }
}
