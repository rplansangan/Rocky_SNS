<div class="foundpets-page col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h2>FOUND PETS</h2></legend>

	@if(!is_null($found_pets))
		@foreach($found_pets as $pet)
			<div class="found-imgs-mainp col-sx-12 col-sm-12 col-m-4 col-lg-4">
				<div class="borderpet">
					<img class="foundmodal" route="{{ Route('foundpetinfo') }}" token="{{ csrf_token() }}" tag-id="{{{ $pet->profile->pet_id }}}" src="{{ route('files.get.image', [$pet->profile->profile_pic->user_id, $pet->profile->profile_pic->image_id]) }}" width="210px" height="145px">
					<div class="ownerinfos">
						<p><span class="glyphicon glyphicon-phone"></span><a href="tel:{{ $pet->finder_country_code }} {{ $pet->finder_area_code }} {{ $pet->finder_tel_no }}">{{ $pet->finder_country_code }} {{ $pet->finder_area_code }} {{ $pet->finder_tel_no }}<a/></p>
						<p><span class="glyphicon glyphicon-tag"></span>Tag {{ $pet->rocky_tag_no }}</p>
						<p><span class="glyphicon glyphicon-eye-open"></span>{{ $pet->found_in_remark }}</p>
						<p><span class="glyphicon glyphicon-user"></span>{{ $pet->profile->user->registration->first_name }} {{ $pet->profile->user->registration->last_name }}</p>
					</div>
				</div>
			</div>
		@endforeach
	@else
	
	@endif

	<div class="col-xs-12 btninf">
		<p>If you found a pet, kindly click the button below and fillup the form.</p>
		<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>
	</div>
</div>