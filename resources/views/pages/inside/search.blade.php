@if(empty($info))

@else
	@foreach($info as $row)
		<div class="row">
			<div class="col-lg-2">
				<img src="{{ URL::asset('assets/images/new/boby.png') }}" class="img-responsive">
			</div>
			<div class="col-lg-10">
				<label>Name : </label> {{ $row->first_name.' '.$row->last_name }}<br>
				<label>Email : </label> {{ $row->email_address }}<br>
				<a href="{{{ route('profile.showProfile', $row->registration_id) }}}" class="btn btn-primary">Visit</a>
			</div>
		</div>
	@endforeach
@endif
