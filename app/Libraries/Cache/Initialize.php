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
class Initialize {

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

    /**
     * Returns true if user data is cached
     * @return boolean
     */
    private function checkAuth() {    
    	switch($this->driver) {
    		case 'redis':
    			if($this->cache->exists($this->keysProfile . $this->auth->id())) {
    				return true;
    			}
    			break;
    		case 'file':
    			if($this->cache->has($this->keysProfile . $this->auth->id())) {
    				return true;
    			}
    			break;
    		default:
    			return false;
    			break;
    	}
    }
    
    /**
     * Initializes user data if not cached
     * @param mixed $params
     * @param mixed $profile
     * @return boolean
     */
    private function initProfile($params, $profile) {
    	switch($this->driver) {
    		case 'redis':
    				$this->cache->set($this->keysProfile . $params->user_id, $profile);
    				// set expiration
    				$this->cache->expire($this->keysProfile . $params->user_id, $this->expSession);
    			break;    	
    		case 'file':
    				$this->cache->put($this->keysProfile . $params->user_id, $profile, $this->expSession);
    			break;
    	}
    }

    /**
     * Initializes global user data
     * @return NULL
     */
    public function initAuth() {    	
    	
    	if(!$this->checkAuth()) {
    		$params = $this->auth->user();
    		
    		$params->load([
    				'registration' => function($q) {
    					$q->addSelect(['registration_id', 'user_id', 'first_name', 'last_name']);
    				},
    				'prof_pic' => function($q) {
    					$q->addSelect(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext']);
    				}
    		]);
    		 
    		$user = [
	    		'user_id' => $params->user_id,
	    		'first_name' => $params->registration->first_name,
	    		'last_name' => $params->registration->last_name,
	    		'selected_pet' => $params->selected_pet
    		];
    		 
    		// checks if user has profile picture set
    		if(!is_null($params->prof_pic)) {
    			$profile_pic = [
    			'profile_picture_path' => $params->prof_pic->image_path . '/' . $params->prof_pic->image_name,
    			'profile_picture_ext' => $params->prof_pic->image_ext
    			];
    		} else {
    			$profile_pic = [
    			'profile_picture_path' => null,
    			'profile_picture_ext' => null
    			];
    		}
    		 
    		// merges all user data before encoding as json
    		$profile = json_encode(array_merge($user, $profile_pic));
    		
    		// passes queried user data to cache
    		$this->initProfile($params, $profile);
    	}
    }
}

