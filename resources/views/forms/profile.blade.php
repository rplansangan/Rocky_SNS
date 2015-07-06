<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
	<div class="container-fluid">
		<div class=" land-main-cont">
			<div class="row">
				<div class="page-header">
					<h2>{{ $form_title }}</h2>
				</div>
			</div>
			<div class="row">
				<form method="POST" action="{{ $form_route }}" class="form-horizontal" role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.prof_pic') }}</label>
						<div class='col-sm-8'>
							<input type='file' name="userfile" class="custom-file-input" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3 col-sm-offset-3 view-image-here"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.name') }}</label>
						<div class="col-sm-4">
							<input type="text" name="first_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.first_name') }}" @if($form_details->first_name) value="{{{ $form_details->first_name }}}" @endif >
						</div>
						<div class="col-sm-4">
							<input type="text" name="last_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.last_name') }}" @if($form_details->last_name) value="{{{ $form_details->last_name }}}" @endif >
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.bday') }}</label>
						<div class='col-sm-8'>
							<input type="date" class="form-control" id="birth_date" name="birth_date" required @if($form_details->birth_date) value="{{{ $form_details->birth_date }}}" @endif >
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-3 control-label">E-mail Address:</label>
						<div class="col-sm-4">
							<input type="email" class="form-control" name="email_address" placeholder="Email Address" required @if($form_details->email_address) value="{{{ $form_details->email_address }}}" @endif >
						</div>
						<div class="col-sm-4">
							<input type="email" class="form-control" name="email_address_confirmation" placeholder="Confirm Email Address" required @if($form_details->email_address) value="{{{ $form_details->email_address }}}" @endif >
						</div>
					</div>-->
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.gender') }}</label>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="M" @if($form_details->gender == 'M') checked @endif disabled>
								{{ trans('profile.labels.prof_details.gender.male') }}
							</label>
						</div>
						<div class="radio col-sm-2">
							<label>
								<input type="radio" name="gender" value="F" @if($form_details->gender == 'F') checked @endif disabled>
								{{ trans('profile.labels.prof_details.gender.female') }}
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.addr') }}</label>
							<div class="col-sm-8">
								<div class="col-lg-12">
									<textarea class="form-control" name="address_line1" placeholder="{{ trans('profile.placeholders.prof_details.addr_l1') }}" rows="3">{{{ $form_details->address_line1 }}}</textarea>
								</div>
							</div>
						</div>
						<br clear="all">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-3">
								<div class="col-lg-12">
									<textarea class="form-control" name="address_line2" placeholder="{{ trans('profile.placeholders.prof_details.addr_l2') }}" rows="3">{{{ $form_details->address_line2 }}}</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.city') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="city" class="form-control" value="{{{ $form_details->city }}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.zip') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="zip" class="form-control" value="{{{ $form_details->zip }}}"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">{{ trans('profile.labels.prof_details.state') }}</label>
						<div class='col-sm-8'>
							<input type='text' name="state" class="form-control" value="{{{ $form_details->state }}}"/>
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
							<input type='text' name="phone_number" placeholder="Phone Number" class="form-control" value="{{{ $form_details->phone_number }}}"/>
						</div>
					</div>
					

					<div class="form-group">
						<div class='col-sm-8 col-sm-offset-3 text-right'>
							<input type='submit' class="btn" value="{{ trans('profile.buttons.prof_details.update') }}"/>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>