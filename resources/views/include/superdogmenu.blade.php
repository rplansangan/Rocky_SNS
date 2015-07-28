<div>
	<nav>
		<ul>		
			@if(Auth::check())
				@if(isset($user_data->selected_pet))
				<li>
					<a href="{{ Route('profile.view' , ['id' => $user_data->user_id] ) }}">
						<img src="<?php echo mediaSrc($user_data->selected_pet->profile_pic->image_path, $user_data->selected_pet->profile_pic->image_name, $user_data->selected_pet->profile_pic->image_ext); ?>" class="profile-pic">
						<span><?php echo $user_data->selected_pet->pet_name; ?></span>
					</a>
				</li>
				@elseif(isset($user_data->prof_pic))
				<li>
					<a href="{{ Route('profile.view' , ['id' => $user_data->user_id] ) }}">
						<img src="<?php echo mediaSrc($user_data->prof_pic->image_path, $user_data->prof_pic->image_name, $user_data->prof_pic->image_ext); ?>" class="profile-pic">
						<span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
					</a>
				</li>		
				@else
				<li>
					<a href="{{ Route('profile.view' , ['id' => $user_data->user_id] ) }}">
						<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic" >
						<span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
					</a>
				</li>
				@endif
			@else
			<li>
				<a href="{{ route('home') }}">
					<img src="{{ URL::asset('assets/img/notification.png') }}" class="profile-pic">
					<span>Newsfeed</span>
				</a>
			</li>
			@endif
			@if(Auth::check())
			<li>
				<a href="javascript:void(0);" data-toggle="collapse" data-target="#petlist-edit" aria-expanded="false" aria-controls="petlist-edit"><img src="{{ URL::asset('assets/img/edit-profile.png') }}"><span>Edit Profile</span></a>
				@if(isset($my_pets))
					@if(!$my_pets->isEmpty())
						<ul class="petlist-edit collapse" id="petlist-edit">
							@foreach($my_pets as $row)
								@if(isset($row->profile_pic))
								<li><a href="{{ route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) }}"><img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
								@else
								<li><a href="{{ route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
								@endif
							@endforeach
						</ul>
					@endif
				@endif
			</li>
			@else
			<li><a href="{{ route('public.neighbors') }}"><img src="{{ URL::asset('assets/img/neighbors.png') }}"><span>Neighbors</span></a></li>
			@endif
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
					<li><a href="{{ route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) }}"><img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@else
					<li><a href="{{ route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@endif
					@endforeach
				</ul>
				@else
				<div class="text-left">
					<p style="padding-left: 25px;">No Pets</p>
				</div>
			@endif
		@endif
	</nav>
	<div class="text-left">
		<a href="#" style="padding-left: 25px; color: #b7042c;"  data-toggle="modal" data-target="#addpetModal"><i class="fa fa-plus" style="margin-bottom: 20px;"></i> add pets</a>
	</div>
</div>

@endif

<div>
	<nav>
		<ul>
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/img/grooming.png') }}"><span>Pet groomers</span></a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/img/pwalking.png') }}"><span>Pet Walkers</span></a></li>
			<li><a href="{{ route('public.foundation') }}"><img src="{{ URL::asset('assets/img/photel.png') }}"><span>Pet Hotels</span></a></li>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/pdating.png') }}"><span>Pet Dating</span></a></li>
		</ul>
	</nav>
</div>

<div>
	<nav>
		<ul>
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/img/cart.png') }}"><span>Nearest Petshop</span></a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/img/vet.png') }}"><span>Nearest Vet</span></a></li>
			<li><a href="{{ route('public.foundation') }}"><img src="{{ URL::asset('assets/img/foundation.jpg') }}"><span>Animal Shelters</span></a></li>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/prestau.png') }}"><span>Pet-friendly Restaurants</span></a></li>
		</ul>
	</nav>
</div>
<div>
	<label class="text-muted">WHAT TO WATCH</label>
	<nav>
		<ul>
			@if(Auth::check())
			<li><a href="{{ route('public.myuploads') }}"><img src="{{ URL::asset('assets/img/upload.png') }}" ><span>My Uploads</span></a></li>
			@endif
			<li><a href="{{ route('public.dogsoftheweek') }}"><img src="{{ URL::asset('assets/img/trophy.png') }}" ><span>Dogs of the week</span></a></li>
			@if(Auth::check())
			<li><a href="{{ route('public.history') }}"><img src="{{ URL::asset('assets/img/history.png') }}" ><span>History</span></a></li>
			@endif
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/ranger.png') }}" ><span>Rocky Ranger</span></a></li>
		</ul>
	</nav>
</div>
@if(Auth::check())
<div>
	<label class="text-muted">MY NEIGHBORS</label>
	<nav>
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
			<p style="padding-left: 25px;">You have no Neighbors</p>
			<a href="{{ route('public.neighbors') }}" style="padding-left: 25px; color: #b7042c;"><i class="fa fa-user-plus"></i> add neighbors</a>
		</div>
		@endif
	</nav>
	<br clear="all">
	<div class="text-center loading-dots">
		<a href="#"><span>...</span></a>
	</div>
	<br clear="all">
</div>
@endif












