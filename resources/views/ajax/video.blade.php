<li>
	<div class="row">
		<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
		<div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
			<img class="col-sm-12 thumbnail img-responsive" src="{{ route('files.get.thumb', array($video->user_id, $video->image['image_id'])) }}" style="margin-top:20px;">
		</div>
		<div class="col-sm-8 col-md-8 col-lg-8 col-xs-8">
			<a href="{{ route('video.get', array($video->user_id, $video->image['image_id'])) }}"><h4>{{ $video->image['image_title'] }}</h4></a>
			<span class="text-muted video-date">
				<em><small>{{ date('M d Y @ H:i:s A' , strtotime($video->created_at) ) }}</small></em>
			</span>
			<span class="text-muted video-date">
				<em><small>By {{ $video->user->first_name.' '.$video->user->last_name}}</small></em>
			</span>
			<p>{!! $video->post_message !!}</p>
		</div>
	</div>
</li>