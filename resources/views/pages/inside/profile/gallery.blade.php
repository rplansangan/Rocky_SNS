@if(!empty($profileInformation))
	
	@include('pages.inside.profile.profilehead')

	<div class="gallerycont">
		<div class="row text-center">
			UNDER CONSTRUCTION
		</div>
	</div>
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif
