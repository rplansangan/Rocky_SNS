<div class="row">
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-photo">
		<a  href="{{ route('profile.showProfile', Auth::id()) }}">
			@if(isset($profile->prof_pic))	
				<img class="img-responsive" src="{{ route('files.get.image', array($profile->prof_pic->user_id, $profile->prof_pic->image_id)) }}">
			@else
				<img src="{{ URL::asset('assets/images/owner-default.png') }}">
			@endif
		</a>
	</div>
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 prof-name text-center">
		<a href="{{ route('profile.showProfile', Auth::id()) }}"><h4>{{ $profile->registration->first_name }} {{ $profile->registration->last_name }}</h4></a>
	</div>

	<ul class="col-sm-12 col-xs-12 col-md-12 col-lg-12 fr-btns">
		@if(Auth::id() != $profile->user_id)
			<li class="add-friend-btn text-center">
				@if($friend_flags->friendRequest())	
					<a href="{{ route('profile.request.friend') }}" id="btn_add_friend" _token="{{{ csrf_token() }}}" data-act="req">
						{{ trans('profile.friend.is_pending') }}
					</a>								
				@elseif(!$friend_flags->isFriend())
					<a href="{{ route('profile.request.friend') }}" id="btn_add_friend" _token="{{{ csrf_token() }}}" data-act="add">
						{{ trans('profile.friend.add_friend') }}
					</a>
				@else
					<a href="{{ route('profile.request.friend') }}" id="btn_add_friend" _token="{{{ csrf_token() }}}" data-act="canc">
						{{ trans('profile.friend.added') }}					
					</a>
					@if(Route::current()->getParameter('id') != null)
						<a href="{{ route('profile.friends', Route::current()->getParameter('id')) }}">Friends</a>
					@else
						<a href="{{ route('profile.friends', Auth::id()) }}">Friends</a>
					@endif
				@endif
			</li>

			<li class="msg-btn text-center">
				<button type="button" class="btn_sendmsg btn-primary" data-toggle="modal" data-target="#sendmsgModal" data-recipient="{{ $profile->registration->first_name }} {{ $profile->registration->last_name }}">Send a Message</button>
			</li>
		@endif
	</ul>
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
			@if(Route::current()->getParameter('id') != null)
			<a href="{{ route('profile.friends', Route::current()->getParameter('id')) }}" class="list-group-item friends">Friends</a>
			@else
			<a href="{{ route('profile.friends', Auth::id()) }}" class="list-group-item friends">Friends</a>
			@endif
			<a href="#" class="list-group-item compete">Compete</a>
			<a href="#" class="list-group-item videos">Videos</a>
			<a href="#" class="list-group-item rockyra">Rocky Ranger</a>
			<a href="#" class="list-group-item petfo">Pet Foundation</a>
		</div>
	</div>
</div>