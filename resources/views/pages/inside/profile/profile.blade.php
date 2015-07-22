@if(!empty($profileInformation))	
	@include('pages.inside.profile.profilehead')

	@if(Auth::id() == $id)
		@include('include.formPost')
	@endif
	@include('include.newsfeed')
@else
	<div class="text-center">
		<p>invalid Account</p>
	</div>
@endif
