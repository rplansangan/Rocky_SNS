<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;

class PostsController extends Controller {
	
	public function setLike(Request $request) {	
		return json_encode(PostService::like($request->get('id')));
	}
	

	public function createComment(Request $request) {
		return view('ajax.comments')->with('comment', PostService::createComment($request));
	}
	
	public function getNextNewsFeed(Request $request) {
		$skip = $request->get('offset');
		$count = count(PostService::incrementalNewsFeed($skip));
		if($count){
			return view('ajax.loop_news_feed')->with('newsfeed', PostService::incrementalNewsFeed($skip));
		}
		return 0;
	}
}
