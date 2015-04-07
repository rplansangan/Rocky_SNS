<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Likes;
use Illuminate\Support\Facades\Auth;

class LikeRepository {
	
	public function set($post_id) { 
		$q = Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->get();

		if($q->isEmpty()) {
			Likes::create(array('post_id' => $post_id, 'like_user_id' => Auth::id()));
			$response['liked'] = true;
		} else {
			Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->delete();
			$response['liked'] = false;
		}
	
		$response['count'] = $this->countLikes($post_id);

		return $response;
	}
	
	public function countLikes($post_id) {
		return Likes::where('post_id', $post_id)->count();
	
		
	}
}
