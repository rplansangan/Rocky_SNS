@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merchdet-cont">
		<div class="merch-details col-sm-12 col-xs-12 col-lg-7 col-md-7">
			<h2>{{ $info[0]->business_name }}</h2>
			<p class="bnaddress">{{ $info[0]->address_line1 }} {{ $info[0]->address_line2 }},</p>
			<p class="bnaddress">{{ $info[0]->city }}, {{ $info[0]->zip }} {{ $info[0]->state }} {{ $info[0]->country }}</p>
			<p class="bnbg">{!! $info[0]->company_background !!}</p>
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
			<p>{{ $details[0]->created_at }}  {{ $details[0]->type }}</p>
			<p>{!! $details[0]->post->post_message !!}</p>
			<button type="button" class="btn btn_inquire btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Inquire" data-advertisetype="INQ"  data-title="{{ $details[0]->title }}" data-id="{{ $details[0]->id }}" data-action="{{ Route('merchant.inquire') }}" >INQUIRE</button>
			<button type="button" class="btn btn_order btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Order" data-advertisetype="ORD" data-title="{{ $details[0]->title }}" data-id="{{ $details[0]->id }}" data-action="{{ Route('merchant.inquire') }}">ORDER</a>
			</div>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-ads text-center">
			@if($otherads->isEmpty())
			<h3>No Other Advertisements</h3>
			@else
			<h4>Other Ads by {{ $info[0]->business_name }}</h4>
				@foreach($otherads as $adver)
					<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4">
						<a href="#">
							@if(isset($adver->image[0]))
							<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($details[0]->user_id, $adver->image[0]->image_id)) }}" width="250px">
							@else
							<img src="{{ URL::asset('assets/images/AdHere.png') }}" width="250px">
							@endif
						</a>
						<a href="#"><h3>{{ $adver->title}}</h3></a>
						<p>{{ $adver->created_at }} {{ $adver->type }}</p>
					</div>			
				@endforeach
			@endif
		</div>
	</div>
	@stop
