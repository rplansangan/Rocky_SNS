<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 friend-container">
	<legend>Friends</legend>

	@if($friends->isEmpty())
		<h3>You have no friends yet.</h3>
	@else
		@foreach($friends as $friend)
			<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 friends-list text-center">
				@if(!is_null($friend->profile->prof_pic))
				<img class="img-responsive" src="{{{ route('files.get.image', array($friend->profile->user_id, $friend->profile->prof_pic->image_id)) }}}">
				@else
				no profile picture.
				@endif
				<a href="{{{ route('profile.showProfile', $friend->profile->registration_id) }}}">{{ $friend->profile->first_name }} {{ $friend->profile->last_name }}</a>
			</div>
		@endforeach
	@endif
</div>