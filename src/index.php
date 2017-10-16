<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="page icon" href="../res/img/beer.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>BeerBuddy</title>

	<!-- bootstrap core css -->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
	<!-- font awesome css-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- custom styles -->
	<link href="../res/styles/index.css" rel="stylesheet">
	<link href="../res/styles/navigation_header.css" rel="stylesheet">
	<!-- google api key: AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8  -->
	<script type="text/javascript">

		var map; // google map canvas 
		var locationWindow // window for current location
		var resultsWindow; // window for filtering results

		function initMap() {
			// init map in fort wayne
			var fw = { lat: 41.0793, lng: -85.1394 }
			var def_zoom = 13
			map = new google.maps.Map(document.getElementById('map'), {
          		center: fw,
          		zoom: def_zoom,
          		streetViewControl: false,
          		mapTypeControl: false,
          		minZoom: 8
          		//noClear = true // do not clear the map div elements
        	});

        	// try to determine the current position based on device location
			var userLocation;
	        if (navigator.geolocation) {
	        	navigator.geolocation.getCurrentPosition(function(position) {
		            userLocation = {
		            	lat: position.coords.latitude,
		            	lng: position.coords.longitude
		            };
		            locationWindow = new google.maps.InfoWindow({map: map, position: userLocation, content: 'You are here!'});

					var request = {location: userLocation, radius: 16000, types: ['liquor_store']};

					map.setCenter(userLocation);
		            map.setZoom(def_zoom);

		            // filter for liquor stores
					resultsWindow = new google.maps.InfoWindow();
			        var service = new google.maps.places.PlacesService(map);
			        service.nearbySearch(request, callback);
	        	}, 
	        	function() {
	            	handleLocationError(true, locationWindow, map.getCenter());
	          	});
	        } else {
	        	userLocation = fw;
	        	handleLocationError(false, locationWindow, map.getCenter()); // browser does not support geolocation
	        }

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
	        	resultsWindow.setContent(place.name);
	        	resultsWindow.open(map, this);
	        });
	      }


		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	       	infoWindow.setPosition(pos);
	       	infoWindow.setContent(browserHasGeolocation ? 'Error: The Geolocation service failed.' : 'Error: Your browser doesn\'t support geolocation.');
	        infoWindow.open(map);
	    }
		
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<!-- 21+ modal dialog js -->
	<script type="text/javascript" src="js/modalResponse.js"></script>

</head>

<body onload="//openAgeModal();">

	<!-- top navigation bar -->
	<?php $page='index'; include('navigation_header.php'); ?>

	<!-- page contents -->
	<div class="container-fluid">
		<h2 style="text-align: center; margin-top: -5px; text-decoration: underline">Deals near you</h2>
	    
	    <div class="row" style="margin-top:-5px;">

			<div id="search"></div>

			<!-- begin map -->
			<div id="map"></div>
			<!-- end map -->

			<a href="view_deals.php">view deals (will be on sidebar)</a>
			
	    </div>

		<!-- featured deals?/new deals? row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Featured deals today</h3>
            </div>
            
            <div class="container" style="margin-left: auto; margin-right: auto;">
	            <div class="col-sm-4">
	                <a href="https://www.belmontbev.com/about-belmont/our-newspaper-ads/">
	                    <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAM6AAAAJDhmN2YzOWQ5LWMyODAtNGUzMi04MzEyLTFhNDUwMTBlMTg4MA.png" class="img-responsive feature-deal" alt="Belmont Beverages">
	                </a>
	            </div>
	            
	            <div class="col-sm-4">
	                <a href="http://www.capncork.com/specials/">
	                    <img src="http://www.capncork.com/wp-content/uploads/2014/05/2.jpg" class="img-responsive feature-deal" alt="Cap 'n' Cork">
	                </a>
	            </div>
	
	            <div class="col-sm-4">
	                <a href="http://www.svliquors.com/sales-ad.html">
	                    <img src="https://pbs.twimg.com/profile_images/839125470780149760/765_PWFQ.jpg" class="img-responsive feature-deal" alt="S&V Liquors">
	                </a>
	            </div>
            </div>

        </div>
        <!-- /.row -->

	</div>

	<!-- footer -->
	<?php $page='index'; include('footer.php'); ?>

	<!-- jQuery core js -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- bootstrap core js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- google maps js api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8&libraries=places&callback=initMap" async defer></script>

</body>

</html>
