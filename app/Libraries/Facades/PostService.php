<?php namespace SNS\Libraries\Facades;

use Illuminate\Support\Facades\Facade;

class PostService extends Facade {
	
	protected static function getFacadeAccessor() {
		return 'postservice';
	}
	
}
