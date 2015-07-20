<div>
	<nav>
		<ul>
			@if(!isset($user_data['profile_picture_path']) AND Auth::check())
			<li><a href="{{ Route('profile.view' , ['id' => $user_data['user_id']] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic" ><span><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></span></a></li>
			@elseif(Auth::check())
			<li><a href="{{ Route('profile.view' , ['id' => $user_data['user_id']] ) }}"><img src="<?php echo mediaSrcAlt($user_data['profile_picture_path'], $user_data['profile_picture_ext']); ?>" class="profile-pic"><span><?php echo $user_data['first_name'] . ' ' . $user_data['last_name']; ?></span></a></li>
			@else
			<li><a href="{{ route('home') }}"><img src="{{ URL::asset('assets/img/notification.png') }}" class="profile-pic"><span>Newsfeed</span></a></li>
			@endif
			@if(Auth::check())
			<li><a href="{{ route('profile.edit') }}"><img src="{{ URL::asset('assets/img/edit-profile.png') }}"><span>Edit Profile</span></a></li>
			@endif
			<li><a href="{{ route('public.nearestpetshop') }}"><img src="{{ URL::asset('assets/img/cart.png') }}"><span>Nearest Petshop</span></a></li>
			<li><a href="{{ route('public.nearestvet') }}"><img src="{{ URL::asset('assets/img/vet.png') }}"><span>Nearest Vet</span></a></li>
			@if(!Auth::check())
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
						<li><a href="#"><img src="{{ mediaSrc($row->profile_pic->image_path , $row->profile_pic->image_name , $row->profile_pic->image_ext) }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@else
						<li><a href="#"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"><span>{{ $row->pet_name }}</span></a></li>
					@endif
				@endforeach
			</ul>
			@else
			<div class="text-left">
				<p style="padding-left: 25px;">No Pets</p>
				<a class="addpet_btn" data-toggle="modal" data-target="#addpetModal" href="javascript:void(0)" style="padding-left: 25px; color: #b7042c;"><i class="fa fa-plus" style="margin-bottom: 20px;"></i> add pets</a>
			</div>
			@endif
		@endif
	</nav>
</div>

@endif

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
	<div class="text-center loading-dots">
		<a href="#"><span>...</span></a>
	</div>
	<br clear="all">
</div>
@endif












