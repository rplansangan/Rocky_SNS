<!-- NEWSFEED AREA-->
	<div class="newsfeed">
		<!-- NEWSFEED TOP -->
		<div class="row newsfeed-top">
			<div class="col-lg-12">
				<h5>
					@if(isset($user['prof_pic']) AND !empty($user['prof_pic']))
					<a href="#"><img src="{{ mediaSrc($user['prof_pic']['image_path'], $user['prof_pic']['image_name'] , $user['prof_pic']['image_ext']) }}" class="profile-pic"></a>
					@else
					<a href="#"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"></a>
					@endif
					<a href="#"><span>{{ $user['first_name'].' '.$user['last_name'] }}</span></a>
					@if(isset($image))
					@if(stristr($image['image_mime'], 'image/'))
					<label>Posted a photo</label>
					@else
					<label>Posted a video</label>
					@endif
					@endif
					<small>{{ _ago(strtotime($created_at)) }} ago</small>
				</h5>
			</div>
		</div>
		<!-- END NEWSFEED TOP -->
		<!-- NEWSFEED CONTENT -->
		<div class="row newsfeed-content">
			{!! $post_message !!}

			@if(isset($image))
			@if(stristr($image['image_mime'], 'image/'))
			<div class="image-content">
				<img src="{{  mediaSrc($image['image_path'], $image['image_name'] , $image['image_ext'])  }}" class="img-responsive img-thumbnail">
			</div>
			@else
			<div class="video-content">
				<div>
					<img src="{{ mediaSrc($image->image_path, $image->image_name.'_thumb' , 'jpg') }}" class="img-responsive img-thumbnail">
				</div>
				<a href="#" class="play"><img src="{{ URL::asset('assets/img/play.png') }}" class="img-responsive"></a>
			</div>
			@endif
			@endif
		</div>
		<!-- END NEWSFEED CONTENT -->
		<!-- COMMENT SECTION -->
		<div class="row newsfeed-bottom">
			<div>
				<a href="#"><img src="{{ URL::asset('assets/img/like.png') }}"><span class="like">26</span></a>
			</div>
			<div>
				<a href="javascript:void(0);" id="comment-down"><img src="{{ URL::asset('assets/img/comment.png') }}"></a>
			</div>
		</div>
		<!-- END COMMENT SECTION -->
	</div>
	<div class="comment-area">
		<div class="text-left loading-dots">
			<a href="#"><span>...</span></a>
		</div>
		<div class="comment-container">
			<div class="col-lg-1">
				<a href="#"><img src="{{ URL::asset('assets/img/puggy.png') }}" class="profile-pic"></a>
			</div>
			<div class="col-lg-11">
				<div class="row">
					<div class="col-lg-6 text-left nopad">
						<a href="#"><span>Bull</span></a>
					</div>
					<div class="col-lg-6 text-right nopad">
						<h6><small>26 Minutes ago</small></h6>
					</div>
				</div>
				<div class="row">
					<div class="comment-message">
						<p>I feel good so good</p>
					</div>
				</div>
			</div>
			<br clear="all">
		</div>
		@if(Auth::check())
		<div class="reply-textarea">
			<div class="col-lg-12 nopad">
				@if(isset($profile->prof_pic))
				<a href="#" class="arrow_right"><img src="{{ mediaSrc($profile->prof_pic->image_path, $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" class="img-thumbnail profile-pic"></a>
				@else
				<a href="#" class="arrow_right"><img src="{{ URL::asset('assets/img/prof.png') }}" class="img-thumbnail profile-pic"></a>
				@endif
				<textarea class="form-control"></textarea>
			</div>
			<br clear="all">
		</div>
		@endif
	</div>