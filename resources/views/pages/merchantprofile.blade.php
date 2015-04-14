@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merchdet-cont">
		<div class="merch-details col-sm-12 col-xs-12 col-lg-7 col-md-7">
			<h2>Branch Name</h2>
			<p>1234 Street Building Address</p>
			<p>Business details lorem ipsum dolor</p>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 merch-condetails">
			<p>Contact No.<a href="tel:0000 000 000"> 0000 000 000</a></p>
			<a class="btn btn_merch_addnewads" href="">Add new advertisement</a>
		</div>
	</div>

	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-feat-ad">
		<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 mf-adimg">
			<img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="500px">
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 mf-adinfo">
			<h3>Advertisement Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
				Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
			<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
		</div>
	</div>
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-ads">
		<h4>Other Ads by Branch Name</h4>
		<ul>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
			<li>
				<a href="#"><img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="250px"></a>
				<a href="#"><h3>Advertisement Title</h3></a>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
			</li>
		</ul>
	</div>
</div>
@stop