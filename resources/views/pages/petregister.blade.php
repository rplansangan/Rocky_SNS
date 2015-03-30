@extends('master')
@section('site_title')
Rocky Registration
@stop

@section('content')
<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 register-page">
<div class="container-fluid">
	<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 land-main-cont register-main">
		<div class="row">
			<div class="page-header">
				<h2>Add Your Pet(s)</h2>
				<small class="help-block">Please complete the form to add your pet</small>
			</div>
		</div>
		<div class="row">
			<form method="POST" action="{{ route('register.addpet') }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-2 control-label">Profile Picture</label>
					<div class='col-sm-8'>
						<input type='file' name="petfile" class="custom-file-input" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 col-sm-offset-2 view-image-here"></div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Name:</label>
					<div class="col-sm-8">
						<input type="text" name="pet_name" class="form-control" placeholder="Name">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Type:</label>
					<div class="col-sm-8">
						<input type="text" name="pet_type" class="form-control" placeholder="Type">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Breed:</label>
					<div class="col-sm-8">
						<input type="text" name="breed" class="form-control" placeholder="Breed">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Birthdate:</label>
					<div class='col-sm-8'>
						<input type="date" class="form-control" id="pet_bday" name="pet_bday">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Gender:</label>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="pet_gender" value="M">
							Male
						</label>
					</div>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="pet_gender" value="F">
							Female
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Food:</label>
					<div class="col-sm-8">
						<input type="text" name="breed" class="form-control" placeholder="Food">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Likes:</label>
					<div class="col-sm-8">
						<input type="text" name="breed" class="form-control" placeholder="Likes">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Dislikes:</label>
					<div class="col-sm-8">
						<input type="text" name="breed" class="form-control" placeholder="Dislikes">
					</div>
				</div>
				<div class="form-group">
					<div class='col-sm-8 col-sm-offset-2 Tracker123text-right'>
						<input type='submit' class="btn" value="Done"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@stop