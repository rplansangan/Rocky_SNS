@extends('master')
@section('content')
<div class="container">
	<div class="merch-details">
		<h2>Branch Name</h2>
		<p>1234 Street Building Address</p>
		<p>Business details lorem ipsum dolor</p>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 merch-details">
		<a href="tel:0000 000 000">0000 000 000</a>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-feat-ad">
		<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 mf-adimg">
			<img src="{{ URL::asset('assets/images/ad11.jpg') }}">
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 mf-adinfo">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<a href="">INQUIRE</a>
			<a href="">ORDER</a>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-ads">
		<ul>
			<li><img src="{{ URL::asset('assets/images/ad22.jpg') }}"></li>
			<li><img src="{{ URL::asset('assets/images/ad11.jpg') }}"></li>
			<li><img src="{{ URL::asset('assets/images/ad33.jpg') }}"></li>
		</ul>
	</div>
</div>
@stop