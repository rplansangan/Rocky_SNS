@if(!empty($profileInformation))
	
	@include('pages.inside.profile.profilehead')

	<div class="useraboutcont">
		<div class="row">
			<div class="col-lg-6">
				<div>
					<p><i class="fa fa-birthday-cake"></i> {{ $profileInformation->birth_date }}</p>
					@if($profileInformation->gender== 'F')
					<p><i class="fa fa-female"></i> {{ $profileInformation->gender }}emale</p>
					@else
					<p><i class="fa fa-male"></i> {{ $profileInformation->gender }}ale</p>
					@endif
				</div>
			</div>
			<div class="col-lg-6">
				<div>
					<p><i class="fa fa-home"></i> {{ $profileInformation->address_line1 }} {{ $profileInformation->address_line2 }}
					<br/> {{ $profileInformation->city }}, {{ $profileInformation->zip }}, {{ $profileInformation->state }}, {{ $profileInformation->country }}</p>
				</div>
			</div>
		</div>
	</div>
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif