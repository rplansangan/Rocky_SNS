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
        		$this->cache = $cache;
        		break;
        	case 'redis':
        		$this->cache = Cache::driver('file');
        		break;
        }
    }


    public function initAuth() {
    	$params = $this->auth->user();
    	$params->load([
    			'registration' => function($q) {
    				$q->addSelect(['registration_id', 'user_id', 'first_name', 'last_name']);
    			},
    			'prof_pic' => function($q) {
    				$q->where('pet_id', 0);
                    $q->where('is_profile_picture' , 1);
    				$q->addSelect(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext']);
    			}
    	]);
    	
    	$user = [
	    			'user_id' => $params->user_id,
	    			'first_name' => $params->registration->first_name,
	    			'last_name' => $params->registration->last_name
				];
    	
    	// checks if user has profile picture set
    	if(!is_null($params->prof_pic)) {
    		$profile_pic = [
	    		'profile_picture_path' => $params->prof_pic->image_path . '/' . $params->prof_pic->image_name,
	    		'profile_picture_ext' => $params->prof_pic->image_ext
    		];
    	} else {
    		$profile_pic = null;
    	}
    	
    	// merges all user data before encoding as json
    	$profile = json_encode(array_merge($user, $profile_pic));

    	switch($this->driver) {
        	case 'file':
		    	if(!$this->cache->exists($this->keysProfile . $this->auth->id())) {	
					$this->cache->set($this->keysProfile . $params->user_id, $profile);
					// set expiration
					$this->cache->expire($this->keysProfile . $params->user_id, $this->expSession);
		    	}
	    	break;
	    	
    		case 'redis':
	    		if(!$this->cache->has($this->keysProfile . $this->auth->id())) {	
					$this->cache->put($this->keysProfile . $params->user_id, $profile, $this->expSession);
		    	}
		    break;
    	}
    }
}

