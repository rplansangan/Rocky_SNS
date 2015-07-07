@extends('master')
@section('content')
<div class="adshop-content col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h1>SHOP - Still under construction</h1></legend>

	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-search">
		<form action="{{ route('shop') }}" method="GET" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-sm-2 control-label">TYPE:</label>
				<div class="col-sm-3">
					<select name="type" class="form-control">
						<option value="">- Select type -</option>
						<option value="Pets for Sale" >Pets for sale</option>
						<option value="Services" >Services</option>
						<option value="Items" >Items</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">COUNTRY:</label>
				<div class='col-sm-3'>
					{{ country_form() }}
				</div>

				<div class='col-sm-2'>
					<input type='text' name="state_ads" placeholder="STATE" class="form-control" />
				</div>

				<div class='col-sm-2'>
					<input type='text' name="zip_ads" placeholder="ZIP" class="form-control" />
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" name="search" value="SEARCH"/>
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" name="search" value="ALL"/>
				</div>
			</div>
		</form>
	</div>

	<div class="container">
			@foreach($info as $business)
				@foreach($business->advertise as $row)
					<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel ads-panel">
						<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
							@if(isset($row->post->image))
							<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($row->user_id, $row->post->image->image_id)) }}" width="400px">
							@else
							<img src="{{ URL::asset('assets/images/AdHere.png') }}" width="400px">
							@endif
						</div>

						<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
							<h3>{{ $row->title }}</h3>
							{!! $row->post['post_message'] !!}
							<div class="form-group">
								<label class="col-sm-3 control-label">Type:</label>
								<div class="col-sm-9">
									<p>{{ $row->type }}</p>
								</div>

								<label class="col-sm-3 control-label">Country:</label>
								<div class="col-sm-9">
									<p>{{ $business->country}}</p>
								</div>
							</div>

							<div class="btn_adshop">
								<a href="{{ Route('merch_adview' , array( 'id' => $row->user_id , 'advertise_id' => $row->id) ) }}" class="btn btn_view btn-sm">VIEW</a>
								<button type="button" class="btn btn_inquire btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Inquire" data-advertisetype="INQ"  data-title="{{ $row->title }}" data-id="{{ $row->id }}" data-action="{{ Route('merchant.inquire') }}" >INQUIRE</button>
								<button type="button" class="btn btn_order btn-sm" data-toggle="modal" data-target="#shopModal" data-type="Order" data-advertisetype="ORD" data-title="{{ $row->title }}" data-id="{{ $row->id }}" data-action="{{ Route('merchant.inquire') }}">ORDER</button>
							</div>
						</div>
					</div>
				@endforeach
			@endforeach
	</div>

	@stop