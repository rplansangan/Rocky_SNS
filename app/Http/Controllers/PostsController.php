<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;

class PostsController extends Controller {
		
	public function setLike(Request $request) {	
		return json_encode(PostService::like($request->get('id'), $request->get('uid')));
	}
	

	public function createComment(Request $request) {
		return view('ajax.comments')->with('comment', PostService::createComment($request));
	}
	
	public function getNextNewsFeed(Request $request) {
		$skip = $request->get('offset');
		if($request->get('post_uid') != null) {
			$post_uid = $request->get('post_uid');
		} else {
			$post_uid = null;
		}
		
		$posts = PostService::incrementalNewsFeed(auth()->id(), $skip - 1, $post_uid);
		$count = count($posts);
		if($count){
			return view('ajax.loop_news_feed')->with('newsfeed', $posts);
		}
		return 0;
	}
}
