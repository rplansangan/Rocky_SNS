<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use SNS\Models\Images;
use SNS\Libraries\Facades\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Cache\Initialize;
use SNS\Libraries\Cache\Get;

class UploadsController extends Controller {
	
	public function __construct(Initialize $init, Get $cacheGet) {
		parent::__construct($init, $cacheGet);
	}
	
	public function upload(Request $request) {
		PostService::create($request->all());	
	}
	
	public function newsfeed(Request $request) {
		$post = PostService::create($request->except(['file']), $request->file('file'));		
		if($post instanceof \SNS\Models\Posts) {	
    		return view('ajax.test' , $post);
	   	}
	   return $post;
	}

	public function insertComment(Request $request){
		$input = array_except($request->all(), array('_token'));
		$data['comment'] = PostService::createComment($input['post_id'] , $input['post_user_id'] , $input['message']);
		return view('ajax.comment' , $data);
	}
	
}
