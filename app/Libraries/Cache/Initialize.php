<?php namespace SNS\Libraries\Cache;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

class Initialize {
    
    /**
     * Redis connection to be used. (Redis connections defined in config/database.php)
     * @var string
     */
    private $redisConnection = 'default';
    
    /**
     * Auth instance
     * @var Illuminate\Support\Facades\Auth
     */
    protected $auth;
    /**
     * Redis instance
     * @var Illuminate\Support\Facades\Redis
     */
    protected $cache;
    
    public function __construct(Guard $auth, Client $cache) {
        $this->auth = $auth;
        $this->cache = $cache;
    }
    
    public function initAuth() {
        $this->auth->loginUsingId(1);
        return $params = $this->auth->user();
    }
    
}
