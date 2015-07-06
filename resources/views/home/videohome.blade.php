<div class="row col-sm-12 col-lg-12 col-xs-12 col-md-12">
	<form method="get" action="{{ route('video.search') }}">
		<div class="col-sm-7">
			<div class="input-group">
				<input type="text" class="form-control" name="search"  placeholder="Search">
				<div class="input-group-addon"><i class="fa fa-search"></i></div>
			</div>
		</div>
		<div class="col-sm-2">
			<input type="submit" value="Search" class="btn btn-default">
		</div>
		<div class="col-sm-3">
			<a href="{{ route('video.uploadView') }}" class="btn btn-default">Upload Video</a>
		</div>
	</form>
</div>
<div class="row col-sm-12 col-lg-12 col-xs-12 col-md-12 video-list">
	<div class="page-header">
		<h2>{{ $status }}</h2>
	</div>
	<ul>
		@if(count($video) != 0)
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
							<em><small>By <a href="{{{ route('profile.showProfile', $row->register->registration_id) }}}">{{ $row->register->first_name.' '.$row->register->last_name}}</a></small></em>
						</span>
						<br>
						<span class="text-muted video-date" style="line-height:25px">
							<em><small>- {{ $row->category }}</small></em>
						</span>
						<p>{!! str_limit( strip_tags($row->post['post_message']), 20) !!}</p>
					</div>
				</div>
			</li>
			@endforeach
		@else
		<p>No Result Found...</p>
		@endif
		
		
	</ul>
</div>