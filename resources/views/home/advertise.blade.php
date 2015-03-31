<div class="page-header">
	<h2>Merchant Activation</h2>
</div>
<form method="POST" action="{{ route('activate_merchant') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label class="col-sm-3 control-label">Business Name:</label>
		<div class="col-sm-8">
			<input type="text" name="business_name" class="form-control">
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
		<label class="col-sm-3 control-label">Logo:</label>
		<div class='col-sm-8'>
			<input type='file' name="userfile" class="custom-file-input" />
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