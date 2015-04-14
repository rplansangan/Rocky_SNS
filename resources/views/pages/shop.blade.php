@extends('master')
@section('content')
<div class="adshop-content col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h1>ADS</h1></legend>

	<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-search">
		<form action="" method="POST" class="form-horizontal">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="form-group">
				<label class="col-sm-2 control-label">TYPE:</label>
				<div class="col-sm-3">
					<select name="type" class="form-control">
						<option value='ad' data-title="Andorra">Pets For Sale</option>
						<option value='ae' data-title="United Arab Emirates">Services</option>
						<option value='af' data-title="Afghanistan">Items</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">COUNTRY:</label>
				<div class='col-sm-3'>
					{{ country_form()}}
				</div>

				<div class='col-sm-2'>
					<input type='text' name="state_ads" placeholder="STATE" class="form-control" />
				</div>

				<div class='col-sm-2'>
					<input type='text' name="zip_ads" placeholder="ZIP" class="form-control" />
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" value="SEARCH"/>
				</div>

				<div class='col-sm-1'>
					<input type='submit' class="btn" value="ALL"/>
				</div>
			</div>
		</form>
	</div>

	<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-container">
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad33.png') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-xs-12 col-lg-6 col-md-6 adshop-container">
		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad11.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>

				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad22.jpg') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>
				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 adshop-content">
			<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 adshop-img">
				<img src="{{ URL::asset('assets/images/ad33.png') }}" width="300px">
			</div>

			<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 adshop-info">
				<h2>Title</h2>
				<p>Lorem ipsum dolor sit amet, consectetur...</p>
				<div class="form-group">
					<label class="col-sm-3 control-label">Type:</label>
					<div class="col-sm-9">
						<p>Services</p>
					</div>
					
					<label class="col-sm-3 control-label">Country:</label>
					<div class="col-sm-9">
						<p>Philippines</p>
					</div>
				</div>
				<div class="btn_adshop">
					<a href="">VIEW</a>
					<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-subj="Inquire Adname">INQUIRE</button>
					<a href="">ORDER</a>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="shopModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="shopModalLabel">Inquire</h4>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="subject-inquire" class="control-label">Subject:</label>
							<input type="text" class="form-control" id="subject-inquire">
						</div>
						<div class="form-group">
							<label for="message-inquire" class="control-label">Message:</label>
							<textarea class="form-control" id="message-inquire"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-cancel" data-dismiss="modal">Cancel</button>
					<button type="button" class="btn btn-submit">Send message</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop