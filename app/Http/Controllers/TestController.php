<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;
use SNS\Models\User;
use SNS\Libraries\Cache\Set;
use SNS\Models\Registration;

class TestController extends Controller {
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
	}
	
	public function cache(Set $set) {
		$users = User::all();
		
		foreach($users as $user) {
			$set->setUser($user);
			
			$reg = Registration::where('user_id', $user->user_id)->get();
			
			$set->setReg($reg[0]);
		}
	}
}
