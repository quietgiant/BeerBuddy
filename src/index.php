<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="page icon" href="/res/img/beer.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>BeerBuddy</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">

	<!-- animate css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">

	<!-- custom styles -->
	<link href="/res/styles/index.css" rel="stylesheet">

	<link href="/res/styles/navigation_header.css" rel="stylesheet">
	<!-- google api key: AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8  -->

	<script type="text/javascript">

		var map; // google map canvas 
		var locationWindow // window for current location
		var resultsWindow; // window for filtering results
		var service;
		function initMap() {
			
			// init map in fort wayne
			var fw = { lat: 41.0793, lng: -85.1394 };
			var def_zoom = 13;
			map = new google.maps.Map(document.getElementById('map'), {
          		center: fw,
          		zoom: 5,
          		streetViewControl: false,
          		mapTypeControl: false,
          		fullscreenControl: false,
          		zoomControl: true,
          		minZoom: 3
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
			        service = new google.maps.places.PlacesService(map);
			        service.nearbySearch(request, processResults);
			        
	        	}, 
	        	function() {
	            	handleLocationError(true, locationWindow, map.getCenter());
	          	});
	        } else {
	        	userLocation = fw;
	        	handleLocationError(false, locationWindow, map.getCenter()); // browser does not support geolocation
	        }
	        
	        var marker = new google.maps.Marker({
        		map: map,
        		anchorPoint: new google.maps.Point(0, -29)
    		});
	    	  // init autocomplete search bar
		      autocomplete.addListener('place_changed', function() {
		      	
		          resultsWindow.close();
		          marker.setVisible(false);
		          var place = autocomplete.getPlace();
		          if (!place.geometry) {
		            // User entered the name of a Place that was not suggested and
		            // pressed the Enter key, or the Place Details request failed.
		            window.alert("No details available for input: '" + place.name + "'");
		            return;
		          }
		
		          // If the place has a geometry, then present it on a map.
		          if (place.geometry.viewport) {
		            map.fitBounds(place.geometry.viewport);
		          } else {
		            map.setCenter(place.geometry.location);
		            map.setZoom(def_zoom);  // Why 17? Because it looks good.
		          }
		          marker.setPosition(place.geometry.location);
		          marker.setVisible(true);
		
		          var address = '';
		          if (place.address_components) {
		            address = [
		              (place.address_components[0] && place.address_components[0].short_name || ''),
		              (place.address_components[1] && place.address_components[1].short_name || ''),
		              (place.address_components[2] && place.address_components[2].short_name || '')
		            ].join(' ');
		          }
		
		          infowindowContent.children['place-icon'].src = place.icon;
		          infowindowContent.children['place-name'].textContent = place.name;
		          infowindowContent.children['place-address'].textContent = address;
		          infowindow.open(map, marker);
	          
		      });

		}
		function processResults(results, status, pagination) {
		
		  if (status !== google.maps.places.PlacesServiceStatus.OK) {
		    return;
		  } else {
		    	for (var i = 0; i < results.length; i++) {
		    		console.log(results[i].vicinity);
			        	createMarker(results[i], results[i].name, results[i].vicinity);
			          }
		
		    if (pagination.hasNextPage) {
		        pagination.nextPage();
		    }
		  }
		}
		/*
		function callback(results, status) {
	        if (status === google.maps.places.PlacesServiceStatus.OK) {
	        	
	          for (var i = 0; i < results.length; i++) {
	        	createMarker(results[i], results[i].name, results[i].vicinity);
	          }
	        }
	    }
	    */  
	    function createMarker(place, storeName, storeAddress) {
			var placeLoc = place.geometry.location;
		    var marker = new google.maps.Marker({
		      map: map,
		      position: place.geometry.location
		    });
		    var request = { reference: place.reference };
		    service.getDetails(request, function(place, status) {
		      google.maps.event.addListener(marker, 'click', function() {
		        resultsWindow.setContent(createInfoWindowContent(storeName, storeAddress));
		        resultsWindow.open(map, this);
		      });
		    });

	    }
	     
		function createInfoWindowContent(storeName, storeAddress) {
			var content = 
				'<table border="0" style="width: 100%">' +
					'<tr>' +
						'<td align="center">' + storeName + '</td>' +
					'</tr>' +
					'<tr>' +
						'<td align="center">' + storeAddress + '</td>'+
					'</tr>' +
					'<tr>'+
					'<td align="center">'+'<a href="https://www.google.com/maps/place/'+ storeAddress + '" target="_blank">&nbsp;(view directions)</a></td>' +
					'</tr>' +
				'</table><br>' +
				'<a href="/src/view_deals.php"><button type="button" class="btn btn-primary center-block" >View deals at ' + storeName + '</button></a>';
				
			return content;
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

<body onload="checkCookie();">

	<!-- top navigation bar -->
	<?php $page='index'; include('navigation_header.php'); ?>

	<!-- page contents -->
	<div class="container-fluid">

        <h2 class="animated fadeInLeft textBlue title-bar">Deals Near You</h2>
        
	    <div class="row animated fadeInRight" id="canvas">

            <div class="col-md-10 col-xs-12" id="mapContainer">
    			<div id="card" class="card">
			    	<div id="card-title" >
			        	<p>&nbsp;Search elsewhere</p>
			        </div>
			    	<div id="card-content">
			     		<input type="text" id="card-input" placeholder="Enter a location">
			     	</div>
			    </div>
    			<!-- begin map -->
    			<div id="map"></div>
    			<!-- end map -->
            </div>
            
            <div class="sideBar bg-info col-md-2 col-xs-12">
            	<div class="sideBarButtons">
	                <div class="col-md-12">
	                    <button type="button" class="myColor btn btn-primary btn-block" onclick="location.href ='/src/search.php'">Search deals</button>
	                </div>
	                <div class="col-md-12">
	                    <button type="button" class="myColor btn btn-primary btn-block" onclick="location.href ='/src/view_deals.php'">View deals</button>
	                </div>
                </div>
            </div>
		
			
	    </div>

		<!-- featured deals?/new deals? row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header animated fadeInRight textBlue" id="feature-title">Featured Deals Today</h3>
            </div>
            
            <div class="container features animated fadeInLeft">
	            <div class="col-sm-4">
	                <a href="https://www.belmontbev.com/about-belmont/our-newspaper-ads/" target="_blank">
	                    <img src="https://media.licdn.com/mpr/mpr/shrink_200_200/AAEAAQAAAAAAAAM6AAAAJDhmN2YzOWQ5LWMyODAtNGUzMi04MzEyLTFhNDUwMTBlMTg4MA.png" class="img-responsive feature-deal" alt="Belmont Beverages">
	                </a>
	            </div>
	            
	            <div class="col-sm-4">
	                <a href="http://www.capncork.com/specials/" target="_blank">
	                    <img src="http://www.capncork.com/wp-content/uploads/2014/05/2.jpg" class="img-responsive feature-deal" alt="Cap 'n' Cork">
	                </a>
	            </div>
	
	            <div class="col-sm-4">
	                <a href="http://www.svliquors.com/sales-ad.html" target="_blank">
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
