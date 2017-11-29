<?php

  /* for dev
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  */

  session_start();
  
  // check for which form was submitted
  if (isset($_POST['inputType']) && isset($_POST['inputName']) && isset($_POST['inputPrice']) && isset($_POST['inputLocation'])) {
      if (validate_user_logged_in()) {
        post_drink_manual();
      }
  } else if (isset($_POST['inputUPC']) && isset($_POST['inputPriceUPC']) && isset($_POST['inputLocationUPC'])){
      if (validate_user_logged_in()) {
        post_drink_upc();
      }
  } else {
    
  }

  function post_drink_manual() {

    require_once('controller/db_connection.php');
    $connection = connect_to_db();
    $user_id = (int)$_SESSION["user_id"];
    $alcoholType = mysqli_real_escape_string($connection, $_POST["inputType"]);
    $alcoholName = mysqli_real_escape_string($connection, $_POST["inputName"]);
    $alcoholName = ucwords($alcoholName);
    $alcoholPrice = (float)mysqli_real_escape_string($connection, $_POST["inputPrice"]);
    // add format price above to ensure xx.xx pattern ^^
    $storeName = mysqli_real_escape_string($connection, $_SESSION["storeName"]);
    $locationAddress = mysqli_real_escape_string($connection, $_SESSION["purchaseAddress"]);
    $locationCity = mysqli_real_escape_string($connection, $_SESSION["purchaseCity"]);
    $locationState = mysqli_real_escape_string($connection, $_SESSION["purchaseState"]);

    $sql = sprintf("INSERT INTO deal_posts (user_id, alcohol_type, drink_name, price, store_name, address, city, state, date) VALUES ('$user_id', '$alcoholType', '$alcoholName', '$alcoholPrice', '$storeName', '$locationAddress', '$locationCity', '$locationState', NOW());");

    // execute query
    $result = $connection->query($sql) or die(mysqli_error($connection));  

    if ($result === false) {
      die("Could not query database");
    } else {
      $connection->close();
      notify_success();
      header("Location: view_recent.php");
      exit;
    }

  }

  function post_drink_upc() {

    require_once('controller/db_connection.php');
    $connection = connect_to_db();
    echo ('<div style="color: red; text-align: center; font-size: 32px;">upc does not work yet... sorry!</div>');
  }

  function validate_user_logged_in() {
    if (isset($_SESSION['authenticated'])) {
      return true;
    } else {
      echo ('<div style="color: red; text-align: center; font-size: 32px;">You must be signed in to post a deal!</div>');
      return false;
    }
  }

  function notify_success() {
    return true;
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Post Deal</title>
    
    <!-- bootstrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
	  <!-- animate css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <!-- boostrap slider css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- boostrap combo-box css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-combobox/1.1.8/css/bootstrap-combobox.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">
    <link href="../res/styles/post.css" rel="stylesheet">
    
    <!-- google establishments (liquor stores) autocomplete js -->
    <script type="text/javascript">
      function initMap() {
        var input = document.getElementById('inputLocation');
        var options = {
          types: ['establishment'],
          strictBounds: true
        };

        var autocomplete = new google.maps.places.Autocomplete(input, options);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          setAddressVariables(place);
        });
      }
      
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>

  </head>

  <body>

    <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='post'; include('navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='post'; include('navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents -->
    <div class="container-fluid" style="margin-bottom: 20px;">

      <h1 class="animated jello textBlue title-bar" style="text-align: center; font-size: 3em">Post a deal&nbsp;<span class="glyphicon glyphicon-map-marker textGold"></span></h1>

  			<!-- enter drink information form -->
        <form data-toggle="validator" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" role="form" id="manualForm" name="manualForm">
  		  <div class="container-fluid formBox animated bounceInLeft">
      		<fieldset>
        		<legend>Enter drink information</legend>
			          
                <!-- alcohol type field -->
                <div class="form-group">
                  <label for="inputType" class="control-label" >Type of alcohol:</label>
                  <select class="combobox form-control" id="inputType" name="inputType" required>
                    <option></option>
                    <option value="beer">Beer</option>
                    <option value="brandy">Brandy</option>
                    <option value="gin">Gin</option>
                    <option value="liqueur">Liqueur</option>
                    <option value="rum">Rum</option>
                    <option value="tequila">Tequila</option>
                    <option value="vodka">Vodka</option>
                    <option value="whiskey">Whiskey</option>
                    <option value="wine">Wine</option>
                  </select>
                </div>
                
                <!-- brand field -->
                <!--
                <div class="form-group">
                  <label for="inputBrand" class="control-label">Brand:</label>
                  <div class="input-group">
			            	<span class="mytext input-group-addon"><span class="glyphicon glyphicon-copyright-mark"></span></span>
                    <input type="text" class="form-control typeahead" id="inputBrand" name="inputBrand" placeholder="Brand of liquor">
                  </div>
                </div>
              -->

                  <!-- name field -->
                  <div class="form-group">
                    <label for="inputName" class="control-label">Name of drink:</label>
                    <div class="input-group">
    		            	<span class="mytext input-group-addon"><span class="glyphicon glyphicon-glass"></span></span>
                      <input type="text" class="form-control" id="inputName" name="inputName" autocomplete="off" spellcheck="false" placeholder="What did you get?" required>
                    </div>
                  </div>
                    
                  <!-- price field -->
                  <div class="form-group">
    		          	<label for="inputPrice" class="control-label">Price:</label>
    		            <div class="input-group">
    		            	<span class="mytext input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                  		<input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="How much did you pay?" required>
    		          	</div>
    		          </div>

    		          <!-- location field -->
    		          <div class="form-group">
                    <label for="inputLocation" class="control-label">Purchase location:</label>
                    <div class="input-group">
                      <span class="mytext input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                      <input type="text" class="form-control" id="inputLocation" name="inputLocation" placeholder="Where did you get it?" onFocus="geolocate()" required>
                    </div>
                  </div>
      			</fieldset>
    			</div>
            <!-- submit form button -->
            <div class="form-group">
              <button class="btn btn-md btn-primary btn-block post-button" id="submitButton" name="submitButton" type="submit">Submit post&nbsp;<span class="glyphicon glyphicon-send"></span></button>
            </div>

            <!-- clear form button -->
            <div class="form-group">
                <button class="btn btn-md btn-primary btn-danger btn-block post-button" id="clearButton" name="clearButton" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
            </div>
        </form>
    <!--
		<div class="col-xs-12 col-md-2">
			<div class="container-fluid middleBox">
				<h2 class="textBlue">or</h2>
			</div>
		</div>
  -->

		<!-- enter drink upc form
				<div class="container-fluid formBox col-xs-12 col-md-5 animated bounceInRight">
    			<fieldset>
        			<legend>Enter drink UPC and price</legend>
        			
			        <form data-toggle="validator" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" role="form" id="upcForm" name="upcForm">
			          
			          <!-- UPC field 
			          <div class="form-group">
				        	<label for="inputUPC" class="control-label">UPC:</label>
				          <div class="input-group">
				            <span class="mytext input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	                	<input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="Barcode on your bottle">
				          </div>
			          </div>
			          <div class="form-group">
				          <div class="form-group text-center">
	        					<p><a href="https://www.gtin.info/upc/">What is a UPC code?</a></p>
	        				</div>
        				</div>
        				
        				<!-- price field 
        				<div class="form-group">
				          <label for="inputPriceUPC" class="control-label">Price:</label>
				          <div class="input-group">
				            <span class="mytext input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
	                	<input type="text" class="form-control" id="inputPriceUPC" name="inputPriceUPC" placeholder="How much did you pay?">
				          </div>
			          </div>
			          
			          <!-- location field 
		          	<div class="form-group">
                  <label for="inputLocationUPC" class="control-label">Purchase location:</label>
                  <div class="input-group">
                    <span class="mytext input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                    <input type="text" class="form-control" id="inputLocationUPC" name="inputLocationUPC" placeholder="Where did you get it?">
                  </div>
                </div>
			        </form>
      			</fieldset>
    			</div>
        -->
    
    </div>

    <!-- footer -->
    <?php $page='post'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- validator js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
    <!-- boostrap combo-box js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-combobox/1.1.8/js/bootstrap-combobox.min.js"></script>
    <!-- typeahead js -->
    <script src="/res/lib/typeahead.js"></script>
    <!-- google maps js api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8&libraries=places&callback=initMap" async defer></script>
    <!-- post js -->
    <script type="text/javascript" src="js/post.js"></script>
    
    <!-- init combo-box script -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.combobox').combobox();
      });
    </script>
    
    <!-- init typeahead -->
    <script type="text/javascript">
    $(document).ready(function () {
        $("#inputName").typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/src/controller/typeahead_name.php",
					          data: {
					            "term": query
					          },            
                    dataType: "json",
                    method: "POST",
                    success: function (data) {
						            result($.map(data, function (item) {
							              return item;
                        }));
                    }
                });
            }
        });
    });
  </script>

  </body>

</html>
