@extends('master')
@section('content')
<div class="adshop-content col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h1>ADS</h1></legend>

	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-search">
		<form action="" method="POST" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-sm-2 control-label">TYPE:</label>
				<div class="col-sm-3">
					<select name="type" class="form-control">
						<option value='ad' data-title="Andorra">Pets For Sale</option>
						<option value='ae' data-title="United Arab Emirates">Services</option>
						<option value='af' data-title="Afghanistan">Items</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">COUNTRY:</label>
				<div class='col-sm-3'>
					{{ country_form()}}
				</div>

				<div class='col-sm-2'>
					<input type='text' name="state_ads" placeholder="STATE" class="form-control" />
				</div>

				<div class='col-sm-2'>
					<input type='text' name="zip_ads" placeholder="ZIP" class="form-control" />
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" value="SEARCH"/>
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" value="ALL"/>
				</div>
			</div>
		</form>
	</div>

	<div class="container">
		@foreach($info as $result)
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				@if(isset($result->image[0]))
					<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($result->user_id, $result->image[0]->image_id)) }}" width="500px">
				@else
					<img src="{{ URL::asset('assets/images/AdHere.png') }}">
				@endif
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>{{ $result->title }}</h3>
				{!! $result->post['post_message'] !!}
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>{{ $result->type }}</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="{{ Route('merchant.profile' , Auth::id() ) }}" class="btn btn_view btn-small">VIEW</a>
					<button type="button" class="btn btn_inquire btn-small" data-toggle="modal" data-target="#shopModal" data-type="Inquire" data-advertisetype="INQ"  data-title="{{ $result->title }}" data-id="{{ $result->id }}" data-action="{{ Route('merchant.inquire') }}" >INQUIRE</button>
					<button type="button" class="btn btn_order btn-small" data-toggle="modal" data-target="#shopModal" data-type="Order" data-advertisetype="ORD" data-title="{{ $result->title }}" data-id="{{ $result->id }}" data-action="{{ Route('merchant.inquire') }}">ORDER</a>
					</div>
				</div>

			</div>
			@endforeach
		</div>
	</div>

	@stop