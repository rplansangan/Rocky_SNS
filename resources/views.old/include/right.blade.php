<div class="right-cont col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="loc-map col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<img class="locimg" src="{{ URL::asset('assets/images/new/location.png') }}">
	</div>
	<div class="location col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<a href="#" class="loc-btn"><img src="{{ URL::asset('assets/images/new/prof-icon.png') }}" width="38px"></a>
		<a href="#"><img src="{{ URL::asset('assets/images/new/dolly.png') }}" width="38px"></a>
		<a href="#"><img src="{{ URL::asset('assets/images/new/puggy.png') }}" width="38px"></a>
		<a href="#"><img src="{{ URL::asset('assets/images/new/jim.png') }}" width="38px"></a>
		<a href="#"><img src="{{ URL::asset('assets/images/new/refresh.png') }}" width="38px"></a>
	</div>

	<div class="trackapp col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<img class="locimg" src="{{ URL::asset('assets/images/new/trackerapp.png') }}">
		<div class="track-btn text-center">
			<a class="learn" href="{{ route('uc') }}">LEARN MORE</a>
			<a class="buy" href="{{ route('uc') }}">BUY NOW</a>
		</div>
	</div>
	<div class="missing-right col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
		<?php 
		if(!$missing_pets->isEmpty()){
				foreach($missing_pets as $row){
					?>
						<div class="missing-cont col-xs-12 col-sm-12 col-m-12 col-lg-12 text-center">
							<div class="missing-infos">
								<img src="<?php echo mediaSrc($row->profile->image[0]->image_path , $row->profile->image[0]->image_name , $row->profile->image[0]->image_ext ); ?>">
								<h2><?php echo $row->pet_name ?></h2>
								<p></p>
								<h3 class="text-uppercase">MISSING <br/> <?php echo _ago(strtotime($row->created_at))?></h3>
								<a href="{{ route('public.missingpets') }}">VIEW</a>
							</div>
						</div>
					<?php
				}
			}
		?>
	</div>	
</div>