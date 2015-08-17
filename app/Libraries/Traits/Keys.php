<?php namespace SNS\Libraries\Traits;

trait Keys {
	
	/**
	 * cache key used to tag profile data
	 * 
	 * @var string
	 */
	private $keysProfile = 'users:profile:';
	
	/**
	 * Cache key used for User data
	 * 
	 * @var string
	 */
	private $keysUser = 'users:$id:main';
	
	private $keysRegistration = 'users:$id:registration';
	
	private $keysPet = 'pets:$id:$user_id';
	
	private $keysMedia = 'media:$id:$user_id';
}
