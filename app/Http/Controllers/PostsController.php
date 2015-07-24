<?php namespace SNS\Http\Controllers;

use SNS\Models\User;
use SNS\Models\Images;
use SNS\Models\Posts;
use SNS\Models\Comments;
use SNS\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Libraries\Facades\PostService;

class PostsController extends Controller {
		
	public function setLike(Request $request) {	
		return json_encode(PostService::like($request->get('id'), $request->get('uid')));
	}
	
	public function isLike(Request $request){
		$input = array_except($request->all(), array('_token'));
		$like = PostService::like($input['postid'] , $input['destination']);

		return json_encode($like);
	}
	public function getComment(Request $request){
		$data['comment'] = PostService::getComment($request->get('post_id'), $request->get('post_uid'));
		return view('include.comment' , $data);
	}

	public function createComment(Request $request) {
		$post = PostService::createComment($request->get('id'), $request->get('puid'), $request->get('message'));
		return view('ajax.comments')
			->with('comment', $post)
			->with('pid', $post->post_id)
			->with('puid', $request->get('puid'));
	}
	
	public function deleteDispatch(Request $r) {
		switch($r->get('action')) {
			case 'post':
				PostService::deletePost($r->get('pid'));
				break;
	
			case 'comment':
				PostService::deleteComment($r->get('pid'), $r->get('puid'), $r->get('cid'));
				break;
		}
	}
	
	public function getnewsfeed(Request $request) {
		$input = array_except($request->all(), array('_token'));
		if(Auth::check()){
			$data['newsfeed'] = PostService::incrementalNewsFeed(Auth::id() , $input['skip'] , null , 10);
		}else{
			$data['newsfeed'] = PostService::incrementalNewsFeed(1 , $input['skip'] , 1 , 10);
		}
		return view('include.newsfeed' , $data);
	}

	
}
