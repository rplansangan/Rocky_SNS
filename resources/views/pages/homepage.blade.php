@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
<script src="{{ URL::asset('assets/js/newsfeed.js') }}"></script>
<div class="container-fluid bg-rocky">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
			@include('home.left')
		</div>
		<div id = "home_middle" class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
			@include('home.middle', array('newsfeed' => $newsfeed))
		</div>
		<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
			@include('home.right')
		</div>
	</div>
</div>
@stop