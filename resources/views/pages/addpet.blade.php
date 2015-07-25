@extends('master')
@section('content')
<div class="container">
	<div class="register-page">
		<div class="register-main">
			<h2 style="margin-top: 0;" class="text-center"><small>Please add your pet before continuing to the next page</small></h2>
			<div style="margin-top:30px;">
				<form method="POST" action="{{ route('register.petRegister') }}" class="form-horizontal reg " id="updateform" role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-3 control-label">Profile Picture</label>
						<div class='col-sm-9'>
							<input type='file' name="petfile" class="custom-file-input" required />
						</div>
					</div>
					<div class="form-group hidden view-image-here">
						<div class="col-sm-3 col-sm-offset-2"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Pet Name:</label>
						<div class="col-sm-8">
							<input type="text" name="pet_name" class="form-control" placeholder="Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">How to call this pet:</label>
						<div class="col-sm-8">
							<input type="text" name="pet_call_attn" class="form-control" placeholder="Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Rocky Tag Number:</label>
						<div class="col-sm-8">
							<input type="text" name="rocky_tag_no" class="form-control" placeholder="Rocky Tag Number">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Animal Type:</label>
						<div class='col-sm-8'>
							<select id="sel-ani-type" name="pet_type" class="form-control" required>
								<option></option>
								<option value="1">Dog</option>
								<option value="2">Cat</option>
								<option value="3">Pig</option>
								<option value="4">Hamster</option>
								<option value="5">Rabbit</option>
								<option value="6">Guinea Pig</option>
								<option value="7">Hedgehog</option>
								<option value="8">Bird</option>
								<option value="9">Fish</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Breed:</label>
						<div class="col-sm-8">
							<input type="text" name="breed" class="form-control" placeholder="Breed" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Estimated Birthdate:</label>
						<div class='col-sm-8'>
							<input type="date" class="form-control" id="pet_bday" name="pet_bday" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Gender:</label>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="pet_gender" value="M" checked>
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
						<label class="col-sm-3 control-label">Weight in lb:</label>
						<div class="col-sm-2">
							<input type="text" name="weight" class="form-control" placeholder="Weight" required>
						</div>
						<label class="col-sm-3 control-label">Height in cm:</label>
						<div class="col-sm-2">
							<input type="text" name="height" class="form-control" placeholder="Height" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Food:</label>
						<div class="col-sm-8">
							<input type="text" name="food" class="form-control" placeholder="eg: Dog Food">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Food Brand:</label>
						<div class="col-sm-8">
							<input id="fld-food-brand" type="text" name="brand" class="form-control" placeholder="Food Brand" disabled>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Food Style:</label>
						<div class='col-sm-8'>
							<select name="food_style" class="form-control">
								<option></option>
								<option>Wet</option>
								<option>Dry</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Feeding Interval:</label>
						<div class="col-sm-8">
							<input type="text" name="feeding_interval" class="form-control" placeholder="eg: twice a day">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Feeding Time:</label>
						<div class="col-sm-8">
							<input type="text" name="feeding_time" class="form-control" placeholder="eg: 8am and 5pm">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Behavior</label>
						<div class="col-sm-8">
							<input id="fld-pet-behavior" type="text" name="behavior" class="form-control" disabled>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Likes:</label>
						<div class="col-sm-8">
							<input type="text" name="pet_likes" class="form-control" placeholder="Likes">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Dislikes:</label>
						<div class="col-sm-8">
							<input type="text" name="pet_dislikes" class="form-control" placeholder="Dislikes">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Identifying Marks:</label>
						<div class='col-sm-8 add-pet-file-div'>
							<input type='file' name="identifying_marks[]" class="ident_marks col-sm-6" />
							<input type="text" name="identifying_marks_desc[]" class="col-sm-6" placeholder="Identifying Mark Description" />
						</div>
					</div>
					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-3 Tracker123 text-right'>
							<input type='submit' class="btn btn-color" value="Add Pet"/>
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
</div>
@stop