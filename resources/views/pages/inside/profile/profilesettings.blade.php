<div class="container-fluid post-area">
	<div class="row">
			<div class="page-header text-center">
				<h2>Profile Information</h2>
			</div>
		</div>
		<div class="row">
			<form method="POST" action="{{ Route('profile.doUpdate') }}" class="form-horizontal" role="form" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.prof_pic') }}</label>
					<div class='col-sm-8'>
						<input type='file' name="userfile" class="custom-file-input" />
					</div>
				</div>
				<div class="form-group  view-image-here">
					<div class="col-sm-3 col-sm-offset-3">
						<img src="<?php echo mediaSrcAlt($user_data['profile_picture_path'], $user_data['profile_picture_ext']); ?>" class="img-responsive img-thumbnail">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.name') }}</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.first_name') }}" value="<?php echo $profile->first_name; ?>">
					</div>
					<div class="col-sm-4">
						<input type="text" name="last_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.last_name') }}" value="<?php echo $profile->last_name?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.bday') }}</label>
					<div class='col-sm-8'>
						<input type="date" class="form-control" id="birth_date" name="birth_date" required value="<?php echo $profile->birth_date?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.gender') }}</label>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="gender" value="M"  disabled @if($profile->gender == 'M') checked @endif >
							{{ trans('profile.labels.prof_details.gender.male') }}
						</label>
					</div>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="gender" value="F" disabled @if($profile->gender == 'F') checked @endif >
							{{ trans('profile.labels.prof_details.gender.female') }}
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.addr') }}</label>
						<div class="col-sm-8 nopad">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line1" placeholder="{{ trans('profile.placeholders.prof_details.addr_l1') }}" rows="3"><?php echo $profile->address_line1; ?></textarea>
							</div>
						</div>
					</div>
					<br clear="all">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-3 nopad">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line2" placeholder="{{ trans('profile.placeholders.prof_details.addr_l2') }}" rows="3"><?php echo $profile->address_line2; ?></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.city') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="city" class="form-control" value="<?php echo $profile->city ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.zip') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="zip" class="form-control" value="<?php echo $profile->zip ?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.state') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="state" class="form-control" value="<?php echo $profile->state ?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.country') }}</label>
					<div class='col-sm-8'>
						{{ country_form() }}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.area_code') }}</label>
					<div class='col-sm-2'>
						<select name="phone_area_code" class="form-control">
							<option>123</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.phone_number') }}</label>
					<div class='col-sm-2'>
						<select name="phone_country_code" class="form-control">
							<option>63</option>
						</select>
					</div>
					<div class='col-sm-6'>
						<input type='text' name="phone_number" placeholder="Phone Number" value="<?php echo $profile->phone_number ?>" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<div class='col-sm-8 col-sm-offset-3 text-right'>
						<input type='submit' class="btn btn-color" value="{{ trans('profile.buttons.prof_details.update') }}"/>
					</div>
				</div>
			</form>
		</div>
</div>
