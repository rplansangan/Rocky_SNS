@if(!empty($profileInformation))
	<div>
		<div class="text-center user-details">
			@if(isset($profileInformation->prof_pic))
				<img src="{{ mediaSrc($profileInformation->prof_pic->image_path, $profileInformation->prof_pic->image_name , $profileInformation->prof_pic->image_ext) }}" class="profile-pic">
			@else
				<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-dp">
			@endif
			<h3>{{ $profileInformation->first_name.' '.$profileInformation->last_name }} <br><small class="text-muted">Have 5 Pets</small></h3>
			<a href="#" class="send-msg">Send a message</a>
			<br clear="all">
		</div>
	</div>

	@if(Auth::id() == $id)
		@include('include.formPost')
	@endif
	@include('include.newsfeed')
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif