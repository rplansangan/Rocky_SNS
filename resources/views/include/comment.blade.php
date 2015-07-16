@if(!$comment->isEmpty())
	@foreach($comment as $row)
		<div class="comment-container">
			<div class="col-lg-1">
				@if(isset($row->user->prof_pic))
				<a href="{{ Route('profile.view' , ['id' => $row->user->user_id] ) }}"><img src="{{ mediaSrc($row->user->prof_pic->image_path , $row->user->prof_pic->image_name , $row->user->prof_pic->image_ext) }}" class="profile-pic"></a>
				@else
				<a href="{{ Route('profile.view' , ['id' => $row->user->user_id] ) }}"><img src="{{ URL::asset('assets/images/default-pic.png') }}" class="profile-pic"></a>
				@endif
			</div>
			<div class="col-lg-11">
				<div class="row">
					<div class="col-lg-6 text-left nopad">
						<a href="{{ Route('profile.view' , ['id' => $row->user->user_id] ) }}"><span>{{ $row->user->first_name.' '.$row->user->last_name}}</span></a>
					</div>
					<div class="col-lg-6 text-right nopad">
						<h6><small>{{ _ago(strtotime($row->created_at)) }} ago</small></h6>
					</div>
				</div>
				<div class="row">
					<div class="comment-message">
						<p>{!! $row->comment_message !!}</p>
					</div>
				</div>
			</div>
			<br clear="all">
		</div>
	@endforeach
@else
<div class="text-center noComment" style="margin-top:20px;">
	<p>No Comment</p>
</div>
@endif