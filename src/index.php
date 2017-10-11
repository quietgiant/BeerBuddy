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
	<!-- jasny bootstrap css -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
	<!-- custom styles -->
	<link href="../res/styles/index.css" rel="stylesheet">
	<link href="../res/styles/navigation_header.css" rel="stylesheet">
	<link href="../res/styles/sidebar.css" rel="stylesheet">
	<!-- google maps api key: AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8 -->
	<style type="text/css">
        	  #map {
          width:40%;
          height:300px;
          margin-left: 80px;
        }
	</style>
	<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;

      function initMap() {
       var pyrmont = {lat: 0, lng: 0};
       if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
           pyrmont = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
          });

        } 
        console.log(pyrmont);
        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 15
        });

        infowindow = new google.maps.InfoWindow();
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
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
</head>

<body>

	<!-- top navigation bar -->
	<?php $page='index'; include('navigation_header.php'); ?>

	<!-- page contents -->
	<div class="container-fluid">
	    
	    <div class="row" style="margin-top:-20px;">

			<div id="search"> 

			</div>

			<!-- begin map -->
			<div id="map"></div>
<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_jpR5OsONNoj9ZB-YzRuK9d4TEKwLUx4&libraries=places&callback=initMap" async defer ></script>
			<!-- end map -->
			
			<div class="navmenu navmenu-default offcanvas">
			  <a class="navmenu-brand" href="#">Filter results</a>
			  <ul class="nav navmenu-nav">
			    <li><a href="../navmenu/">Type</a></li>
			    <li class="active"><a href="./">Brand</a></li>
			    <li><a href="../navmenu-reveal/">Name</a></li>
			    <li><a href="../navbar-offcanvas/">Price</a></li>
			  </ul>
			</div>

			<div class="navbar navbar-default">
				<button type="button" id="sidebar" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="#map">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

	    </div>

		<!-- Related Projects Row -->
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
	<!-- jasny bootstrap js -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
  <script type="text/javascript" src="../res/scripts/modalResponse.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
	    	//loads the modal on page load
      // $.ajax({
      //   url: 'modal.html',
      //   dataType: 'text',
      //   success: function(result) {
      //     $('body').append(result);
      //     $('#ageModal').modal({
      //       backdrop: 'static',
      //       keyboard: false  // to prevent closing with Esc button (if you want this too)
      //     });
      //   $('#ageModal').modal('show');
      // }
      // });
      openAgeModal();
	});

</script>
</body>

</html>
