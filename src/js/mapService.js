var map; // google map canvas 
var locationWindow // window for current location
var resultsWindow; // window for filtering results
var service;

function initMap() {
    var fortWayne = { lat: 41.0793, lng: -85.1394 };
    map = new google.maps.Map(document.getElementById('map'), {
        center: fortWayne,
        zoom: 13,
        streetViewControl: false,
        mapTypeControl: false,
        fullscreenControl: false,
        zoomControl: true,
        minZoom: 5
    });

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            function (position) {
                handleSuccessfulGeolocationRequest(position);
            },
            function () {
                handleLocationError(true, locationWindow, map.getCenter());
            }, { enableHighAccuracy: true }
        );
    } else {
        handleLocationError(false, locationWindow, map.getCenter()); // browser does not support geolocation
    }

    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
}

function processResults(results, status, pagination) {

    if (status !== google.maps.places.PlacesServiceStatus.OK) {
        return;
    } else {
        for (var i = 0; i < results.length; i++) {
            createMarker(results[i], results[i].name, results[i].vicinity);
        }

        if (pagination.hasNextPage) {
            pagination.nextPage();
        }
    }
}

function createMarker(place, storeName, storeAddress) {
    var placeLoc = place.geometry.location;
    var marker = new google.maps.Marker({
        map: map,
        position: place.geometry.location
    });
    var request = { reference: place.reference };
    service.getDetails(request, function (place, status) {
        google.maps.event.addListener(marker, 'click', function () {
            resultsWindow.setContent(createInfoWindowContent(storeName, storeAddress));
            resultsWindow.open(map, this);
        });
    });

}

function handleSuccessfulGeolocationRequest(position) {
    const userLocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
    };

    locationWindow = new google.maps.InfoWindow({ map: map, position: userLocation, content: 'You are here!' })
    locationWindow.setZIndex(-100);

    var request = { 
        location: userLocation, 
        radius: 16000, 
        types: ['liquor_store'] 
    };

    map.setCenter(userLocation);
    map.setZoom(13);

    resultsWindow = new google.maps.InfoWindow();
    service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request, processResults);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    swal(
        'Unable to determine current position...',
        'is your location setting enabled?',
        'error'
    );
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

function createInfoWindowContent(storeName, storeAddress) {
    var link = '/src/view_store_deals.php?store=' + encodeURIComponent(storeName) + '&address=' + encodeURIComponent(storeAddress);
    var content =
        '<div style="text-align: center;padding: 10px">' +
            '<div>' + storeName + '</div>' +
            '<div>' + storeAddress + '</div>' +
            '<a href="https://www.google.com/maps/place/' + storeAddress + '" target="_blank">(view directions)</a>' +
        '</div>' +
        '<a href=' + link + '><button type="button" class="btn btn-primary center-block" >View deals at ' + storeName + '</button></a>';

    return content;
}