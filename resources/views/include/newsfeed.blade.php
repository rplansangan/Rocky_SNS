@if(!$newsfeed->isEmpty())
	@foreach($newsfeed as $row)
	<!-- NEWSFEED AREA-->
	<div class="newsfeed">
		<!-- NEWSFEED TOP -->
		<div class="row newsfeed-top">
			<div class="col-lg-12">
				<h5> 
					@if($row->user->isNotNull('prof_pic'))
						<a href="{{ route('profile.view' , ['id' => $row->user->user_id]) }}">
							<img src="{{ mediaSrc($row->user->prof_pic->image_path, $row->user->prof_pic->image_name , $row->user->prof_pic->image_ext) }}" class="profile-pic">
						</a>
					@else
						<a href="{{ route('profile.view' , ['id' => $row->user->user_id]) }}">
							<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic">
						</a>
					@endif
					<a href="{{ route('profile.view' , ['id' => $row->user->user_id]) }}">
						<span>{{ $row->user->getFullName() }}</span>
					</a>
					
					@if($row->post->isNotNull('pet'))
							@if($row->post->pet->isNotNull('profile_pic'))
							<a href="{{ route('profile.showPetProfile', ['id' => $row->post->user_id, 'pet_id' => $row->post->pet->pet_id]) }}">
								<img src="{{ mediaSrc($row->post->pet->profile_pic->image_path, $row->post->pet->profile_pic->image_name, $row->post->pet->profile_pic->image_ext) }}" class="profile-pic">
							</a>							
							@endif
							<a href="{{ route('profile.showPetProfile', ['id' => $row->post->user_id, 'pet_id' => $row->post->pet->pet_id]) }}">
								<span>as {{ $row->post->pet->pet_name }}</span>
							</a>
					@endif
					
					@if(($row->isNotNull('image')))
						@if(stristr($row->image->image_mime, 'image/'))
							<label>Posted a photo</label>
						@else
							<label>Posted a video</label>
						@endif
					@endif
					<small>{{ _ago(strtotime($row->created_at)) }} ago</small>
				</h5>
			</div>
		</div>
		<!-- END NEWSFEED TOP -->

		<!-- NEWSFEED CONTENT -->
		<div class="row newsfeed-content">
			{!! $row->post->post_message !!}

			@if($row->isNotNull('image'))
				@if(stristr($row->image->image_mime, 'image/'))
				<div class="image-content">
					<a href="#"><img src="{{  mediaSrc($row->image->image_path, $row->image->image_name , $row->image->image_ext)  }}" class="img-responsive img-thumbnail"></a>
				</div>
				@else
				<div class="video-content">
					<div>
						<img src="{{ mediaSrc($row->image->image_path, $row->image->image_name.'_thumb' , 'jpg') }}" class="img-responsive img-thumbnail">
					</div>
					<a href="javascript:void(0);" route="{{ Route('get.video') }}" src="{{ mediaSrc($row->image->image_path, $row->image->image_name , $row->image->image_ext) }}" class="play"><img src="{{ URL::asset('assets/img/play.png') }}" class="img-responsive"></a>
				</div>
				@endif
			@endif
		</div>
		<!-- END NEWSFEED CONTENT -->
		<!-- COMMENT SECTION -->
		<div class="row newsfeed-bottom">
			<div>
				@if(isLike($row->like))
				<a href="javascript:void(0);" route="{{ Route('is.liked') }}" post-id="{{ $row->post_id}}" destination="{{ $row->user_id }}" class="clickLike text-center" like-image="{{ URL::asset('assets/img/like.png') }}" unlike-image="{{ URL::asset('assets/img/unlike.png') }}"><img src="{{ URL::asset('assets/img/like.png') }}"><span class="like">{{ $row->like->count() }}</span></a>
				@else
				<a href="javascript:void(0);" route="{{ Route('is.liked') }}" post-id="{{ $row->post_id}}" destination="{{ $row->user_id }}" class="clickLike text-center" like-image="{{ URL::asset('assets/img/like.png') }}" unlike-image="{{ URL::asset('assets/img/unlike.png') }}"><img src="{{ URL::asset('assets/img/unlike.png') }}"><span class="unlike">{{ $row->like->count() }}</span></a>
				@endif
			</div>
			<div>
				<a href="javascript:void(0);"  class="comment-down" post-id="{{ $row->post->post_id }}" route="{{ Route('get.comment') }}" ><img src="{{ URL::asset('assets/img/comment.png') }}"></a>
			</div>
		</div>
		<!-- END COMMENT SECTION -->
	</div>
	<div class="comment-area">
		<div class="text-left loading-dots hidden">
			<a href="#"><span>...</span></a>
		</div>
		<div class="comment_loading_area">
		</div>
		@if(Auth::check())
		<div class="reply-textarea">
			<div class="col-lg-12 nopad">
				@if(isset($user_data->prof_pic))
				<a href="#" class="arrow_right">
					<img src="<?php echo mediaSrc($user_data->prof_pic->image_path, $user_data->prof_pic->image_name, $user_data->prof_pic->image_ext); ?>" class="img-thumbnail profile-pic">
				</a>
				@else
				<a href="#" class="arrow_right">
					<img src="{{ URL::asset('assets/img/prof.png') }}" class="img-thumbnail profile-pic">
				</a>
				@endif
				<textarea class="form-control insertComment"  post-user-id="{{ $row->post_user_id }}" post-id="{{ $row->post->post_id }}" route="{{ Route('insert.comment') }}" placeholder="Write a comment"></textarea>
			</div>
			<br clear="all">
		</div>
		@endif
	</div>
	@endforeach
@else
<div class="text-center noPost"><p>No Post</p></div>
@endif
