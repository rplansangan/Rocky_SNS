<?php namespace SNS\Libraries\Cache;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Redis;
use Predis\Client;

use SNS\Libraries\Cache\Traits\Keys;
use SNS\Libraries\Cache\Traits\Expirations;

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
    
    public function __construct(Guard $auth, Client $cache) {
        $this->auth = $auth;
        $this->cache = $cache;
    }
    
    /**
     * Loads user basic data to redis
     * return void
     */
    public function initAuth() {
    	if(!$this->cache->exists($this->keysProfile . $this->auth->id())) {
	        $params = $this->auth->user();
	        
			$params->load([
				'registration' => function($q) {
					$q->addSelect(['registration_id', 'user_id', 'first_name', 'last_name']);
				},
	            'prof_pic' => function($q) {
	                $q->where('pet_id', 0);
	                $q->addSelect(['image_id', 'user_id', 'image_path', 'image_name', 'image_ext']);
	            }
			]);
			
			$profile = json_encode([
							'user_id' => $params->user_id,
							'first_name' => $params->registration->first_name,
							'last_name' => $params->registration->last_name,
							'profile_picture_path' => $params->prof_pic->image_path . '/' . $params->prof_pic->image_name,
							'profile_picture_ext' => $params->prof_pic->image_ext
						]);

			$this->cache->set($this->keysProfile . $params->user_id, $profile);
			
			// set expiration
			$this->cache->expire($this->keysProfile . $params->user_id, $this->expSession);
    	}
    }
    
}
