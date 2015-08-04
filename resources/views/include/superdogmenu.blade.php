<div>
	<nav>
		<ul>
			@if(Auth::check())
				@if($user_data->isNotNull('selected'))
				<li>
					<a href="<?php echo route('profile.view' , ['id' => $user_data->user_id] ) ?>">
						<img src="<?php echo mediaSrc($user_data->selected->profile_pic->image_path, $user_data->selected->profile_pic->image_name, $user_data->selected->profile_pic->image_ext); ?>" class="profile-pic">
						<span><?php echo $user_data->selected->pet_name; ?></span>
					</a>
				</li>
				@elseif($user_data->isNotNull('prof_pic'))
				<li>
					<a href="<?php echo route('profile.view' , ['id' => $user_data->user_id] ) ?>">
						<img src="<?php echo mediaSrc($user_data->prof_pic->image_path, $user_data->prof_pic->image_name, $user_data->prof_pic->image_ext); ?>" class="profile-pic">
						<span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
					</a>
				</li>		
				@else
				<li>
					<a href="<?php echo route('profile.view' , ['id' => $user_data->user_id] ) ?>">
						<img src="<?php echo URL::asset('assets/images/default-pic.png') ?>" class="profile-pic" >
						<span><?php echo $user_data->registration->first_name . ' ' . $user_data->registration->last_name; ?></span>
					</a>
				</li>
				@endif
			@else
			<li>
				<a href="<?php echo route('home') ?>">
					<img src="<?php echo URL::asset('assets/img/notification.png') ?>" class="profile-pic">
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
								<li><a href="<?php echo route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) ?>">
										<img src="<?php echo mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) ?>" class="profile-pic">
										<span><?php echo $row->pet_name ?></span>
									</a>
								</li>
								@else
								<li>
									<a href="<?php echo route('profile.showPetProfile' , ['user_id' => Auth::id() , 'pet_id' => $row->pet_id]) ?>">
										<img src="<?php echo URL::asset('assets/images/default-pic.png') ?>" class="profile-pic">
										<span><?php echo $row->pet_name ?></span>
									</a>
								</li>
								@endif
							@endforeach
						</ul>
					@endif
				@endif
			</li>
			@else
			
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
	<label class="text-muted">PET NEEDS</label>
	<nav>
		<ul>
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/img/cart.png') }}"><span>Nearest Petshop</span></a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/img/vet.png') }}"><span>Nearest Vet</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/vet.png') }}"><span>Pet Insurance</span></a></li>
			<li><a href="{{ route('public.foundation') }}"><img src="{{ URL::asset('assets/img/foundation.jpg') }}"><span>Animal Shelters</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/adopt.png') }}"><span>Adopt a Pet</span></a></li>
		</ul>
	</nav>
</div>

<div>
	<label class="text-muted">PET WANTS</label>
	<nav>
		<ul>
			<li><a href="#"><img src="{{ URL::asset('assets/img/grooming.png') }}"><span>Pet groomers</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/pwalking.png') }}"><span>Pet Walkers</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/photel.png') }}"><span>Pet Boarding</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/pdating.png') }}"><span>Pet Dating</span></a></li>
		</ul>
	</nav>
</div>

<div>
	<label class="text-muted">PET-FRIENDLY</label>
	<nav>
		<ul>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/prestau.png') }}"><span>Restaurants</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/hotel.png') }}"><span>Hotels</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/park.png') }}"><span>Park/Beach</span></a></li>
			<li><a href="#"><img src="{{ URL::asset('assets/img/travel.png') }}"><span>Travel</span></a></li>
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
			<li><a href="{{ route('public.dogsoftheweek') }}"><img src="{{ URL::asset('assets/img/trophy.png') }}" ><span>Pet of the week</span></a></li>
			@if(Auth::check())
			<li><a href="{{ route('public.history') }}"><img src="{{ URL::asset('assets/img/history.png') }}" ><span>History</span></a></li>
			@endif
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/ranger.png') }}" ><span>Rocky Ranger</span></a></li>
		</ul>
	</nav>
</div>


<div>
	<label class="text-muted">COMMUNITY</label>
	<nav>
		<ul>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/pwalking-.png') }}"><span>Walk with a Buddy</span></a></li>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/Caretakers.png') }}"><span>Care takers</span></a></li>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/Pet_Gathering1.png') }}"><span>Pet Gathering</span></a></li>
			<li><a href="{{ route('uc') }}"><img src="{{ URL::asset('assets/img/Find_Neighbour.png') }}"><span>Find My Neighbours</span></a></li>
		</ul>
	</nav>
	<br clear="all">
</div>













