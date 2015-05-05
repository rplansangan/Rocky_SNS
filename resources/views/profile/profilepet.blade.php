

@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
<div class="container-fluid petprof-container">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 left">
				@include('home.petprofile-left', array('profile_pic' => $profile->profile_pic))
			</div>
			<div class="col-lg-7 col-lg-7 col-md-3 col-sm-12 col-xs-12 petmid middle">
			<input type="hidden" id="profile_id" value="{{{ $profile->registration_id }}}">
				@include('home.petprofile')
			</div>
		</div>
	</div>
</div>
@stop