<?php namespace SNS\Libraries\Cache;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

use SNS\Libraries\Cache\Traits\Keys;
use SNS\Libraries\Cache\Traits\Expirations;

/**
 * 
 * @author Rap
 *
 */
class Get {
    
	use Keys, Expirations;
    
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
    
    public function __construct($auth, Client $cache) {
        $this->auth = $auth;
        $this->cache = $cache;
    }
    
    public function userData($id = null) {
    	if(is_null($id)) {
    		$id = $this->auth->id();
    	}
    	
    	if($this->cache->exists($this->keysProfile . $id)) {
    		return $this->cache->get($this->keysProfile . $id);
    	}
    }

}