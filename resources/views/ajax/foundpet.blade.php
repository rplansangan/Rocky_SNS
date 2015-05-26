<div class="row">
	<div class="col-sm-12">
		<div class="foundpettag_details col-sm-12 col-md-6 col-lg-6">
			<h4>Pet's Details</h4>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Tag Number:</label>
				<div class="col-sm-8">
					<input type="text" name="rocky_tag_no" class="form-control" value="{{ $pet_info[0]->rocky_tag_no }}" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Name:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info[0]->pet_name }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">How to call this pet:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Type:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="{{ $pet_info[0]->pet_type }}" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Breed:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="{{ $pet_info[0]->breed }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Gender:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info[0]->pet_gender }}"class="form-control" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Weight in lb:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info[0]->weight }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Height in cm:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info[0]->height }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food Style:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info[0]->food_style }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food Brand:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info[0]->brand }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food:</label>
				<div class="col-sm-8">
					<input type="text"  class="form-control" >
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Feeding Interval:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info[0]->feeding_interval }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Feeding Time:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info[0]->feeding_time }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Behaviour:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="{{ $pet_info[0]->behavior }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Owner:</label>
				<div class="col-sm-8">
					<input type="text"  class="form-control" value="{{ $pet_info[0]->user_id }}">
				</div>
			</div>
		</div>
		<div class="findertag_details col-sm-12 col-md-6 col-lg-6">
			<h4>Finder's Details</h4>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Found at:</label>
				<div class="col-sm-8">
					<input type="text" name="found_in_remark" class="form-control" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Name:</label>
				<div class="col-sm-8"> 
					<input type="text" name="finder_name" class="form-control" value="{{ @$user_info[0]->first_name.' '.@$user_info[0]->last_name }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Address:</label>
				<div class="col-sm-8">
					<textarea name="finder_address1" class="form-control">{{ @$user_info[0]->address_line1 }}</textarea>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Contact Number:</label>
				<div class="col-sm-8">
					<input type="text" name="finder_tel_no" class="form-control" value="{{ @$user_info[0]->phone_number }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-6 control-label">Upload Photos of the found pet:</label>
				<div class="col-sm-6">
					<input type="file" name="myfile[]" id="filephotouploader"  multiple>
				</div>
			</div>
		</div>
	</div>
</div>