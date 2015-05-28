<div role="tabpanel">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#aboutpet" aria-controls="aboutpet" role="tab" data-toggle="tab">About This Pet</a></li>
		<li role="presentation"><a href="#marksdetails" aria-controls="marksdetails" role="tab" data-toggle="tab">Pet Marks</a></li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="aboutpet">
			<div class="largeimg text-center">
				<img src="{{ URL::asset('assets/images/found1.jpg') }}" width="550px">
			</div>
			<div class="col-xs-12 col-sm-12 col-m-5 col-lg-5 petotherinfos">
				<p>{{ $info['pet_name'] }}</p>
				<p>{{ $info['pet_type'] }}</p>
				<p>{{ $info['pet_bdy'] }}</p>
				<p>{{ $info['pet_gender'] }}</p>
				<p>{{ $info['weight'].' '.$info['height'].' ' }}</p>
				<p>Happy go lucky</p>
				<p>Chop House T-Bone Steak Flavor | Alpo</p>
				<p>{{ $info['food_style'] }} | {{ $info['feeding_interval'] }} | {{ $info['feeding_time'] }} </p>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="marksdetails">
			<div class="col-xs-12 col-sm-12 col-m-7 col-lg-7 marks text-center">
				<img src="{{ URL::asset('assets/images/ret-paw.jpg') }}" width="250px">
				<p>paws</p>
			</div>
		</div>
	</div>
</div>