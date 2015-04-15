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
		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="#" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire" >INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel panel-default ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel panel-default ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel panel-default ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel panel-default ads-panel" >
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 panel panel-default ads-panel">
			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-info">
				<h3>Advertisement Title</h3>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>

					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="" class="btn btn_view">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
					<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@stop