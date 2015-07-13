<?php namespace SNS\Providers;

use Illuminate\Auth\Guard;
use Illuminate\Support\ServiceProvider;
use SNS\Libraries\Cache\Initialize;
use Illuminate\Redis\Database;
use Predis\Client;
use SNS\Libraries\Cache\Get;

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
        $this->app->singleton(new Initialize($auth, $cache));
        
        $this->app->singleton(new Get($auth, $cache));
    }
}
