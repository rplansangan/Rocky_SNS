<?php namespace SNS\Libraries\Cache;

use Illuminate\Support\Facades\Redis;
use Predis\Client;

use SNS\Libraries\Cache\Traits\Keys;
use SNS\Libraries\Cache\Traits\Expirations;
use Illuminate\Support\Facades\Cache;
use SNS\Models\User;

/**
 * 
 * @author Rap
 *
 */
class Set {
	
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
	
	public function updateUserData(User $user) {
		// retrieves cached user data
		$cached = json_decode($this->cache->get($this->keysProfile . $user->user_id), true);
		
		$cached['first_name'] = $user->registration->first_name;
		$cached['last_name'] = $user->registration->last_name;
		
		if(!is_null($user->prof_pic)) {
			$cached['profile_picture_path'] = $user->prof_pic->image_path . '/' . $user->prof_pic->image_name;
			$cached['profile_picture_ext'] = $user->prof_pic->image_ext;
		}
		
		$cache = json_encode($cached);
		
		switch($this->driver) {
        	case 'file':
				$this->cache->set($this->keysProfile . $cached['user_id'], $cache);
				$this->cache->expire($this->keysProfile . $cached['user_id'], $this->expSession);
			break;
			
			case 'redis':
				$this->cache->put($this->keysProfile . $cached['user_id'], $cache, $this->expSession);
			break;
		}
	}
	
}
