@if(Auth::id() == $id)
@include('include.formPost')
@endif
@include('include.newsfeed')