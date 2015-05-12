<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 friend-container">
	<legend>Friends</legend>

	@foreach($friends as $friend)
		<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 friends-list text-center">
			<img src="{{ route('files.get.image', array($friend->profile->registration_id, $friend->images->image_id)) }}" class="img-responsive" alt="profile picture">
			<a href="{{{ route('profile.showProfile', $friend->profile->registration_id) }}}">{{ $friend->profile->first_name }} {{ $friend->profile->last_name }}</a>
		</div>
	@endforeach
</div>