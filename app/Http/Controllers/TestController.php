<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Cache\Initialize;

class TestController extends Controller {

	public function index(Initialize $init) {
	    dd($init->initAuth());
	}

}
