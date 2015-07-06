<div class="row">
	<form method="POST" action="{{ route($route) }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="page-header">
				<h2>Pet Foundation Registration</h2>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Pet Foundation Name:</label>
				<div class="col-sm-8">
					<input type="text" name="petfoundation_name" class="form-control" @if(isset($details->petfoundation_name)) value="{{{ $details->petfoundation_name }}}" @endif>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">E-mail Address:</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" name="email_address" @if(isset($details->email_address)) value="{{{ $details->email_address }}}" @endif>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Contact Person:</label>
				<div class="col-sm-8">
					<input type="text" name="contact_person" class="form-control" @if(isset($details->contact_person)) value="{{{ $details->contact_person }}}" @endif>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Address:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="address_line1" placeholder="Address 1" rows="3">@if(isset($details->address_line1)) {{{ $details->address_line1 }}} @endif</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-3">
					<textarea class="form-control" name="address_line2" placeholder="Address 2" rows="3">@if(isset($details->address_line2)) {{{ $details->address_line2 }}} @endif</textarea>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">City</label>
				<div class='col-sm-8'>
					<input type='text' name="city" class="form-control" @if(isset($details->city)) value="{{{ $details->city }}}" @endif/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Zip Code</label>
				<div class='col-sm-8'>
					<input type='text' name="zip" class="form-control" @if(isset($details->zip)) value="{{{ $details->zip }}}" @endif/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">State/Province</label>
				<div class='col-sm-8'>
					<input type='text' name="state" class="form-control" @if(isset($details->state)) value="{{{ $details->state }}}" @endif/>
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
					<input type="text" name="phone_area_code" class="form-control" @if(isset($details->phone_area_code)) value="{{{ $details->phone_area_code }}}" @endif>
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
					<input type='text' name="phone_number" placeholder="Phone Number" class="form-control" @if(isset($details->phone_number)) value="{{{ $details->phone_number }}}" @endif/>
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
				<label class="col-sm-3 control-label">Foundation Background:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="petfoundation_background" rows="5">@if(isset($details->petfoundation_background)) {{{ $details->petfoundation_background }}} @endif</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Mission Statement:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="mission_statement" rows="5">@if(isset($details->mission_statement)) {{{ $details->mission_statement }}} @endif</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Vision Statement:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="vision_statement" rows="5">@if(isset($details->vision_statement)) {{{ $details->vision_statement }}} @endif</textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Goal Statement:</label>
				<div class="col-sm-8">
					<textarea class="form-control" name="goal_statement" rows="5">@if(isset($details->goal_statement)) {{{ $details->goal_statement }}} @endif</textarea>
				</div>
			</div>
			<div class="form-group">
				<div class='col-sm-8 col-sm-offset-3 text-right'>
					<input type='submit' class="btn" value="Continue"/>
				</div>
			</div>
	</form>
</div>