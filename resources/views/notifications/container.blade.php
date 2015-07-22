<li>
	<a href="{{{ $route }}}">
		<div class="col-lg-2 nopad">
			@if(!empty($image) AND isset($image))
				<img src="{{ mediaSrc($image->image_path , $image->image_name , $image->image_ext) }}" class="img-responsive">
			@else
				<img src="{{ URL::asset('assets/img/jim.png') }}" class="img-responsive">
			@endif
		</div>
		<div class="col-lg-9 nopad text-left">
			<label class="col-lg-6 nopad">{{ $name }}</label> 
			<small class="col-lg-6 text-right nopad time">{{ _ago(strtotime($created_at))}} Ago</small> 
			<br>
			<small>{!! $message !!}</small>
		</div>
		<br clear="all">
	</a>
</li>