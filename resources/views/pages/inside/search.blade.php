@if(!$info->isEmpty())
	<div>
		<div class="text-center">
			<img src="{{ URL::asset('assets/img/neighbors-large.jpg') }}">
			<h3>Your Neighbors <br><small class="text-muted">Virtually visit your neighbors here</small></h3>
			<br clear="all">
		</div>
	</div>
	<div>
		<label class="text-center"> {{ $info->count() }} Results...</label>
	</div>
	@foreach($info as $row)
		<div class="row">
			<a href="#">
				<div class="col-lg-2">
					@if(isset($row->prof_pic))
							<img src="{{ mediaSrc($row->prof_pic->image_path , $row->prof_pic->image_name , $row->prof_pic->image_ext) }}" class="img-responsive">
						@else
							<img src="{{ URL::asset('assets/images/default-pic.png') }}" class="img-responsive">
						@endif
				</div>
				<div class="col-lg-10">
					 <h5>
					 	{{ $row->first_name.' '.$row->last_name }}<br>
					 	<small>{{ $row->country }}</small>
					 </h5>
				</div>
			</a>
		</div>
	@endforeach
@else
	<div>
		<p class="text-center">No Results...</p>
	</div>
@endif
