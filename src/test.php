<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Post Deal</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">
    <link href="../res/styles/post.css" rel="stylesheet">
    <!-- AnimateCSS css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <!-- boostrap slider css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- boostrap combo-box css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-combobox/1.1.8/css/bootstrap-combobox.min.css" rel="stylesheet">
    
    <style>
        #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
    </style>
  
  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='post'; include('navigation_header.php'); ?>

    <!-- page contents -->
    <div class="container-fluid" style="margin-bottom: 20px;">

      <h1 style="text-align: center; font-size: 3em">Post a deal&nbsp;<span class="glyphicon glyphicon-map-marker"></span></h1>

  
  			<!-- enter drink information form -->
  		  <div class="container-fluid formBox col-xs-12 col-md-5">
      		<fieldset>
        		<legend>Enter bottle name and price</legend>
  			    <form data-toggle="validator" role="form" id="manualForm">
			          
                <!-- liquor type field -->
                <div class="form-group">
                  <label for="inputType" class="control-label">Type of liquor:</label>
                  <select class="combobox form-control" id="inputType" name="inputType">
                    <option></option>
                    <option value="all">ALL</option>
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
                <div class="form-group">
                  <label for="inputBrand" class="control-label">Brand:</label>
                  <div class="input-group">
			            	<span class="input-group-addon"><span class="glyphicon glyphicon-copyright-mark"></span></span>
                    <input type="text" class="form-control" id="inputBrand" name="inputBrand" placeholder="Brand of liquor">
                  </div>
                </div>

                <!-- name field -->
                <div class="form-group">
                  <label for="inputName" class="control-label">Name of drink:</label>
                  <div class="input-group">
			            	<span class="input-group-addon"><span class="glyphicon glyphicon-glass"></span></span>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name of liquor">
                  </div>
                </div>
                
                <!-- price field -->
                <div class="form-group">
			          	<label for="inputPrice" class="control-label">Price:</label>
			            <div class="input-group">
			            	<span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                		<input type="text" class="form-control" id="inputPrice" name="inputPrice" placeholder="Price of your bottle">
			          	</div>
			          </div>

			          <!-- location field -->
			     <div class="form-group">
                  <label for="inputLocation" class="control-label">Purchase location:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                    <input type="text" class="form-control" id="inputLocation" name="inputLocation" placeholder="Where did you get it?">
                  </div>
                </div>
                
                <div class="form-group">
                    <div id="locationField">
                      <input id="autocomplete" placeholder="Enter your address"
                             onFocus="geolocate()" type="text"></input>
                    </div>
                </div>
                
			        </form>
      			</fieldset>
    			</div>

		<div class="col-xs-12 col-md-2">
			<div class="container-fluid middleBox">
				<h2>or</h2>
			</div>
		</div>

		<!-- enter drink upc form -->
				<div class="container-fluid formBox col-xs-12 col-md-5">
    			<fieldset>
        			<legend>Enter drink UPC and price</legend>
        			
			        <form data-toggle="validator" role="form" id="upcForm">
			          
			          <!-- UPC field -->
			          <div class="form-group">
				        	<label for="inputUPC" class="control-label">UPC:</label>
				          <div class="input-group">
				            <span class="input-group-addon"><span class="glyphicon glyphicon-barcode"></span></span>
	                	<input type="text" class="form-control" id="inputUPC" name="inputUPC" placeholder="Barcode on your bottle">
				          </div>
			          </div>
			          <div class="form-group">
				          <div class="form-group text-center">
	        					<p><a href="#">What is a UPC code?</a></p>
	        				</div>
        				</div>
        				
        				<!-- price field -->
        				<div class="form-group">
				          <label for="inputPriceUPC" class="control-label">Price:</label>
				          <div class="input-group">
				            <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
	                	<input type="text" class="form-control" id="inputPriceUPC" name="inputPriceUPC" placeholder="Price of your bottle">
				          </div>
			          </div>
			          
			          <!-- location field -->
		          	<div class="form-group">
                  <label for="inputLocationUPC" class="control-label">Purchase location:</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
                    <input type="text" class="form-control" id="inputLocationUPC" name="inputLocationUPC" placeholder="Where did you get it?">
                  </div>
                </div>
                
			        </form>
      			</fieldset>
    			</div>

		</div>
		

		  <!-- submit form button -->
        <div class="form-group">
        	<button class="btn btn-md btn-primary btn-block" id="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Submit post&nbsp;<span class="glyphicon glyphicon-send"></span></button>
        </div>

        <!-- clear form button -->
        <div class="form-group">
            <button class="btn btn-md btn-primary btn-danger btn-block" id="clearButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
        </div>
    
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
    <!-- post js -->
    <script type="text/javascript" src="js/post.js"></script>
    <!-- init combo-box script -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.combobox').combobox();
      });
    </script>
    <script>

      var placeSearch, autocomplete;

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWvn1C-4qZbAUdR-QwiBqe-BX1WDMA8&libraries=places&callback=initAutocomplete"
        async defer></script>

  </body>

</html>