<?php namespace SNS\Libraries\Facades;

use Illuminate\Support\Facades\Facade;

class Comments extends Facade{
	
	protected static function getFacadeAccessor() {
		return 'commentsrepository';
	}
	
}
