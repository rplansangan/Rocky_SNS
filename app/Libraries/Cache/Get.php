<?php namespace SNS\Libraries\Cache;

use Illuminate\Support\Facades\Redis;
use Predis\Client;

use SNS\Libraries\Traits\Keys;
use SNS\Libraries\Traits\Expirations;
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
    
    /**
     * CACHE_DRIVER as defined on .env
     * @var string
     */
    private $driver;
    
    public function __construct(Client $cache) {
        $this->auth = auth();
        
        $this->driver = config('cache.default');
        
    switch($this->driver) {
        	case 'file':
        		$this->cache = Cache::driver('file');
        		break;
        	case 'redis':        		
        		$this->cache = $cache;
        		break;
        }
    }
    
    public function userData($id = null) {
    	switch($this->driver) {
        	case 'redis':
		    	if(is_null($id)) {
		    		$id = $this->auth->id();
		    	}
		    	
		    	if($this->cache->exists($this->keysProfile . $id)) {
		    		return json_decode($this->cache->get($this->keysProfile . $id), true);
		    	}
		    break;
		    
    		case 'file':
	    		if(is_null($id)) {
	    			$id = $this->auth->id();
	    		}
	    		
	    		if($this->cache->get($this->keysProfile . $id)) {
	    			return json_decode($this->cache->get($this->keysProfile . $id), true);
	    		}
	    	break;
    	}
    }

}