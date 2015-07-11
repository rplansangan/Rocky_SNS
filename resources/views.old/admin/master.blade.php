<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Rocky the Superdog</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/admin_main.css') }}">
  </head>
  <body>
  <div class="container">
	  	<div id="admin-top" class="row">
	  		<div id="admin-top-inner" class="col-sm-12">
	  			<div id="left" class="col-md-6">
	  				<h1>Rocky the Superdog Administration</h1>
	  			</div>
	  			<div id="right" class="col-md-6">
	  				<p>{{ trans('admin.header.main.name', ['name' => $user_name]) }}</p>
	  			</div>
	  		</div>
	  	</div>
	  	<div id="admin-mid" class="row">
	  		<div id="admin-mid-nav" class="col-md-3">
	  			<ul class="list-group">
	  				<li class="list-group-item">
	  					<a href="{{ route('admin.stats.overview') }}">Site Overview</a>
	  				</li>
	  				<li class="list-group-item">
	  					<a href="{{ route('admin.list.user') }}">User List</a>
	  				</li>
	  				<li class="list-group-item">
	  				 <a href="{{ route('admin.list.errors') }}">Errors</a>
	  				</li>
	  			</ul>
	  		</div>
	  		<div id="admin-mid-content" class="col-md-9">
	  			@yield('content')
	  		</div>	  	
	  	</div>    
    </div>
  </body>
</html>