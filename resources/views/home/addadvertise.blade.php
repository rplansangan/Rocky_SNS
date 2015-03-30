<div class="page-header">
	<h2>Add Advertise</h2>
</div>
<form method="POST" action="{{ route('test2') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
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
			<input type='submit' class="btn" value="Register"/>
		</div>
	</div>
</form>