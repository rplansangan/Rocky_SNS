<div class="row">
	<div class="col-sm-12 col-md-12 col-xs-12 col-lg-12 left-nav">
		<div class="list-group">
			<a href="{{ route('mypet') }}" class="list-group-item loc">Locate My Pets</a>
			<a href="{{ route('pet_of_the_day') }}" class="list-group-item petday">Pet of The Day</a>
			<a href="{{ route('trending') }}" class="list-group-item trend">Trending</a>
			@if(Auth::user()->is_merchant === 1)
				<a href="{{ route('advertised') }}" class="list-group-item ads">Advertise</a>
			@elseif(Auth::user()->is_member === 1)
				<a href="#" class="list-group-item ads">Advertise</a>
			@else(Auth::user()->is_foundation === 1)
				<a href="#" class="list-group-item ads">Advertise</a>
			@endif
			<a href="{{ route('shop') }}" class="list-group-item shop">Shop</a>
			<a href="{{ route('trackers') }}" class="list-group-item track">Trackers</a>
			<a href="{{ route('profile.friends', Auth::id()) }}" class="list-group-item friends">Friends</a>
			<a href="{{ route('compete') }}" class="list-group-item compete">Compete</a>
			<a href="{{ route('videos') }}" class="list-group-item videos">Videos</a>
			<a href="{{ route('rockyranger') }}" class="list-group-item rockyra">Rocky Ranger</a>
			<a href="{{ route('petfoundation') }}" class="list-group-item petfo">Pet Foundation</a>
		</div>
	</div>
</div>