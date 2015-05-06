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
		$post = PostService::create($request->all());
		$params['user'] = $post->user;
		$params['message'] = $post;
		$params['image'] = $post->image;
		$params['like'] = $post->like;
		$params['comments'] = $post->comment;
		return view('ajax.post' , $params)->with('include_script' , true);
	}
	
	public function video(Request $request){
		$data['video'] = PostService::create($request->all());
		return view('ajax.video' , $data);
	}
	public function getImage($user_id, $file_id){
		ini_set('memory_limit','1G');
		$entry = Images::find($file_id);
		$file = Storage::get($entry->image_path . '/' . $entry->image_name . '.' . $entry->image_ext);

		return (new Response($file, 200))
		->header('Content-Type', $entry->image_mime);
	}

	public function getThumb($user_id, $file_id){
		ini_set('memory_limit','1G');
		$entry = Images::find($file_id);
		$file = Storage::get($entry->image_path . '/' . $entry->image_name . '_thumb.jpg');

		return (new Response($file, 200))
		->header('Content-Type', $entry->image_mime);
	}
	public function uploadView(){
		$data['video'] = Images::with(array('post' , 'register'))->where('image_mime' , 'like' , '%video%')->where('user_id' , Auth::id())->latest()->get();
		return view('pages.viewupload' , $data);
	}
	public function testUpload(Request $request){
		custom_print_r($request->all());
		#return view('ajax.post' , PostService::create($request->all()))->with('include_script' , true);
	}
}
