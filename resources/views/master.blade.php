<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title.''.$sub_title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style2.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/newstyle.css') }}">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('assets/images/favicon.png') }}"/>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
  </head>
  <body>
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    @if(Auth::check())
    @include('top')
    @else
    @include('landing.top')
    @endif
    @yield('content')
    @include('include.modal')
    <script src="{{ URL::asset('assets/js/jquery-form.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bxslider.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rocky2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/rocky.js') }}"></script>   
    <script type="text/javascript">
        var map;
        function initialize() {
            var mapOptions = {
                zoom: 11,
                center: new google.maps.LatLng(-33, 151)
              }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
            var image = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/images/marker-icon.png';
            var myLatLng = new google.maps.LatLng(-33.890542, 151.274856);
            var beachMarker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  icon: image
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);

        
    </script>   
  </body>
</html>