<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- datepicker css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">
    <!-- Facebook API Key: 149958958929937 -->

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='register'; include('navigation_header.php'); ?>

    <!-- page contents-->
    <div class="container-fluid">

      <!-- register form -->
      <div class="container-fluid" style="margin-left:auto; margin-right:auto;">
        <form class="form-signin" id="registerForm">
          <h2 class="form-signin-heading">Create new account</h2>
          <div class="form-group">
            <label class="control-label" for="email" class="sr-only ">Email address</label>
            <input type="email" id="email " class="form-control " placeholder="Email address " required autofocus>
          </div>
          <div class="form-group">
            <label class="control-label" for="displayName " class="sr-only ">Display name (used for posts)</label>
            <input type="text" id="displayName " class="form-control " placeholder="Your display name" required>
          </div>
          <div class="form-group">
            <label class="control-label " for="dob" class="sr-only ">Birthday</label>
			<div class="input-group date" id="dob" data-provide="datepicker">
			    <input type="text" class="form-control" placeholder="Your birthday">
			    <div class="input-group-addon">
			        <span class="glyphicon glyphicon-th"></span>
			    </div>
			</div>
          </div>
          <div class="form-group ">
            <label class="control-label " for="pass" class="sr-only ">Password</label>
            <input type="password" id="pass " class="form-control " placeholder="Password " required>
          </div>
          <div class="form-group">
            <label class="control-label " for="confirmPass" class="sr-only ">Confirm password</label>
            <input type="password" id="confirmPass" class="form-control " placeholder="Password (one more time)" required>
          </div>
          <div class="form-group">
            <button class="btn btn-md btn-primary btn-block" id="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit"><span class="glyphicon glyphicon-new-window"></span>&nbsp;Sign up</button>
          </div>
          <div class="form-group">
              <button class="btn btn-md btn-primary btn-danger btn-block" id="clearButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset"><span class="glyphicon glyphicon-trash"></span>&nbsp;Clear</button>
          </div>
          <div class="form-group text-center ">
            <p>Already have an account? <a href="/src/login.php">Click here</a></p>
          </div>
        </form>
      </div>

    </div>

    <!-- footer -->
    <?php $page='register'; include('footer.php'); ?>


    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- datepicker for bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
	<!-- date picker for birthday options -->
	<script>
		$('#dob').datepicker({
			autoclose: true
		});
	</script>
	<!-- clear form script -->
    <script>
		$('#clearButton').click(function(){
            $('#registerForm')[0].reset();
 		});
	</script>

  </body>

</html>
