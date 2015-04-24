<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 friend-container">
	<legend>Friends</legend>

	@foreach($friends as $friend)
		<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4 friends-list text-center">
			<a href="#">{{ $friend->profile->first_name }} {{ $friend->profile->last_name }}</a>
		</div>
	@endforeach
</div>