@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.profile-left', array(
					'friend_flags' => $friend_flags
				))
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
			<input type="hidden" id="profile_id" value="{{{ $profile->registration_id }}}">
				<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
					<legend>My Advertisement</legend>
					<ul class="media-list append-post">
						@foreach($post as $single)
							@include('ajax.post', array(
								'user' => $profile, 
								'message' => $single->post, 
								'image' => $single->image[0], 
								'like' => $like[0]->like, 
								'comments' => $like[0]->comment
							))
						@endforeach
				</div>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop