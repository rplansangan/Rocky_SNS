@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle usertype-content">
				<div class="col-sm-12 user-type">
					<div class="page-header">
						<h2>User Type</h2>
					</div>
					<div class="col-sm-12 usertype_btn">
						<a href="javascript:void(0);" class="col-sm-5 btn btn_indiv btn_usertype" data-toggle="tooltip" data-original-title="Information about this individual button">Individual</a>
						<a href="javascript:void(0);" class="col-sm-5 col-sm-offset-1 btn btn_merch btn_usertype" data-toggle="tooltip" data-original-title="Information about this merchant button">
							Merchant
						</a>
					</div>
				</div>

				<!-- INDIVIDUAL FORM -->
				<form method="POST" action="{{ route('test2') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 useraddform reg " role="form" enctype="multipart/form-data">
					<div class="page-header">
						<h2>Add Advertisement</h2>
					</div>

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-3 control-label">Type:</label>
						<div class="col-sm-8">
							<select name="advertise_type" class="form-control">
								<option value="pets_for_sale" >Pets for sale</option>
								<option value="services" >Services</option>
								<option value="items" >Items</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Title:</label>
						<div class="col-sm-8">
							<input type="text" name="title" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Banner:</label>
						<div class='col-sm-8'>
							<input type='file' name="userfile" class="custom-file-input" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-3 view-image-here"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Description:</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="company_background" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-3 text-right'>
							<input type='submit' class="btn" value="Add"/>
						</div>
					</div>
				</form>

				<!-- MERCHANT FORM -->
				
				<form method="POST" action="{{ route('register_activate_merchant') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 merchform reg " role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="page-header">
						<h2>Merchant Activation</h2>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Business Name:</label>
						<div class="col-sm-8">
							<input type="text" name="business_name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">E-mail Address:</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" name="email_address">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Contact Person:</label>
						<div class="col-sm-8">
							<input type="text" name="contact_person" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Address:</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="address_line1" placeholder="Address 1" rows="3"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-3">
							<textarea class="form-control" name="address_line2" placeholder="Address 2" rows="3"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">City</label>
						<div class='col-sm-8'>
							<input type='text' name="city" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Zip Code</label>
						<div class='col-sm-8'>
							<input type='text' name="zip" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">State/Province</label>
						<div class='col-sm-8'>
							<input type='text' name="state" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Country</label>
						<div class='col-sm-8'>
							{{ country_form() }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Area Code</label>
						<div class='col-sm-2'>
							<input type="text" name="phone_area_code" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Phone</label>
						<div class='col-sm-2'>
							<select name="phone_country_code" class="form-control">
								<option>63</option>
							</select>
						</div>
						<div class='col-sm-6'>
							<input type='text' name="phone_number" placeholder="Phone Number" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Logo:</label>
						<div class='col-sm-8'>
							<input type='file' name="myfile" class="custom-file-input" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-3 view-image-here"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Company Background:</label>
						<div class="col-sm-8">
							<textarea class="form-control" name="company_background" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-3 text-right'>
							<input type='submit' class="btn" value="Register"/>
						</div>
					</div>
				</form>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
	
	

@stop