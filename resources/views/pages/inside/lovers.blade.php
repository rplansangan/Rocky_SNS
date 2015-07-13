@include('include.formPost')

	@if(!$newsfeed->isEmpty())
		@foreach($newsfeed as $row)
			<!-- NEWSFEED AREA-->
			<div class="newsfeed">
				<!-- NEWSFEED TOP -->
				<div class="row newsfeed-top">
					<div class="col-lg-12">
						<h5> 
							@if(isset($row->user->prof_pic))
								<a href="#"><img src="{{ mediaSrc($row->user->prof_pic->image_path, $row->user->prof_pic->image_name , $row->user->prof_pic->image_ext) }}" class="profile-pic"></a>
							@else
								<a href="#"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"></a>
							@endif
							<a href="#"><span>{{ $row->user->first_name.' '.$row->user->last_name }}</span></a>
							@if(isset($row->image))
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
					<p>{{ $row->post->post_message }}</p>

					@if(isset($row->image))
						@if(stristr($row->image->image_mime, 'image/'))
						<div class="image-content">
							<img src="{{  mediaSrc($row->image->image_path, $row->image->image_name , $row->image->image_ext)  }}" class="img-responsive img-thumbnail">
						</div>
						@else
						<div class="video-content">
							<div>
								<img src="{{ mediaSrc($row->image->image_path, $row->image->image_name.'_thumb' , 'jpg') }}" class="img-responsive img-thumbnail">
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
				<div class="reply-textarea">
					<div class="col-lg-1 nopad">
						@if(Auth::check())
							@if(isset($profile->prof_pic))
								<a href="#" class="arrow_right"><img src="{{ mediaSrc($profile->prof_pic->image_path, $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" class="img-thumbnail profile-pic"></a>
							@else
								<a href="#" class="arrow_right"><img src="{{ URL::asset('assets/img/prof.png') }}" class="img-thumbnail profile-pic"></a>
							@endif
						@endif
					</div>
					<div class="col-lg-11 nopad">
						<textarea class="form-control"></textarea>
					</div>
					<br clear="all">
				</div>
			</div>
		@endforeach
	@else
		<div class="text-center"><p>No Post</p></div>
	@endif
