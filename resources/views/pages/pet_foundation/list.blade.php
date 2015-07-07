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
						<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 pfoundation-search" style="border-bottom: 1px solid #EEE">
							<form method="get" action="{{ route('foundation.search') }}">
								<div class="form-group col-sm-12 col-xs-12 col-lg-12 col-md-12">
									<div class='col-sm-4'>
										<input type='search' name="name" placeholder="NAME" class="form-control" />
									</div>

									<div class='col-sm-3'>
										<input type='search' name="city" placeholder="CITY" class="form-control" />
									</div>

									<div class='col-sm-3'>
										<input type='search' name="state" placeholder="STATE" class="form-control" />
									</div>
								</div>
								<div class="form-group col-sm-12 col-xs-12 col-lg-12 col-md-12">
									<label class="col-sm-2 control-label">COUNTRY:</label>
									<div class='col-sm-3'>
										{{ country_form() }}
									</div>

									<div class='col-sm-3'>
										<input type='submit' class="btn" name="search" value="SEARCH"/>
									</div>
								</div>
							</form>
						</div>
						<!--@if($list != null)
							@foreach($list as $single)-->
								<div class="col-sm-4 text-center" style="margin:10px 0">
									<!--@if(!is_null($single->prof_pic))
										<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('foundation.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									@else-->
										<img src="{{ URL::asset('assets/images/foundation1.jpg') }}" width="180px">
									<!--@endif-->
									<div class="pf-name">
										<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
									</div>
								</div>

								<div class="col-sm-4 text-center" style="margin:10px 0">
									<!--@if(!is_null($single->prof_pic))
										<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('foundation.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									@else-->
										<img src="{{ URL::asset('assets/images/foundation2.jpg') }}" width="180px">
									<!--@endif-->
									<div class="pf-name">
										<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
									</div>
								</div>

								<div class="col-sm-4 text-center" style="margin:10px 0">
									<!--@if(!is_null($single->prof_pic))
										<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('foundation.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									@else-->
										<img src="{{ URL::asset('assets/images/foundation3.jpg') }}" width="180px">
									<!--@endif-->
									<div class="pf-name">
										<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
									</div>
								</div>

								<div class="col-sm-4 text-center" style="margin:10px 0">
									<!--@if(!is_null($single->prof_pic))
										<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('foundation.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									@else-->
										<img src="{{ URL::asset('assets/images/foundation4.jpg') }}" width="180px">
									<!--@endif-->
									<div class="pf-name">
										<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
									</div>
								</div>
							<!--@endforeach
							@if(method_exists($list, 'appends'))
								{!! $list->appends(['name' => Request::get('name'), 'city' => Request::get('city'), 'state' => Request::get('state'), 'country' => Request::get('country')])->render() !!}
							@endif
						@else
						
						@endif-->
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