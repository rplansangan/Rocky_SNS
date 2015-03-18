<div class="page-header">
	<h2>Post</h2>
</div>
<div class="post-area col-sm-12 col-xs-12 col-lg-10 col-md-10 col-lg-offset-1 col-md-offset-1 ">
	<form method="POST" action="{{ url('login') }}" class="form-horizontal " role="form">
		<div class="form-group">
			<textarea class="form-control" max="500" name="post_message" id="post_message" placeholder=" Say Something..."></textarea>
		</div>
		<div class="form-group text-right hide_submit">
			<div class="row">
				<div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
					<input type="file" name="userfile" id="fileuploader" class="form-control">
				</div>
				<div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
					<input type="submit" value="post" class="btn btn-color">
				</div>
			</div>
		</div>
	</form>				
</div>

<div class="page-header">
	<h2>News Feed</h2>
</div>

<div class="comment" data-example-id="media-alignment">
	<div class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object"  alt="64x64" src="{{ URL::asset('assets/images/browncat.png') }}" data-holder-rendered="true" style="width: 64px; height: 64px;">
			</a>
		</div>
		<div class="media-body">
			<h2 class="media-heading">Rocky Superdog</h2>
			<h4 class="media-heading">March 20 2015 12:00:00 AM</h4>
			<p>Hello</p>
		</div>
	</div>		
</div>