<?php namespace SNS\Libraries\Cache;

use Illuminate\Support\Facades\Redis;
use Predis\Client;

use SNS\Libraries\Cache\Traits\Keys;
use SNS\Libraries\Cache\Traits\Expirations;
use Illuminate\Support\Facades\Cache;

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
    
    private $redis = false;
    
    public function __construct(Client $cache) {
        $this->auth = auth();
   		 if($this->redis !== false) {
        	$this->cache = $cache;
        } else {
        	$this->cache = Cache::driver('file');
        }
    }
    
    public function userData($id = null) {
    	if($this->redis !== false) {
	    	if(is_null($id)) {
	    		$id = $this->auth->id();
	    	}
	    	
	    	if($this->cache->exists($this->keysProfile . $id)) {
	    		return json_decode($this->cache->get($this->keysProfile . $id), true);
	    	}
    	} else {
    		if(is_null($id)) {
    			$id = $this->auth->id();
    		}
    		
    		if($this->cache->get($this->keysProfile . $id)) {
    			return json_decode($this->cache->get($this->keysProfile . $id), true);
    		}
    	}
    }

}