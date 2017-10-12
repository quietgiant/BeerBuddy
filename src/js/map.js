var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: { lat: 41.0793, lng: -85.1394 },
    zoom: 14
  });
}



/*var map;
var infoWindow;

function initMap() {

  var pyrmont = { lat: 0, lng: 0 };

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      pyrmont = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
    });

  }

  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 41.0793, lng: -85.1394},
    zoom: 13
  });

  infoWindow = new google.maps.InfoWindow();
  var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: pyrmont,
    radius: 10000,
    keyword: 'liquorStore'
  }, callback);
}

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location
  });

  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(place.name);
    infoWindow.open(map, this);
  });
}*/
