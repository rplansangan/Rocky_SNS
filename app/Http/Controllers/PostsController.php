<?php namespace SNS\Http\Controllers;

use SNS\Models\User;
use SNS\Models\Images;
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
	

	public function createComment(Request $request) {
		$post = PostService::createComment($request->get('id'), $request->get('puid'), $request->get('message'));
		return view('ajax.comments')
			->with('comment', $post)
			->with('pid', $post->post_id)
			->with('puid', $request->get('puid'));
	}
	
	public function deleteComment(Request $request) {
		PostService::deleteComment($request->get('pid'), $request->get('puid'), $request->get('cid'));
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
		$data['image'] = Images::find($file_id);
		$data['video'] = Images::with(array('post' , 'register'))
							->where('image_mime' , 'like' , '%video%')
							->where('user_id' , Auth::id())
							->where('image_id' , '!=' , $file_id)
							->latest()->get();
		$data['user'] = $data['video'][0]->register;

		return view('pages.playvideo' , $data);
	}

	
}
