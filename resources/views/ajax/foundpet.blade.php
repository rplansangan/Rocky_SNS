<div class="row">
	<div class="col-sm-12">
		<div class="foundpettag_details col-sm-12 col-md-6 col-lg-6">
			<h4>Pet's Details</h4>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Tag Number:</label>
				<div class="col-sm-8">
					<input type="text" name="rocky_tag_no" class="form-control" value="{{ $pet_info->rocky_tag_no }}" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Name:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info->pet_name }}" class="form-control">
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
					<input type="text" class="form-control" value="{{ $pet_info->pet_type }}" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Breed:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="{{ $pet_info->breed }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Gender:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info->pet_gender }}"class="form-control" required>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Weight in lb:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info->weight }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Height in cm:</label>
				<div class="col-sm-8">
					<input type="text" value="{{ $pet_info->height }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food Style:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info->food_style }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food Brand:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info->pet_food->brand_name }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Food:</label>
				<div class="col-sm-8">
					<input type="text"  class="form-control" value="{{{ $pet_info->food }}}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Feeding Interval:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info->feeding_interval }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Feeding Time:</label>
				<div class="col-sm-8">
					<input type="text"  value="{{ $pet_info->feeding_time }}" class="form-control">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Pet Behaviour:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="{{ $pet_info->pet_behavior->behavior }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Owner:</label>
				<div class="col-sm-8"><a href="{{{ route('profile.showProfile', [$pet_info->user->user_id]) }}}">{{{ $pet_info->user->registration->first_name }}} {{{ $pet_info->user->registration->last_name }}}</a>
					<input type="text"  class="form-control" value="{{{ $pet_info->user->registration->first_name }}} {{{ $pet_info->user->registration->last_name }}}">
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
					<input type="text" name="finder_name" class="form-control" value="{{ @$user_info->first_name.' '.@$user_info->last_name }}">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Address:</label>
				<div class="col-sm-8">
					<textarea name="finder_address1" class="form-control" placeholder="Address Line 1"></textarea>
					<textarea name="finder_address2" class="form-control" placeholder="Address Line 2"></textarea>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">City:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="found_in_city" placeholder="City">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">State:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="found_in_state" placeholder="State">
					<input type="text" class="form-control" name="found_in_zip" placeholder="Zip Code">
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Country:</label>
				<div class="col-sm-8">
					{!! country_form() !!}
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 control-label">Contact Number:</label>
				<div class="col-sm-8">
					<input type="text" name="finder_country_code" class="form-control" value="{{ $user_info->phone_country_code }}">
					<input type="text" name="finder_area_code" class="form-control" value="{{ $user_info->phone_area_code }}">
					<input type="text" name="finder_tel_no" class="form-control" value="{{ @$user_info->phone_number }}">
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