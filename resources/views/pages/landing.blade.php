@extends('master')
@section('site_title')
Welcome to Rocky The Superdog
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 landing-content text-center">
	<div class="land-left-found col-sm-12 col-xs-12 col-md-3 col-lg-3">
		<h3><span class="glyphicon glyphicon-hand-right"></span>
			<a href="{{ Route('found_pets') }}">Found Pets</a>
		<span class="glyphicon glyphicon-hand-left"></span></h3>
		<div class="found-imgs">
			<img src="{{ URL::asset('assets/images/found1.jpg') }}" width="250px" height="185px">
			<img src="{{ URL::asset('assets/images/found2.jpg') }}" width="250px" height="185px">
		</div>
		<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>
	</div>

	<div class="land-mid-vid-btn col-sm-12 col-xs-12 col-md-6 col-lg-6">
		<div class="land-vid col-sm-12 col-xs-12 col-md-12 col-lg-12">
			<iframe width="660" height="385" src="https://www.youtube.com/embed/V4BFzpAcYc4?autoplay=1" frameborder="0" allowfullscreen></iframe>
		</div>

		<div class="land-btn col-sm-12 col-xs-12 col-md-12 col-lg-12 text-center">
			Want to join our awesome community? &nbsp;
			<a class="redi-btn" href="{{ route('signup') }}">
				Signup Here!
			</a>
		</div>
	</div>

	<div class="land-right-missing col-sm-12 col-xs-12 col-md-3 col-lg-3">
		<h3><span class="glyphicon glyphicon-hand-right"></span>
			<a href="{{ Route('missing_pets') }}">Missing Pets</a>
		<span class="glyphicon glyphicon-hand-left"></span></h3>
		<div class="missing-imgs">
			<img src="{{ URL::asset('assets/images/missing1.jpg') }}" width="250px" height="185px">
			<img src="{{ URL::asset('assets/images/missing2.jpg') }}" width="250px" height="185px">
		</div>
		<button type="button" class="btn btn_missing" data-toggle="modal" data-target="#misfo" data-type="Missing" data-advertisetype="Find My Pet"  data-title="Missing Pet" data-id="" data-action="" >Find My Pet</button>
	</div>
</div>

@stop