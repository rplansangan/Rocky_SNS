<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;

class PostsController extends Controller {
	
	public function setLike(Request $request) {	
		return PostService::like($request->get('id'));
	}
	
	public function createComment(Request $request) {
		return view('ajax.comments')->with('comment', PostService::createComment($request));
	}
}
