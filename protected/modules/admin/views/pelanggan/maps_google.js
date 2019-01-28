var map = new google.maps.Map(document.getElementById('map_canvas'), {
    zoom: 13,
    center: new google.maps.LatLng(35.137879, -82.836914),
    mapTypeId: google.maps.MapTypeId.ROADMAP
});

var myMarker = new google.maps.Marker({
    position: new google.maps.LatLng(-6.919, 107.604),
    draggable: true,
    label:"Lokasi Pelanggan"
});
var destinationMarker = new google.maps.Marker({
    position: new google.maps.LatLng(-6.937, 107.622),
    draggable: false,
    label:"Harapan Baru"
});
function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1);
  var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}
google.maps.event.addListener(myMarker, 'dragend', function (evt) {
    // document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(3) + ' Current Lng: ' + evt.latLng.lng().toFixed(3) + '</p>';
    var jarak = getDistanceFromLatLonInKm(evt.latLng.lat().toFixed(3),evt.latLng.lng().toFixed(3),-6.937,107.622);
    var jarak_meter = jarak * 1000;
    document.getElementById('Pelanggan_jarak').value =jarak_meter.toFixed(2);
});

google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
    // document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
});

map.setCenter(myMarker.position);
myMarker.setMap(map);
destinationMarker.setMap(map);
