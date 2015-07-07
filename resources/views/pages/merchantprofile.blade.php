@extends('master')
@section('content')
<div class="container">
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merchdet-cont">
		<div class="merch-details col-sm-12 col-xs-12 col-lg-7 col-md-7">
			<h2>{{ $info->business_name }}</h2>
			<p class="bnaddress">{{ $info->address_line1 }} {{ $info->address_line2 }},</p>
			<p class="bnaddress">{{ $info->city }}, {{ $info->zip }} {{ $info->state }} {{ $info->country }}</p>
			<p class="bnbg">{!! $info->company_background !!}</p>
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 merch-condetails">
			<p>Contact No.<a href="tel:{{ $info->phone_number }}"> {{ $info->phone_number }}</a></p>
			<a class="btn btn_merch_addnewads" href="{{ Route('add_advertisement') }}">Add new advertisement</a>
		</div>
	</div>

	@if(!is_null($details->post))
	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-feat-ad">
		<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 mf-adimg">
			@if(isset($details->post->image))
				<img class="col-sm-12 thumbnail" src="{{ mediaSrc($details->post->image->image_path, $details->post->image->image_name, $details->post->image->image_ext) }}" width="500px">
			@else
				<img src="{{ URL::asset('assets/images/AdHere.png') }}">
			@endif
		</div>
		<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 mf-adinfo">
			<h3>{{ $details->title }}</h3>
			<p>{{ $details->created_at }}  {{ $details->type }}</p>
			<p>{!! $details->post->post_message !!}</p>
			<button type="button" class="btn btn_inquire btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Inquire" data-advertisetype="INQ"  data-title="{{ $details->title }}" data-id="{{ $details->id }}" data-action="{{ Route('merchant.inquire') }}" >INQUIRE</button>
			<button type="button" class="btn btn_order btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Order" data-advertisetype="ORD" data-title="{{ $details->title }}" data-id="{{ $details->id }}" data-action="{{ Route('merchant.inquire') }}">ORDER</button>
		</div>
	</div>
	@endif
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-ads text-center">
			@if($otherads->isEmpty())
			<h3>No Other Advertisements</h3>
			@else
			<h4>Other Ads by {{ $info->business_name }}</h4>
				@foreach($otherads as $adver)
					<div class="col-sm-12 col-xs-12 col-lg-4 col-md-4">
						<a href="{{ Route('merch_adview', array($adver->user_id, $adver->id)) }}">
							@if(isset($adver->post->image))
							<img class="col-sm-12 thumbnail" src="{{ mediaSrc($details->post->image->image_path, $details->post->image->image_name, $details->post->image->image_ext) }}" width="250px">
							@else
							<img src="{{ URL::asset('assets/images/AdHere.png') }}" width="250px">
							@endif
						</a>
						<a href="{{ Route('merch_adview', array($adver->user_id, $adver->id)) }}"><h3>{{ $adver->title}}</h3></a>
						<p>{{ $adver->created_at }} {{ $adver->type }}</p>
					</div>			
				@endforeach
			@endif
		</div>
</div>
@stop
