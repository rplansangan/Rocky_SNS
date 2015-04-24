@include('forms.profile', array(
	'form_title' => trans('profile.header.prof_details.top'),
	'form_route' => route('profile.setings.patch'),
	'form_details' => $details
))