<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign in</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='improve'; include('../navigation_header.php'); ?>

    <!-- page contents-->
    <div class="container-fluid">

  		<!-- suggestion post -->
  		<div class="container-fluid" style="width:700px; margin-left:auto; margin-right:auto;>
  			<form class="form-vertical">
  				<div class="form-group">
  					<label class="control-label">How can we make BeerBuddy better for you?</label>
  					<textarea class="form-control" rows="10" id="comment"></textarea>
  				</div>
  				<button class="btn btn-lg btn-primary btn-block " style="width:250px; margin-left:auto; margin-right:auto;" type="submit ">Submit&nbsp;<span class="glyphicon glyphicon-send"></span></button>
  			</form>
  		</div>
      
  	</div>

    <!-- footer -->
    <?php $page='improve'; include('../footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
