<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 friend-container">
	<legend>Friends</legend>

	@if($friends->isEmpty())
		<h3>You have no friends yet.</h3>
	@else
		@foreach($friends as $friend)
			<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 friends-list text-center">
				<a href="{{{ route('profile.showProfile', $friend->profile->registration_id) }}}">{{ $friend->profile->first_name }} {{ $friend->profile->last_name }}</a>
			</div>
		@endforeach
	@endif
</div>