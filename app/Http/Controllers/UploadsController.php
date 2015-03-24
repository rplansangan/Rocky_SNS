<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Helpers\StorageHelper;
use Illuminate\Support\Facades\Auth;

class UploadsController extends Controller {

	public function testView() {
		return view('tests.upload_view');
	}
	
	public function testUpload(Request $request) {
		PostService::create($request->all());	
	}

}
