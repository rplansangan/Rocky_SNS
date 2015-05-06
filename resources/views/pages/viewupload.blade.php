@extends('master')
@section('content')
	<div class="container-fluid bg-rocky">
		<div class="container">
			<div class="col-sm-7 col-md-7 col-xs-7 col-lg-7" style="background-color:white">
				<div class="page-header">
					<h2>Upload Videos</h2>
				</div>
				<form method="POST" action="{{ route('video.upload') }}" class="form-horizontal" id="video-post" role="form" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="file" name="file" id="fileuploaderVideo" class="form-control hidden" accept="video/*">
					<ul class="comment-post">
						<li>
							<div class="form-group">
								<input type="text" name="image_title" id="video-title" class="form-control" placeholder="Title">
							</div>
						</li>
						<li>
							<div class="form-group">
								<textarea class="form-control primary-textarea" max="500" name="message" placeholder=" Say Something..."></textarea>
							</div>
						</li>
						<li>
							<div class="form-group text-right">
								<div class="row">
									<div class="col-sm-4 col-lg-4 col-xs-4 col-md-4">
										<select  name="category" class="form-control">
											<option>Funny</option>
											<option>Exhibition</option>
											<option>Play</option>
										</select>
									</div>
									<div class="col-sm-8 col-lg-8 col-xs-8 col-md-8">
										<a class="btn btn-color" id="OpenVideoUpload" class="image-file-input">Choose Video</a>
										<input type="submit" value="Upload" id="post_btn" class="btn btn-default">
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="form-group">
								<div class="progress-bar bar percent" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width: 0%;">0%
							</div>
						</li>
					</ul>	
				</form>		
			</div>
			<div class="col-sm-5 col-md-5 col-xs-5 col-lg-5">
				<div class="page-header">
					<legend>My Videos</legend>
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