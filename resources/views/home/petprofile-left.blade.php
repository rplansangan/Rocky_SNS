<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pet-details">
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-photo">
				@if(isset($profile->profile_pic))
					<img class="img-responsive" src="{{ route('files.get.image', array($profile->profile_pic->user_id, $profile->profile_pic->image_id)) }}">
				@else
					<img class="img-responsive" src="{{ URL::asset('assets/images/pet-default.png') }}">
				@endif
		</div>
		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-name text-center">
			<a href="{{ route('profile.petlist', Auth::user()->user_id) }}"><h4>{{ $profile->pet_name }}</h4></a>
		</div>

		<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 pet-infos text-left">
			<label>About {{ $profile->pet_name }}</label>
			<dl class="dl-horizontal">
				<dt>Animal Type:</dt><dd>{{ $profile->pet_type }}</dd>					
				<dt>Breed:</dt><dd>{{ $profile->breed }}</dd>
				<dt>Est Birthday:</dt><dd>{{ $profile->pet_bday }}</dd>
				<dt>Gender:</dt> <dd>@if($profile->pet_gender == 'M') Male @else Female @endif </dd>
				<dt>Weight:</dt> <dd>{{ $profile->weight }}</dd>
				<dt>Height:</dt> <dd>{{ $profile->height }}</dd>
				<dt>Behavior:</dt> <dd>{{{ $profile->pet_behavior->behavior }}}</dd>
				<dt>Food:</dt> <dd>{{{ $profile->pet_food->brand_name }}}</dd>
				<dt>Food Style:</dt> <dd>{{{ $profile->food_style }}}</dd>
				<dt>Food Brand:</dt> <dd>{{ $profile->brand }}</dd>
				<dt>Feeding Interval:</dt> <dd>{{ $profile->feeding_interval }}</dd>
				<dt>Feeding Time:</dt> <dd>{{ $profile->feeding_time }}</dd>
			</dl>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 left-nav">
		<div class="list-group">
			<a href="{{ route('mypet') }}" class="list-group-item loc">Locate My Pets</a>
			<a href="{{ route('pet_of_the_day') }}" class="list-group-item petday">Pet of The Day</a>
			<a href="{{ route('trending') }}" class="list-group-item trend">Trending</a>
			@if(Auth::user()->is_merchant === 1)
				<a href="{{ route('advertised') }}" class="list-group-item ads">Advertise</a>
			@elseif(Auth::user()->is_member === 1)
				<a href="{{ route('addadvertise') }}" class="list-group-item ads">Advertise</a>
			@else(Auth::user()->is_foundation === 1)
				<a href="{{ route('addadvertise') }}" class="list-group-item ads">Advertise</a>
			@endif
			<a href="{{ route('shop') }}" class="list-group-item shop">Shop</a>
			<a href="{{ route('trackers') }}" class="list-group-item track">Trackers</a>
			<a href="{{ route('profile.friends', Auth::id()) }}" class="list-group-item friends">Friends</a>
			<a href="#" class="list-group-item compete">Compete</a>
			<a href="#" class="list-group-item videos">Videos</a>
			<a href="#" class="list-group-item rockyra">Rocky Ranger</a>
			<a href="#" class="list-group-item petfo">Pet Foundation</a>
		</div>
	</div>
</div>