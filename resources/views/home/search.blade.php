<div class="page-header">
	<h2>Search</h2>
</div>
<div class="col-sm-12">
	@if(@$search)
	<form class="form-horizontal" action="{{ Route('search') }}" method="get">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label class="col-sm-3 control-label">Search Name:</label>
			<div class="col-sm-8">
				<input type="text" name="name" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">Email</label>
			<div class="col-sm-8">
				<input type="email" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Country</label>
			<div class='col-sm-8'>
				{{ country_form() }}
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">State/City</label>
			<div class="col-sm-8">
				<input type="text" name="city" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">Zip Code</label>
			<div class="col-sm-8">
				<input type="text" name="zip" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class='col-sm-8 col-sm-offset-3 text-right'>
				<input type='submit' class="btn" name="search" value="Search"/>
			</div>
		</div>
	</form>
	@else
	<form class="form-horizontal" action="{{ Route('search') }}" method="get">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
			<label class="col-sm-3 control-label">Search Name:</label>
			<div class="col-sm-8">
				<input type="text" name="name" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">Email</label>
			<div class="col-sm-8">
				<input type="email" name="email" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label">Country</label>
			<div class='col-sm-8'>
				{{ country_form() }}
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">State/City</label>
			<div class="col-sm-8">
				<input type="text" name="city" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label  class="col-sm-3 control-label">Zip Code</label>
			<div class="col-sm-8">
				<input type="text" name="zip" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<div class='col-sm-8 col-sm-offset-3 text-right'>
				<input type='submit' class="btn" name="search" value="Search"/>
			</div>
		</div>
		<div class="page-header">
			<h4>Results...</h4>
		</div>
		@foreach($info as $row)
			<div class="col-lg-4">
				<a href="{{{ route('profile.showProfile', $row->user_id) }}}" class="thumbnail text-center">
					<img class="img-responsive" src="{{ route('files.get.image', array($row->user_id, $row->prof_pic['user_id'])) }}">
					{{$row->first_name.' '.$row->last_name}}
				</a>
			</div>
			@endforeach
		@endif
		<hr>
	</div>