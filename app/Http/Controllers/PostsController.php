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
	
	public function getNextNewsFeed(Request $request) {
		$skip = $request->get('offset');
		if($request->get('cur_prof') != null) {
			$post_uid = $request->get('cur_prof');
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

	public function checknewpost(){
		return PostService::checkNewPost();
	}
	public function getnewfeeds(){
		return view('ajax.loop_news_feed')->with('newsfeed', PostService::get_newfeeds());
		PostService::lastpostupdate();
	}

	public function getVideo($id , $file_id){
		$data['image'] = Images::with(array('post'))->find($file_id); 
		$data['image']->load('register');
		$data['video'] = Images::with(array('post' , 'register'))
							->where('image_mime' , 'like' , '%video%')
							->where('user_id' , Auth::id())
							->where('image_id' , '!=' , $file_id)
							->latest()->get();
		$data['user'] = $data['image']->register;

		return view('pages.playvideo' , $data);
	}

	
}
