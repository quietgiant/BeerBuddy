<?php 

	session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="page icon" href="/res/img/beer.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>BeerBuddy</title>

	<!-- boostrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
	<!-- animate css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
	<!-- custom styles -->
	<link href="/res/styles/index.css" rel="stylesheet">
	<link href="/res/styles/navigation_header.css" rel="stylesheet">
	<link href="/res/styles/feed.css" rel="stylesheet">
	<!-- google api key: AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8  -->
	<!-- custom google maps js -->
	<script type="text/javascript" src="/src/js/mapService.js"></script>
	<!-- 21+ modal dialog js -->
	<script type="text/javascript" src="/src/js/modalResponse.js"></script>

</head>

<body onload="checkCookie();">

	<!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='index'; include('navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='index'; include('navigation_header.php'); ?>
    <?php endif ?>

	<!-- page contents -->
	<div class="container-fluid">

        <h2 class="animated fadeInLeft textBlue title-bar">Deals near you</h2>
        
	    <div class="row animated fadeInRight" id="canvas">

            <div class="col-xs-12" id="mapContainer">
    			<!--<div id="card" class="card">
			    	<div id="card-title" >
			        	<p>&nbsp;Search elsewhere</p>
			        </div>
			    	<div id="card-content">
			     		<input type="text" id="card-input" placeholder="Enter a location">
			     	</div>
			    </div>-->
    			<!-- begin map -->
    			<div id="map"></div>
    			<!-- end map -->
            </div>
            
            <!--
            <div class="sideBar bg-info col-md-2 col-xs-12">
            	<div class="sideBarButtons">
	                <div class="col-md-12 col-xs-6">
	                    <a href="/src/search.php"><button type="button" class="myColor btn btn-primary btn-block">Search deals</button></a>
	                </div>
	                <div class="col-md-12 col-xs-6">
	                    <a href="/src/view_recent.php"><button type="button" class="myColor btn btn-primary btn-block">View deals</button></a>
	                </div>
                </div>
            </div>
        	-->
		
			
	    </div>
	    
		<h3 class="page-header animated fadeInRight textBlue" id="feature-title">Latest deals today</h3>
		<!-- featured deals row -->
        <div class="row" id="recentDealsFeed">
        	<!-- feed of 3 recent deals -->
        </div>

	</div>

	<!-- footer -->
	<?php $page='index'; include('footer.php'); ?>

	<!-- jQuery core js -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- bootstrap core js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- google maps js api -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8&libraries=places&callback=initMap" async defer></script>
	<!-- sweetalert js -->
  <script src="https://unpkg.com/sweetalert2@7.0.6/dist/sweetalert2.all.js"></script>
	<!-- get recent deals js -->
	<script type="text/javascript" src="/src/js/view_recent.js"></script>
	
</body>

</html>
