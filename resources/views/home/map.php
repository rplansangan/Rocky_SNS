<div class="page-header">
	<h2>Where is my Pet</h2>
</div>

<style>
#map-canvas {
  width: 100%;
  height: 400px;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var lat =  new google.maps.LatLng(15.176237, 120.530269);
  var mapOptions = {
    center: lat,
    zoom: 16,
    mapTypeId: google.maps.MapTypeId.HYBRID  
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);

  var marker = new google.maps.Marker({
      position: lat,
      map: map,
      title:"Rocky Superdog"
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div id="map-canvas"></div>