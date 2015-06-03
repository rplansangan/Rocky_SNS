@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
				<div class="col-xs-12 petfoundation-mid">
					<div class="row">
						<div class="page-header">
							<h2>Page Foundation List</h2>
						</div>
						<div class="col-sm-12">
							<form method="get" action="{{ route('foundation.search') }}">
								<label class="control-label">Name: </label><input type="search" class="form-control" name="name">
								<label class="control-label">City: </label><input type="search" class="form-control" name="city">
								<label class="control-label">State: </label><input type="search" class="form-control" name="state">
								<label class="control-label">Country: </label>{!! country_form() !!}
							
								<input type="submit" value="Search">
							</form>
						</div>
						@if($list != null)
							@foreach($list as $single)
								<div class="col-sm-4 text-center" style="margin-top:10px">
									@if(!is_null($single->prof_pic))
										<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('foundation.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									@else
										pet foundation logo placeholder here.
									@endif
									<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
								</div>
							@endforeach
							@if(method_exists($list, 'appends'))
								{!! $list->appends(['name' => Request::get('name'), 'city' => Request::get('city'), 'state' => Request::get('state'), 'country' => Request::get('country')])->render() !!}
							@endif
						@else
						
						@endif
					</div>
					<!--<div class="row text-center">
						<a href="#">Load More...</a>
					</div>-->
				</div>
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop