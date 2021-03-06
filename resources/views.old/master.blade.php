<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/images/favicon.png') }}"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>  
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rocky2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rocky.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery-form.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bxslider.js') }}"></script>
  </head>
  <body>
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    @include('top')
    @if($errors->any())
    	<ul>
    		@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
			@endforeach
    	</ul>
    @endif
    @yield('content')
    @include('include.formlogin')
    @include('footer')
  </body>
</html>