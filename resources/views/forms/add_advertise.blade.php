<form method="POST" action="{{ $action }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 useraddform reg " role="form" enctype="multipart/form-data">
	<div class="page-header">
		<h2>Add Advertisement</h2>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="form-group">
		<label class="col-sm-2 control-label">Type:</label>
		<div class="col-sm-8">
			<select name="type" class="form-control">
				<option value="Pets for Sale" >Pets for sale</option>
				<option value="Services" >Services</option>
				<option value="Items" >Items</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Title:</label>
		<div class="col-sm-8">
			<input type="text" name="title" class="form-control" maxlength="25">
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Banner:</label>
		<div class='col-sm-8'>
			<input type='file' name="userfile" class="custom-file-input" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-3 col-sm-offset-2 view-image-here"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-12">
			<textarea class="form-control company_background" name="message" rows="15"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class='col-sm-11 col-sm-offset-1 text-right'>
			<input type='submit' class="btn" value="Add"/>
		</div>
	</div>
</form>