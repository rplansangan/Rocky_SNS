<?php namespace SNS\Providers;

use Illuminate\Auth\Guard;
use Illuminate\Support\ServiceProvider;
use SNS\Libraries\Cache\Initialize;
use Illuminate\Redis\Database;
use Predis\Client;

class CacheInitProvider extends ServiceProvider {
    
    /**
     * Indicates if loading of the provider is deferred.
     * @var boolean
     */
    protected $defer = true;
    
    /**
     * 
     * @var array
     */
    private $redisParams;
    
    public function register(Guard $auth) {
        $this->redisParams = config('database.redis.default');
        
        $cache = new Client($this->redisParams);
        $this->app->bind(new Initialize($auth, $cache));
    }
}
