<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;
use SNS\Libraries\Helpers\StorageHelper;
use Illuminate\Support\Facades\Auth;
use SNS\Models\Images;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class UploadsController extends Controller {
	
	public function upload(Request $request) {
		PostService::create($request->all());	
	}
	
	public function newsfeed(Request $request) {
		return view('ajax.post' , PostService::create($request->all()))->with('include_script' , true);
	}
	
	public function getImage($user_id, $file_id){
		ini_set('memory_limit','256M');
		$entry = Images::find($file_id);
		$file = Storage::get($entry->image_path . '/' . $entry->image_name . '.' . $entry->image_ext);

		return (new Response($file, 200))
		->header('Content-Type', $entry->image_mime);
	}

	public function testUpload(Request $request){
		return view('ajax.post' , PostService::create($request->all()))->with('include_script' , true);
	}
}
