@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merchdet-cont">
		<div class="merch-details col-sm-12 col-xs-12 col-lg-7 col-md-7">
			<h2>{{ $info[0]->business_name }}</h2>
			<p>{{ $info[0]->address_line1 }} {{ $info[0]->address_line2 }} {{ $info[0]->city }} {{ $info[0]->zip }} {{ $info[0]->state }} {{ $info[0]->country }}</p>
			<p>{{ $info[0]->company_background }}</p>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 merch-condetails">
			<p>Contact No.<a href="tel:{{ $info[0]->phone_number }}"> {{ $info[0]->phone_number }}</a></p>
			<a class="btn btn_merch_addnewads" href="{{ Route('add_advertisement') }}">Add new advertisement</a>
		</div>
	</div>

	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-feat-ad">
		<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 mf-adimg">
			@if(isset($details[0]->image[0]))
				<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($details[0]->user_id, $details[0]->image[0]->image_id)) }}" width="500px">
			@else
				<img src="{{ URL::asset('assets/images/AdHere.png') }}">
			@endif
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 mf-adinfo">
			<h3>{{ $details[0]->title }}</h3>
			<p>{!! $details[0]->post->post_message !!}</p>
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