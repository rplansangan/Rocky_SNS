<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-photo">
		<a href="{{ route('profile.showProfile', Auth::id()) }}">
			@if(isset($pet->image))	
				<img src="{{ route('files.get.image', array($user->user_id, $user->image[0]->image_id)) }}">
			@else
				<img src="{{ URL::asset('assets/images/owner-default.png') }}">
			@endif
		</a>
		<div class="glyphicon glyphicon-edit"></div>
	</div>

	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-name text-center">
		<a href="{{ route('profile.showProfile', Auth::id()) }}"><h4>{{ $profile->first_name }} {{ $profile->last_name }}</h4></a>
	</div>
	@if(Auth::id() != $profile->registration_id)
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 add-friend-btn">
		<a href="{{ route('profile.request.add') }}" id="btn_add_friend" _token="{{ csrf_token() }}">Add Friends</a>
	</div>
	@endif
</div>

<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 left-nav">
		<div class="list-group">
			<a href="{{ route('mypet') }}" class="list-group-item loc">Locate My Pets</a>
			<a href="{{ route('pet_of_the_day') }}" class="list-group-item petday">Pet of The Day</a>
			<a href="{{ route('trending') }}" class="list-group-item trend">Trending</a>
			<a href="{{ route('advertised') }}" class="list-group-item ads">Advertise</a>
			<a href="{{ route('shop') }}" class="list-group-item shop">Shop</a>
			<a href="{{ route('trackers') }}" class="list-group-item track">Trackers</a>
			<a href="#" class="list-group-item friends">Friends</a>
		</div>
	</div>
</div>