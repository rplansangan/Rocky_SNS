<div>
	<nav>
		<ul>
			@if(!isset($profile->prof_pic) AND Auth::check())
			<li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic" ><span>{{ $profile->first_name.' '.$profile->last_name }}</span></a></li>
			@elseif(Auth::check())
			<li><a href="{{ Route('profile.view' , ['id' => Auth::check()] ) }}"><img src="{{ mediaSrc($profile->prof_pic->image_path , $profile->prof_pic->image_name , $profile->prof_pic->image_ext) }}" class="profile-pic"><span>{{ $profile->first_name.' '.$profile->last_name }}</span></a></li>
			@else
			<li><a href="{{ route('home') }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>Public</span></a></li>
			@endif
			@if(Auth::check())
			<li><a href="{{ route('profile.edit') }}"><img src="{{ URL::asset('assets/img/edit-profile.png') }}"><span>Edit Profile</span></a></li>
			@endif
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/img/cart.png') }}"><span>Nearest Petshop</span></a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/img/vet.png') }}"><span>Nearest Vet</span></a></li>
		</ul>
	</nav>
</div>

@if(Auth::check())
<div>
	<label class="text-muted">VIEW AS</label>
	<nav>
		@if(isset($my_pets))
			@if(!$my_pets->isEmpty())
			<ul>
				@foreach($my_pets as $row)
					@if(isset($row->profile_pic))
						<li><a href="#"><img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@else
						<li><a href="#"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@endif
				@endforeach
			</ul>
			@else
			<div class="text-left">
				<p style="padding: 0 15px;">No Pets</p>
			</div>
			@endif
		@endif
		<div class="text-left" style="margin: 10px 0;">
			<a href="#" class="add-pets-btn" style="color: #b7062b; padding: 0 15px;"><i class="fa fa-plus"></i> Add Pets</a>
		</div>
	</nav>
</div>

@endif

<div>
	<label class="text-muted">WHAT TO WATCH</label>
	<nav>
		<ul>
			@if(Auth::check())
			<li><a href="#"><img src="{{ URL::asset('assets/img/upload.png') }}" ><span>My Uploads</span></a></li>
			@endif
			<li><a href="{{ route('public.dogsoftheweek') }}"><img src="{{ URL::asset('assets/img/trophy.png') }}" ><span>Dogs of the week</span></a></li>
			@if(Auth::check())
			<li><a href="#"><img src="{{ URL::asset('assets/img/history.png') }}" ><span>History</span></a></li>
			@endif
			<li><a href="#"><img src="{{ URL::asset('assets/img/ranger.png') }}" ><span>Rocky Ranger</span></a></li>
		</ul>
	</nav>
</div>

<div>
	<label class="text-muted">MY NEIGHBORS</label>
	<nav>
		@if(Auth::check())
			@if(!$neighbors->isEmpty())
			<ul>
				@foreach($neighbors as $row)
					@if(isset($row->profile->registration->prof_pic))
						<li><a href="{{ Route('profile.view' , ['id' => $row->profile->registration->user_id] ) }}"><img src="{{ mediaSrc($row->profile->registration->prof_pic->image_path , $row->profile->registration->prof_pic->image_name , $row->profile->registration->prof_pic->image_ext)  }}" class="profile-pic"><span>{{ $row->profile->registration->first_name.' '.$row->profile->registration->last_name }}</span></a></li>
					@else
						<li><a href="{{ Route('profile.view' , ['id' => $row->profile->registration->user_id] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>{{ $row->profile->registration->first_name.' '.$row->profile->registration->last_name }}</span></a></li>
					@endif
				@endforeach
			</ul>
			@else
			<div class="text-left" style="padding:5px 0px 10px 0px">
				<p style="padding: 0 15px;">You have no Neighbors</p>
			</div>
			@endif
			<div class="text-left">
				<a href="{{ Route('public.neighbors') }}" style="color: #b7062b; padding: 0 15px;"><i class="fa fa-plus"></i> Add Neighbors</a>
			</div>	
		@else
		<div class="text-left">
			<a href="#" style="color: #b7062b; padding: 10px 20px;" data-toggle="modal" data-target="#loginModal">Login to see Neighbors</a>
		</div>	
		@endif
	</nav>
	<div class="text-center loading-dots">
		<a href="#"><span>...</span></a>
	</div>
</div>













