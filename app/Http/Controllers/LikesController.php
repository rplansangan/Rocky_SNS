<?php namespace SNS\Http\Controllers;

use SNS\Http\Requests;
use SNS\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SNS\Models\Likes;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller {

	public function setLike(Request $request) {
		$q = Likes::where('post_id', $request->get('id'))->where('like_user_id', Auth::id())->get();
		if($q->isEmpty()) {
			Likes::create(array('post_id' => $request->get('id'), 'like_user_id' => Auth::id()));
		}		
		
		return $this->countLikes($request->get('id'));
	}
	
	protected function countLikes($post_id) {
		$count = Likes::where('post_id', $post_id)->count();
		
		if($count == 1) {
			return $count . ' Like';
		} else {
			return $count . ' Likes';
		}
	}
}
