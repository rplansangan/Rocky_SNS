<div class="row">
	<form method="POST" action="{{ route('register_activate_merchant') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
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
				<div class='col-sm-8 col-sm-offset-2 text-right'>
					<input type='submit' class="btn" value="Continue"/>
				</div>
			</div>
	</form>
</div>