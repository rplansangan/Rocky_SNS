<?php namespace SNS\Libraries\Facades;

use Illuminate\Support\Facades\Facade;

class Likes extends Facade{
	
	protected static function getFacadeAccessor() {
		return 'likerepository';
	}
	
}
