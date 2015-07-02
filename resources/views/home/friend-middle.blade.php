<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 friend-container">
	<legend>Friends</legend>

	@if($friends->isEmpty())
		<h3>You have no friends yet.</h3>
	@else
		@foreach($friends as $friend)
			<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 friends-list text-center">
				<div class="friends-img">
					@if(!is_null($friend->profile->registration->prof_pic))
						<img src="{{ mediaSrc($friend->profile->registration->prof_pic->image_path, $friend->profile->registration->prof_pic->image_name, $friend->profile->registration->prof_pic->image_ext) }}" class="img-responsive" width="150px">
					@else
						<img src="{{ URL::asset('assets/images/owner-default.png') }}" width="150px">
					@endif
				</div>
				<div class="friends-name">
					<a href="{{{ route('profile.showProfile', $friend->profile->registration->user_id) }}}">{{ $friend->profile->registration->first_name }} {{ $friend->profile->registration->last_name }}</a>
				</div>
			</div>
		@endforeach
	@endif
</div>