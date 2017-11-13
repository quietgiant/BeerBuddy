<?php
  // if form was submitted, check for error    
  if (isset($_POST["signup"])) {
    
    if (empty($_POST["name"]) ||
    	empty($_POST["email"]) || 
      empty($_POST["password1"]) ||
      empty($_POST["password2"]) ||
      empty($_POST["gender"]) || 
      empty($_POST["year"]) ||
      empty($_POST["agreement"])) {
        $error = true;
      }
      
  }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="/res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Register</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- datepicker css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="/res/styles/navigation_header.css" rel="stylesheet">
    <!-- Facebook API Key: 149958958929937 -->
    <style>
      .mytext{
        color:#FFD600;
          background-color: #4582ec;
      }

    </style>
  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='register'; include('navigation_header.php'); ?>

    <!-- page contents-->
    <div class="container-fluid">

      <!-- register form -->
      <div class="container-fluid" style="margin-left:auto; margin-right:auto;">
        <form data-toggle="validator" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" role="form" id="registerForm">
          <h2 class="form-heading">Create new account</h2>

          <!-- email address -->
          <div class="form-group">
              <label for="email" class="control-label">Email address</label>
              <div class="input-group">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-envelope"></span></span>
                <?php if (isset($_POST["email"])): ?>
                  <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($_POST["email"]) ?>" data-error="Check that address!" required>
                <?php else: ?>
                  <input type="email" class="form-control" id="email" placeholder="Your email address" data-error="Check that address!" required>
                <?php endif ?>                
              </div>
              <div class="help-block with-errors"></div>
          </div>

          <!-- display name -->
          <div class="form-group has-feedback">
              <label for="inputName" class="control-label">Display name (used for posts)</label>
              <div class="input-group">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
                <input type="text" pattern="^[_A-z0-9 ]{1,}$" maxlength="20" class="form-control" id="inputName" placeholder="Your display name" required>
              </div>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors"></div>
            </div>

            <!-- datepicker for user's birthday -->
            <div class="form-group">
              <label class="control-label" for="dob">Birthday</label>
			        <div class="input-group date" id="dob" data-provide="datepicker">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-th"></span></span>
                <input type="text" class="form-control" placeholder="Your birthday">
              </div>
            </div>

          <!-- password entry 1 -->
          <div class="form-group">
            <label for="inputPassword" class="control-label">Password</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>

          <!-- password entry 2 -->
          <div class="form-group">
            <label for="inputPasswordConfirm" class="control-label">Password</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <input type="password" data-minlength="6" class="form-control" id="inputPasswordConfirm" placeholder="Password (one more time)" data-match="#inputPassword" data-match-error="Whoops, your passwords don't match!" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
          
          <!-- submit form button -->
          <div class="form-group">
            <button class="btn btn-md btn-primary btn-block" id="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Sign up&nbsp;<span class="glyphicon glyphicon-new-window"></span></button>
          </div>

          <!-- clear form button -->
          <div class="form-group">
              <button class="btn btn-md btn-primary btn-danger btn-block" id="clearButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
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
    <!-- validator js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>

</body>

</html>
