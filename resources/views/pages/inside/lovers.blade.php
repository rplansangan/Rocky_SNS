@include('include.formPost')
@include('include.newsfeed')
<p class="text-center loading-dots">
	<a href="javascript:void(0);" id="loadMore" route="{{ Route('get.newsfeed') }}"><span>...</span></a>
</p>

