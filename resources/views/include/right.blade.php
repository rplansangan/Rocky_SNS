<!-- RIGHT BAR -->
<script type="text/javascript">
function initialize2() {
  var mapOptions = {
    zoom: 3,
    center: new google.maps.LatLng(-33, 151)
  }
  var map = new google.maps.Map(document.getElementById('rocky-last-location'), mapOptions);
  var image = 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/images/marker-icon.png';
  var myLatLng = new google.maps.LatLng(-33.890542, 151.274856);
  var beachMarker = new google.maps.Marker({
    position: myLatLng,
    map: map,
    icon: image
  });
}
google.maps.event.addDomListener(window, 'load', initialize2);
</script>
@if(Auth::check())
<div>
  <div id="rocky-last-location"></div>
  <div class="pet-list">
    <ul>
      <li><a class="active" href="#"><img src="{{ URL::asset('assets/img/prof.png') }}" class="profile-pic"></a></li>
      <li><a href="#"><img src="{{ URL::asset('assets/img/puggy.png') }}" class="profile-pic"></a></li>
    </ul>
  </div>
</div>
@endif
<div>
  <div>
    <img src="{{ URL::asset('assets/img/gps.png') }}" class="img-responsive" width="100%">
  </div>
  <div class="button-group text-center">
    <a href="#" id="btn1"><span>LEARN MORE</span></a>
    <a href="#" id="btn2"><span>BUY NOW</span></a>
  </div>
</div>
<!-- END RIGHT BAR -->