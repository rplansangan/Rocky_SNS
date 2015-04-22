@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content text-center">
	<div class="land-vid col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<iframe width="1060" height="485" src="https://www.youtube.com/embed/V4BFzpAcYc4?autoplay=1" frameborder="0" allowfullscreen></iframe>
	</div>

	<div class="land-btn col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center">
		Want to join our awesome community? &nbsp;
		<a class="redi-btn" href="{{ route('signup') }}">
			Signup Here!
		</a>
	</div>
</div>

@stop