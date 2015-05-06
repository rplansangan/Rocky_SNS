@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="container">
			<div class="col-sm-7 col-md-7 col-xs-7 col-lg-7">
				<div class="page-header">
					<h2>{{$image->image_title}}</h2>
				</div>
				<video width="100%" height="400px" controls>
					<source src="{{ route('files.get.image', array($image->user_id, $image->image_id)) }}" type="{{ $image->image_mime }}">
				</video>
				<div class="col-sm-12">
					<p>Uploaded by : {{ $user->first_name.' '.$user->last_name}}</p>
				</div>
			</div>
			<div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
				<div class="page-header">
					<legend>Other Videos</legend>
				</div>
				<nav class="video-list">
					<ul>
						@foreach($video as $row)
							<li>
								<div class="row">
									<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
									<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
										<img class="col-sm-12 thumbnail img-responsive" src="{{ route('files.get.thumb', array($row->user_id, $row->image_id)) }}" style="margin-top:20px;">
									</div>
									<div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
										<a href="{{ route('video.get', array($row->user_id, $row->image_id)) }}"><h4>{{ $row->image_title }}</h4></a>
										<span class="text-muted video-date">
											<em><small>{{ date('M d Y @ H:i:s A' , strtotime($row->created_at) ) }}</small></em>
										</span>
										<span class="text-muted video-date">
											<em><small>By {{ $row->register->first_name.' '.$row->register->last_name}}</small></em>
										</span>
										<p>{!! $row->post['post_message'] !!}</p>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</nav>
			</div>
		</div>
	</div>
@stop