@extends('master')
@section('site_title')
Rocky the Superdog
@stop

@section('content')
	<div class="container-fluid bg-rocky">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 left">
				@include('home.profile-left', array(
					'friend_flags' => $friend_flags
				))
			</div>
			<div class=" col-lg-9 col-md-6 col-sm-12 col-xs-12 middle">
			<input type="hidden" id="profile_id" value="{{{ $profile->registration_id }}}">
				<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
					<legend>My Advertisement</legend>
					<div class="col-sm-12 col-xs-12 col-lg-12 col-md-12 merch-feat-ad">
						<div class="col-sm-12 col-xs-12 col-lg-7 col-md-7 mf-adimg">
							@if(isset($post[0]->image[0]))
								<img class="col-sm-12 thumbnail" src="{{ route('files.get.image', array($post[0]->user_id, $post[0]->image[0]->image_id)) }}">
							@endif
						</div>
						<div class="col-sm-12 col-xs-12 col-lg-5 col-md-5 mf-adinfo">
							<h3>{{$post[0]->title}}</h3>
							<p>{!! $post[0]->post->post_message !!}</p>
							<button type="button" class="btn btn_inquire" data-toggle="modal" data-target="#shopModal" data-type="Inquire Adname">INQUIRE</button>
							<button type="button" class="btn btn_order" data-toggle="modal" data-target="#shopModal" data-type="Order Adname">ORDER</a>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
@stop