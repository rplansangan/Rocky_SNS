<div class="row col-sm-12 col-lg-12 col-xs-12 col-md-12">
	<div class="col-sm-9">
		<div class="input-group">
			<input type="text" class="form-control"  placeholder="Search">
			<div class="input-group-addon"><a href="#"><i class="fa fa-search"></i></a></div>
		</div>
	</div>
	<div class="col-sm-3">
		<a href="{{ route('video.uploadView') }}" class="btn btn-block">Upload Video</a>
	</div>
</div>
<div class="row col-sm-12 col-lg-12 col-xs-12 col-md-12 video-list">
	<div class="page-header">
		<h2>Latest Videos</h2>
	</div>
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
</div>