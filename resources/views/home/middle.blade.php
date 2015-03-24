<div role="tabpanel" class="  post-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<form method="POST" action="{{ url('test') }}" class="form-horizontal" id="form-post" role="form" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="file" name="userfile[]" id="fileuploader" class="form-control" multiple>
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Post</a></li>
			<li role="presentation"><a href="#" id="OpenImgUpload" aria-controls="profile" role="tab" data-toggle="tab">Upload Image</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="home">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<ul class="comment-post">
					<li>
						<div class="form-group">
							<textarea class="form-control" max="500" name="post_message" id="post_message" placeholder=" Say Something..."></textarea>
						</div>
					</li>
					<li>
						<div class="form-group text-right">
							<div class="row">
								<div class="col-sm-12 col-lg-12 col-xs-12 col-md-12">
									<input type="submit" value="post" class="btn btn-color">
								</div>
							</div>
						</div>
					</li>
				</ul>			
			</div>
		</div>
	</form>
</div>

<div class="newsfeed-area col-sm-12 col-xs-12 col-lg-12 col-md-12">
	<legend>News feed</legend>
	<ul class="media-list append-post">

	</ul>
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
				<p><a href="#"><i class="fa fa-thumbs-up"></i> 1 Likes....</a> <a href="javascript:void(0)">Comment</a></p>
				<form method="POST" action="{{ url('login') }}"  role="form" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<textarea max="500" name="post_message" class="comment-box" placeholder=" Say Something..."></textarea>
				</form>	
			</div>
		</li>
	</ul>
</div>

