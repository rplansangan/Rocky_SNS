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
						@if($list != null)
							@foreach($list as $single)
								<div class="col-sm-4 text-center" style="margin-top:10px">
									<a href="{{ route('profile.showProfile', $single->user_id) }}"><img width="100%"src="{{ route('files.get.image', [$single->user_id, $single->prof_pic->image_id]) }}"></a>
									<a href="{{ route('profile.showProfile', $single->user_id) }}">{{ $single->petfoundation_name }}</a>
								</div>
							@endforeach
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