<div>
	<div class="text-center user-details">
		@if(isset($profile->prof_pic))
			<img src="{{ mediaSrc($profile->prof_pic->image_path, $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" class="profile-pic">
		@else
			<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
		@endif
		<h3>{{ $profile->first_name.' '.$profile->last_name }} <br><small class="text-muted">Have 5 Pets</small></h3>
		<a href="#" class="send-msg">Send a message</a>
		<br clear="all">
	</div>
</div>

@include('include.formPost')
@include('include.newsfeed')