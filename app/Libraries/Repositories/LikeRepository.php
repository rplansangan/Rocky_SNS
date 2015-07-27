<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Likes;
use Illuminate\Support\Facades\Auth;
use SNS\Events\FriendRequest as FriendRequestEvent;
use SNS\Libraries\Facades\Notification;

class LikeRepository {
	
	public function set($post_id, $destination) { 
		$q = Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->get();

		if($q->isEmpty()) {
			$like = Likes::create(['post_id' => $post_id, 'like_user_id' => Auth::id()]);
			$response['liked'] = true;
			
			if(Auth::id() != $destination) {
				Notification::origin('Like', Auth::id())
					->destinationId($destination)
					->notifType('post_like')
					->params(['post_id' => $like->post_id])
					->send();
			}
						
		} else {
			$like = Likes::where('post_id', $post_id)->where('like_user_id', Auth::id())->get();
			Notification::origin('Like', Auth::id())
				->destinationId($destination)
				->notifType('post_like')
				->params(['post_id' => (string)$like[0]->post_id])
				->delete();
				
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
