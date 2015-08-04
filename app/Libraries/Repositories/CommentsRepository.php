<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Comments;
use Illuminate\Support\Facades\Auth;
use SNS\Libraries\Facades\Notification;

class CommentsRepository {
	
	public function set($postId, $postUId, $message) {
		$comment = Comments::create([
				'post_id' => $postId, 
				'comment_message' => $message, 
				'comment_user_id' => Auth::id()
		]);
		
		$temp = Comments::select(['comment_message', 'comment_user_id', 'created_at'])
					->where('post_id', $postId)
					->with(['user', 'user.prof_pic'])
					->get();
		
		if(Auth::id() != $postUId) {		
			Notification::origin('Comments', Auth::id())
				->destinationId($postUId)
				->notifType('post_comment')
				->params(['post_id' => $postId])
				->send();
		}
		
		return $temp->last();
	}
	
	public function delete($postId, $postUId, $commentId) {
		Comments::find($commentId)->delete();
		
		Notification::origin('Comments', Auth::id())
			->destinationId($postUId)
			->notifType('post_comment')
			->params(['post_id' => $postId])
			->delete();
	}
	
	public function get($postId) {
		$comment = Comments::select(['comment_message', 'comment_user_id', 'created_at'])
					->with(['user.prof_pic'])
					->where('post_id', $postId)
					->get();
		
		if(is_null($comment)) {
			return null;
		}
			
		return $comment;
	}
	
	public function incremental($postId, $skip, $take) {
		return Comments::select(['comment_message', 'comment_user_id', 'created_at'])
						->with(['user.prof_pic'])
						->where('post_id', $postId)
						->skip($skip)
						->take($take)
						->latest()
						->get();
						
	}
}