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
				<h2>Welcome to Rocky Superdog</h2>
				<small class="help-block">Please complete the final step in joining the most friendly pet community on the net</small>
			</div>
		</div>
		<div class="row">
			<form method="POST" action="{{ route('register.detailsUpdate', Session::get('details.registration_id')) }}" class="form-horizontal col-sm-12  col-lg-12 col-md-12  col-xs-12 reg " role="form" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.name') }}</label>
					<div class="col-sm-4">
						<input type="text" name="first_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.first_name') }}" @if(Session::has('details.first_name')) value="{{ Session::get('details.first_name') }}" @endif disabled>
					</div>
					<div class="col-sm-4">
						<input type="text" name="last_name" class="form-control" placeholder="{{ trans('profile.placeholders.prof_details.last_name') }}" @if(Session::has('details.last_name')) value="{{ Session::get('details.last_name') }}" @endif disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.bday') }}</label>
					<div class='col-sm-8'>
						<input type="date" class="form-control" id="birth_date" name="birth_date" required @if(Session::has('details.birth_date')) value="{{ Session::get('details.birth_date') }}" @endif disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.email') }}</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email_address" placeholder="{{ trans('profile.placeholders.prof_details.email') }}" required @if(Session::has('details.email_address')) value="{{ Session::get('details.email_address') }}" @endif disabled>
					</div>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email_address_confirmation" placeholder="{{ trans('profile.placeholders.prof_details.conf_email') }}" required @if(Session::has('details.email_address')) value="{{ Session::get('details.email_address') }}" @endif disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.gender') }}</label>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="gender" value="M" @if(Session::get('details.gender') == 'M') checked @endif disabled>
							{{ trans('profile.labels.prof_details.gender.male') }}
						</label>
					</div>
					<div class="radio col-sm-2">
						<label>
							<input type="radio" name="gender" value="F" @if(Session::get('details.gender') == 'F') checked @endif disabled>
							{{ trans('profile.labels.prof_details.gender.female') }}
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.addr') }}</label>
						<div class="col-sm-8">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line1" placeholder="Address 1" rows="3"></textarea>
							</div>
						</div>
					</div>
					<br clear="all">
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="col-lg-12">
								<textarea class="form-control" name="address_line2" placeholder="Address 2" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.city') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="city" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.zip') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="zip" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.state') }}</label>
					<div class='col-sm-8'>
						<input type='text' name="state" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.country') }}</label>
					<div class='col-sm-8'>
						{{ country_form() }}
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.area_code') }}</label>
					<div class='col-sm-2'>
						<select name="phone_area_code" class="form-control">
							<option>123</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.phone_number') }}</label>
					<div class='col-sm-2'>
						<select name="phone_country_code" class="form-control">
							<option>63</option>
						</select>
					</div>
					<div class='col-sm-6'>
						<input type='text' name="phone_number" placeholder="{{ trans('profile.placeholders.prof_details.phone_number') }}" class="form-control" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">{{ trans('profile.labels.prof_details.prof_pic') }}</label>
					<div class='col-sm-8'>
						<input type='file' name="userfile" class="custom-file-input" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 col-sm-offset-2 view-image-here"></div>
				</div>
				<div class="form-group">
					<label class="col-sm-12 text-center">{{ trans('profile.labels.prof_details.intro_text') }}</label>
					<div class="col-sm-8 col-sm-offset-2">
						<textarea class="form-control" placeholder="Email , Email etc" rows="5"></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class='col-sm-8 col-sm-offset-2 text-right'>
						<input type='submit' class="btn" value="Continue"/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
@stop