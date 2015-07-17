@if(!$info->isEmpty())
	@foreach($info as $row)
		<div class="row">
			<a href="{{ Route('profile.view' , ['id' => $row->user_id] ) }}" style="display:block">
				<div class="col-lg-2 nopad">
					@if(isset($row->prof_pic))
						<img src="{{ mediaSrc($row->prof_pic->image_path , $row->prof_pic->image_name , $row->prof_pic->image_ext) }}">
					@else
						<img src="{{ URL::asset('assets/images/default-pic.png') }}">
					@endif
				</div>
				<div class="col-lg-10">
					<h6 class="text-capitalized">{{ $row->first_name.' '.$row->last_name}}<br><small>{{ $row->country }}</small></h6>
				</div>
			</a>
		</div>
	@endforeach
	<p class="text-center"><a href="#" id="loadMoreTrigger">Load more...</a></p>
@else
	<p class="text-center"> No Results..</p>
@endif