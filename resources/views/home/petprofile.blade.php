@include('forms.create_post')
<input type="hidden" id="check-refresh-route" value="{{ Route('post.check') }}">
<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<div class="newsfeed-title col-sm-12 col-xs-12 col-lg-12 col-md-12">
		<span class="col-sm-12 col-xs-12 col-lg-6 col-md-6"><legend>News feed</legend></span>
		<span class="text-right col-sm-12 col-xs-12 col-lg-6 col-md-6">
			<a href="javascript:void(0);" id="refresh-btn" class="hidden" value="{{ Route('get.newfeeds') }}" ><img style="width:30px" src="{{ URL::asset('assets/images/Refresh2.png') }}"></a>
		</span>
	</div>
	@include('iterators.posts', array('newsfeed' => $newsfeed))
</div>