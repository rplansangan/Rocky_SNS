<style type="text/css">
.landing-video-area{
	margin: 5px 0px; 
}
.landing-video-area a , .landing-video-area img{
	margin: 0px;
	padding: 15px 0px;
}
</style>

<div class="container-fluid">
	<div class="row">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search for...">
			<span class="input-group-btn">
				<button class="btn btn-default" type="button">Search</button>
			</span>
		</div><!-- /input-group -->
	</div>
	<div class="row">
		<div class="page-header">
			<h2>{{ $status }}</h2>
		</div>
		@if(count($video) != 0)
		@foreach($video as $row)
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 landing-video-area text-left">
			<a href="{{ route('video.get', array($row->user_id, $row->image_id)) }}"><img class=" col-sm-12  img-responsive" src="{{ route('files.get.thumb', array($row->user_id, $row->image_id)) }}"></a>
			<a href="{{ route('video.get', array($row->user_id, $row->image_id)) }}">{{ $row->image_title }}</a>
			<p class="text-muted video-date">
				<em><small>By <a href="{{{ route('profile.showProfile', $row->register->registration_id) }}}">{{ $row->register->first_name.' '.$row->register->last_name}}</a></small></em>
			</p>
		</div>
		@endforeach
		@else
		<p>No Result Found...</p>
		@endif
	</div>
</div>