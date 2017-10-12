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
	<!-- api key: AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8  -->
	<script type="text/javascript" src="js/maps.js"></script>
	<script type="text/javascript" src="js/geolocation-marker.js"></script>
	<script type="text/javascript">
		var map, infoWindow;
		function initMap() {
		  map = new google.maps.Map(document.getElementById('map'), {
		    center: { lat: 41.0793, lng: -85.1394 },
		    zoom: 14
		  });
		  
			infoWindow = new google.maps.InfoWindow;

	     	// Try HTML5 geolocation.
	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };

	            infoWindow.setPosition(pos);
	            infoWindow.setContent('Location found.');
	            infoWindow.open(map);
	            map.setCenter(pos);
	            map.setZoom(15);
	          }, function() {
	            handleLocationError(true, infoWindow, map.getCenter());
	          });
	        } else {
	          // Browser doesn't support Geolocation
	          handleLocationError(false, infoWindow, map.getCenter());
	        }
		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
	</script>
	<!-- 21+ modal dialog js -->
	<script type="text/javascript" src="js/modalResponse.js"></script>

</head>

<body onload="initMap();//openAgeModal();">

	<!-- top navigation bar -->
	<?php $page='index'; include('navigation_header.php'); ?>

	<!-- page contents -->
	<div class="container-fluid">
	    
	    <div class="row" style="margin-top:-20px;">

			<div id="search"> 

			</div>

			<!-- begin map -->
			<div id="map"></div>
			<!-- end map -->
			
	    </div>

		<!-- featured deals?/new deals? row -->
        <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Featured deals today</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive featured-deal" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive featured-deal" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive featured-deal" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive featured-deal" src="http://placehold.it/500x300" alt="">
                </a>
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
