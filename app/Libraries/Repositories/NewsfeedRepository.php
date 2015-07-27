<?php namespace SNS\Libraries\Repositories;

use SNS\Models\Newsfeed_view;

/**
 * TODO:
 * -move query for comments to CommentsRepository
 * -move query for likes to LikesRepository
 * -add end-point to PostService for moved queries
 * @author Rap
 *
 */
class NewsfeedRepository {
	
	protected $nf;
	
	public function __construct() {
		$this->nf = new Newsfeed_view();
	}
	public function getnewfeeds($id , $date){	    
		return $this->nf->ofUser($id)->with(['post', 'user', 'image'])
				->where('created_at' , '>' , $date)
				->where('post_user_id' , '!=' , $id)
				->latest()->get();
	}
	public function checkNewPost($id , $date){
		$q = $this->nf->ofUser($id)
				->where('created_at' , '>' , $date)
				->where('post_user_id' , '!=' , $id)
				->get();

		return ($q->isEmpty()) ? 0 : $q->count(); 
	}
	public function initial($id, $post_uid, $take = null) {	    
		if(!is_null($post_uid)) {	
			// used for user profiles
			return $this->nf->where('friend_user_id', 0)
						->ofPostUID($post_uid)
						->with(['post',	'image', 'user', 'user.prof_pic', 'like', 'comment'])
						->latest()
						->take($take)
						->get();
		} else if(is_null($id)) {
			// used for authenticated user newsfeed access
			return $this->nf->ofUser($id)
					->where('friend_user_id', 0)
					->with(['post', 'image', 'user', 'user.prof_pic', 'like', 'comment'])
					->latest()
					->take($take)
					->get();
		} else if(is_null($id) or $id === 0) {
			// used for public newsfeed access
			return $this->nf->where('friend_user_id', 0)
					->with(['post',	'image', 'user', 'user.prof_pic', 'like', 'comment'])
					->latest()
					->take($take)
					->get();
		}
		
		// for authenticated users. used to display user's newsfeed
		return $this->nf->ofUser($id)
				->with(['post',	'image', 'user', 'user.prof_pic', 'like'])
				->latest()
				->take($take)
				->get();
	}
	
	public function incremental($id, $skip, $post_uid = null, $take = null) {	    
		if($post_uid != null) {
			return $this->nf->ofUser($id)
					->ofPostUID($post_uid)
					->with(['post',	'image', 'user', 'user.prof_pic', 'like', 'comment'])
					->latest()
					->skip($skip)
					->take($take)
					->get();
		}		
		
		return $this->nf->ofUser($id)
				->with(['post',	'image', 'user', 'user.prof_pic', 'like', 'comment'])
				->latest()
				->skip($skip)
				->take($take)
				->get();
	}
}