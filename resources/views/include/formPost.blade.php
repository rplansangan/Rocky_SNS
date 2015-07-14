@if(Auth::check())
<!-- POST FORM -->
<div class="post-area">
	<div class="col-lg-1">
		@if(isset($user_data['profile_picture_path']))
		<a href="#" class="arrow_right"><img src="<?php echo mediaSrcAlt($user_data['profile_picture_path'], $user_data['profile_picture_ext']); ?>" class="img-thumbnail"></a>
		@else
		<a href="#" class="arrow_right"><img src="{{ URL::asset('assets/images/new/prof-icon.png') }}" class="img-thumbnail"></a>
		@endif
	</div>
	<div class="col-lg-11">
		<form method="POST" action="{{ route('files.newsfeed') }}" id="form" role="form" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" id="fileMedia" class="hidden" name="file" accept="video/* , image/*" multiple>
			<textarea class="form-control" placeholder="Share your Thoughts" name="message" rows="4"></textarea>
			<div class="text-left col-lg-9 nopad">
				<a href="javascript:void(0);" id="addMediaBtn"><img src="{{ URL::asset('assets/img/add_photos.png') }}"> Add Photos/Videos</a>
				<a href="javascript:void(0);" id="tagNeighborBtn"><img src="{{ URL::asset('assets/img/tag.png') }}"> Tag Friends in your post</a>
			</div>
			<div class="col-lg-3 text-right nopad">
				<button class="btn btn-custom"> Post </button>
			</div>
		</form>
	</div>
	<br clear="all">
</div>
<!-- END POST FORM -->
@endif