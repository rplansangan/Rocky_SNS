<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Cache\Initialize;

use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class TestController extends Controller {
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
	}
	
	public function index() {
		// 	    $init->initAuth();
		echo true;
	}
	
	public function profile() {
		return view('dummy');

	}
