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

<ul class="media-list">
	<li class="media">
		<div class="media-left">
			<a href="#">
				<img class="media-object" src="{{ URL::asset('assets/images/browncat.png') }}" withd="64px" height="64px" alt="profile picture">
			</a>
		</div>
		<div class="media-body">
			<h4 class="media-heading">Superdog</h4>
			<small class="media-heading">March 18 2015 12:00:00 am</small>
			<p>However, for most routes and controller actions, you will be returning a full Illuminate\Http\Response instance or a view. Returning a full Response instance allows you to customize the response's HTTP status code and headers. A Response instance inherits from the Symfony\Component\HttpFoundation\Response class, providing a variety of methods for building HTTP </p>
			<p><a href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a></p>
			<div class="col-lg-11">
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
		</div>
	</li>
</ul>