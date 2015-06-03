<div class="foundpets-page col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend><h2>MISSING PETS</h2></legend>

	@foreach($info as $row)
		<div class="found-imgs-mainp col-xs-12 col-sm-12 col-md-6 col-lg-6">
			<div class="borderpet">
				<img data-toggle="modal" data-target="#myModal"  src="{{ route('files.get.image', array($row->profile['image'][0]['user_id'], $row->profile['image'][0]['image_id'] )) }}"  width="210px" height="145px">
				<div class="ownerinfos">
					<p><span class="glyphicon glyphicon-phone"></span><a href="tel:000 000 000">000 000 000<a/></p>
					<p><span class="glyphicon glyphicon-tag"></span>Tag {{ $row->rocky_tag_no }}</p>
					<p><span class="glyphicon glyphicon-eye-close"></span>{{ $row->lost_in }}</p>
					<p><span class="glyphicon glyphicon-user"></span></p>
				</div>
			</div>
		</div>
	@endforeach

	<div class="col-xs-12 btninf">
		<p>If you found a pet, kindly click the button below and fillup the form.</p>
		<button type="button" class="btn btn_found" data-toggle="modal" data-target="#misfo" data-type="Found" data-advertisetype="I Found A Pet"  data-title="I Found A Pet" data-id="" data-action="" >I Found A Pet</button>
	</div>
</div>