@extends('master')
@section('content')
<div class="container-fluid bg-rocky">
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
			@include('home.left')
		</div>
		<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
			<div id="useraddform" class="col-sm-12">
				<div class="page-header">
					<h2>Add Advertisement</h2>
				</div>
				<form method="POST" action="{{ route('test2') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-1 control-label">Type:</label>
						<div class="col-sm-11">
							<select name="advertise_type" class="form-control">
								<option value="pets_for_sale" >Pets for sale</option>
								<option value="services" >Services</option>
								<option value="items" >Items</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-1 control-label">Title:</label>
						<div class="col-sm-11">
							<input type="text" name="title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<textarea class="form-control company_background" name="company_background" rows="15"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-4 text-right'>
							<input type='submit' class="btn" value="Add"/>
						</div>
					</div>
				</form>
			</div>
			
		</div>
		<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
			@include('home.right')
		</div>
	</div>
</div>



@stop