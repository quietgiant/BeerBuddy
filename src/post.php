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

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='post'; include('navigation_header.php'); ?>

    <!-- page contents -->

    <div class="container-fluid">

    	<h1 style="text-align: center; font-size: 3em">Post a Price&nbsp;<span class="glyphicon glyphicon-glass"></span></h1>

    	<!-- split page into two sides, left and right -->
		<div class="modal-body row">

			<!-- enter drink information form -->
  			<div class="col-md-5">
    			<div class="container-fluid formBox">
    				<fieldset>
	    				<legend>Enter drink information</legend>
	    				<p>Enter information on the drink you just bought.</p>
						<form data-toggle="validator" role="form" id="manualForm">

							<!-- alcohol name -->
							<div class="form-group">
					        	<label for="alcoholName" class="control-label">Name:</label>
					        	<div class="input-group">
					        		<input list="bottleName" name="bottleName" class="form-control" spellcheck="false">
					            	<datalist id="bottleName">
					            		<option value="KNOB CREEK BOURBON 9YR 100P 375ML"></option>
					            		<option value="KNOB CREEK BOURBON 9YR 100P 1.75L"></option>
					            	</datalist>
					            </div>
					        </div>

					        <!-- price -->
					        <div class="form-group ">
					            <label for="price" class="control-label">Price:</label>
					            <div class="input-group">
					            	<input type="text" maxlength="6" class="form-control" id="price" placeholder="Price you paid for your bottle">
					          	</div>
					        </div>

				        </form>
			        </fieldset>
      			</div>
  			</div>

			<div class="col-md-2">
				<div class="container-fluid middleBox">
					<h2>or</h2>
				</div>
			</div>

			<!-- enter drink upc form -->
  			<div class="col-md-5">
  				<div class="container-fluid formBox">
	    			<fieldset>
	        			<legend>Enter drink UPC</legend>
	        			<p>We'll take care of the rest.</p>
				        <form data-toggle="validator" role="form" id="upcForm">
				        	<label for="inputUPC" class="control-label">UPC:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-barcode"></span></span>
	                			<input type="text" class="form-control" id="inputUPC" placeholder="Enter the barcode on your bottle">
				          	</div>
				          	<div class="form-group text-center">
	        					<p><a href="#">What is a UPC code?</a></p>
	        				</div>
				          	<label for="inputUPC" class="control-label">Price:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-usd"></span></span>
	                			<input type="text" class="form-control" id="inputPrice" placeholder="Enter the price of your bottle">

				          	</div>
				          	<br/>
				        </form>
	      			</fieldset>
      			</div>
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
    <!-- clear form script -->
      <script>
    	$('#clearButton').click(function(){
              $('#manualForm')[0].reset();
              $('upcForm')[0].reset();
    		});
    </script>

  </body>

</html>
