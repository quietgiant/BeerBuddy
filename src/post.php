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
<script type="text/javascript">
$(document).ready(function(){
    // Defining the local dataset
    var cars = ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen'];
    
    // Constructing the suggestion engine
    var cars = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace,
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: cars
    });
    
    // Initializing the typeahead
    $('.typeahead').typeahead({
        hint: true,
        highlight: true, /* Enable substring highlighting */
        minLength: 1 /* Specify minimum characters required for showing result */
    },
    {
        name: 'cars',
        source: cars
    });
});  
</script>
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
	        			<legend>Enter bottle name and price</legend>
				        <form data-toggle="validator" role="form" id="upcForm">
				        	<label for="inputName" class="control-label">Bottle Name:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-text"></span></span>
	                			<input type="text" class="form-control" id="inputName" placeholder="Enter the name on your bottle">
				          	</div><br/><br/>
				          	<label for="inputNamePrice" class="control-label">Price:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-usd"></span></span>
	                			<input type="text" class="form-control" id="inputNamePrice" placeholder="Enter the price of your bottle">

				          	</div>
				          	<br/>
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
	        			<legend>Enter drink UPC and a price</legend>
				        <form data-toggle="validator" role="form" id="upcForm">
				        	<label for="inputUPC" class="control-label">UPC:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-barcode"></span></span>
	                			<input type="text" class="form-control" id="inputUPC" placeholder="Enter the barcode on your bottle">
				          	</div>
				          	<div class="form-group text-center">
	        					<p><a href="#">What is a UPC code?</a></p>
	        				</div>
				          	<label for="inputUPCPrice" class="control-label">Price:</label>
				            <div class="input-group">
				            	<span class="input-group-addon"><span class=" glyphicon glyphicon-usd"></span></span>
	                			<input type="text" class="form-control" id="inputUPCPrice" placeholder="Enter the price of your bottle">

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
