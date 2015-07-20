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
		$this->shared = [
		                'selects' => [
                            'post' => ['post_id', 'user_id', 'post_message', 'created_at'],
                            'user' => ['registration_id', 'user_id', 'first_name', 'last_name'],
                            'image' => ['image_id', 'post_id' , 'image_mime' , 'category', 'image_path', 'image_name', 'image_ext'],
                            'profilePic' => ['image_id', 'user_id', 'image_path', 'image_name', 'image_ext'],
                            'like' => ['like_id', 'post_id', 'like_user_id'],
		                  ],
                        'wheres' => [
                            'profilePic' => ['is_profile_picture', 1]
	                   	]
        ];
	}
	public function getnewfeeds($id , $date){
	    $imageSelect = $this->shared['selects']['image'];
	    $userSelect = $this->shared['selects']['user'];
	    $postSelect = $this->shared['selects']['post'];    
	    
		return $this->nf->ofUser($id)->with([
				'post' => function ($q) use ($postSelect){
					$q->addSelect($postSelect);
				},
				'user' => function ($q) use ($userSelect) {
					$q->addSelect($userSelect);
				},
				'image' => function ($q) use ($imageSelect) {
					$q->addSelect($imageSelect);
				},
// 				'like' => function ($q) {
// 					$q->count();
// 				},
		])->where('created_at' , '>' , $date)->where('post_user_id' , '!=' , $id)->latest()->get();
	}
	public function checkNewPost($id , $date){
		$q = $this->nf->ofUser($id)->where('created_at' , '>' , $date)->where('post_user_id' , '!=' , $id)->get();

		return ($q->isEmpty()) ? 0 : $q->count(); 
	}
	public function initial($id, $post_uid, $take = null) {
	    $imageSelect = $this->shared['selects']['image'];
	    $likeSelect = $this->shared['selects']['like'];	 
	    $userSelect = $this->shared['selects']['user'];
	    $postSelect = $this->shared['selects']['post'];	  	    
	    $profPicSelect = $this->shared['selects']['profilePic'];
	    
		if(!is_null($post_uid)) {	
			// used for user profiles
			return $this->nf->where('friend_user_id', 0)->ofPostUID($post_uid)->with([
					'post' => function ($q) use ($postSelect) {
						$q->addSelect($postSelect);
					},
					'image' => function ($q) use ($imageSelect) {
						$q->addSelect($imageSelect);
					},
					'user' => function ($q) use ($userSelect) {
						$q->addSelect($userSelect);
					},
					'user.prof_pic' => function ($q) use ($profPicSelect) {
						$q->addSelect($profPicSelect);
						$q->where('is_profile_picture', 1);
						$q->where('pet_id', 0);
					},
					'like' => function ($q) use ($likeSelect) {
					   $q->addSelect($likeSelect);
				    },
					'comment' => function ($q) {
					    $q->count();
					}
			])->latest()->take($take)->get();
		} else if(is_null($id)) {
			// used for authenticated user newsfeed access
			return $this->nf->ofUser($id)->where('friend_user_id', 0)->with([
					'post' => function ($q) use ($postSelect) {
						$q->addSelect($postSelect);
					},
					'image' => function ($q) use ($imageSelect) {
						$q->addSelect($imageSelect);
					},
					'user' => function ($q) use ($userSelect) {
						$q->addSelect($userSelect);
					},
					'user.prof_pic' => function ($q) use ($profPicSelect) {
						$q->addSelect($profPicSelect);
						$q->where('is_profile_picture', 1);
						$q->where('pet_id', 0);
					},
					'like' => function ($q) use ($likeSelect) {
						$q->addSelect($likeSelect);
					},
					'comment' => function ($q) {
					    $q->count();
					}
			])->latest()->take($take)->get();
		} else if(is_null($id) or $id === 0) {
			// used for public newsfeed access
			return $this->nf->where('friend_user_id', 0)->with([
					'post' => function ($q) use ($postSelect) {
						$q->addSelect($postSelect);
					},
					'image' => function ($q) use ($imageSelect) {
						$q->addSelect($imageSelect);
					},
					'user' => function ($q) use ($userSelect) {
						$q->addSelect($userSelect);
					},
					'user.prof_pic' => function ($q) use ($profPicSelect) {
						$q->addSelect($profPicSelect);
						$q->where('is_profile_picture', 1);
						$q->where('pet_id', 0);
					},
					'like' => function ($q) use ($likeSelect) {
						$q->addSelect($likeSelect);
					},
					'comment' => function ($q) {
						$q->count();
					}
			])->latest()->take($take)->get();
		}
		
		// for authenticated users. used to display user's newsfeed
		return $this->nf->ofUser($id)->with([
				'post' => function ($q) use ($postSelect) {
					$q->addSelect($postSelect);
				},
				'image' => function ($q) use ($imageSelect) {
					$q->addSelect($imageSelect);
				},
				'user' => function ($q) use ($userSelect) {
					$q->addSelect($userSelect);
				},
				'user.prof_pic' => function ($q) use ($profPicSelect) {
					$q->addSelect($profPicSelect);
					$q->where('is_profile_picture', 1);
					$q->where('pet_id', 0);
				},
				'like' => function ($q) use ($likeSelect) {
					$q->addSelect($likeSelect);
				},
		])->latest()->take($take)->get();
	}
	
	public function incremental($id, $skip, $post_uid = null, $take = null) {
	    $imageSelect = $this->shared['selects']['image'];
	    $likeSelect = $this->shared['selects']['like'];
	    $postSelect = $this->shared['selects']['post'];
	    $profPicSelect = $this->shared['selects']['profilePic'];
	    $userSelect = $this->shared['selects']['user'];	    
	    
		if($post_uid != null) {
			return $this->nf->ofUser($id)->ofPostUID($post_uid)->with([
					'post' => function ($q) use ($postSelect) {
						$q->addSelect($postSelect);
					},
					'image' => function ($q) use ($imageSelect) {
						$q->addSelect($imageSelect);
					},
					'user' => function ($q) use ($userSelect) {
						$q->addSelect($userSelect);
					},
					'user.prof_pic' => function ($q) use($profPicSelect) {
						$q->addSelect($profPicSelect);
						$q->where('is_profile_picture', 1);
						$q->where('pet_id', 0);
					},
					'like' => function ($q) use ($likeSelect) {
						$q->addSelect($likeSelect);
					},
					'comment' => function ($q) {
					    $q->count();
					}
			])->latest()->skip($skip)->take($take)->get();
		}		
		return $this->nf->ofUser($id)->with([
				'post' => function ($q) use ($postSelect) {
					$q->addSelect($postSelect);
				},
				'image' => function ($q) use ($imageSelect) {
					$q->addSelect($imageSelect);
				},
				'user' => function ($q) use ($userSelect) {
					$q->addSelect($userSelect);
				},
				'user.prof_pic' => function ($q) use ($profPicSelect) {
					$q->addSelect($profPicSelect);
					$q->where('is_profile_picture', 1);
					$q->where('pet_id', 0);
				},
				'like' => function ($q) use ($likeSelect) {
					$q->addSelect($likeSelect);
				},
				'comment' => function ($q) {
				    $q->count();
				}
		])->latest()->skip($skip)->take($take)->get();
	}
}