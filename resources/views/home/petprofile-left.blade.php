<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-photo">
			@if(isset($profile->profile_pic))
				<img src="{{ route('files.get.image', array($profile->user_id, $profile->profile_pic->image_id)) }}">
			@else
				<img src="{{ URL::asset('assets/images/pet-default.png') }}">
			@endif
	</div>
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-name text-center">
		<a href="{{ route('profile.petlist', Auth::user()->user_id) }}"><h4>{{ $profile->pet_name }} {{ $profile->pet_name }}</h4></a>
	</div>
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