@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
<script>
$(document).on('click' , '#refresh-btn' , function(){
	var url = $(this).attr('value');
	var url2 = $('#update-route').val();
	$.get(url , function(a){
		$('#refresh-btn').addClass('hidden');
		$(a).hide().fadeIn().insertBefore('.append-post > li:first-child');
	});
	$.get(url2);
});

setInterval(function(){ 
	var url = $('#check-refresh-route').val();
	$.get( url , function( data ) {
	 	if(data != '0'){
	 		$('#refresh-btn').removeClass('hidden');
	 	}
	});
}, 30000);
</script>
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.left')
			</div>
			<div class="col-lg-6 col-lg-6 col-md-3 col-sm-12 col-xs-12 middle">
				@include('home.middle', array('newsfeed' => $newsfeed))
			</div>
			<div class="col-lg-3 col-lg-6 col-md-3 col-sm-12 col-xs-12 right">
				@include('home.right')
			</div>
		</div>
	</div>
@stop