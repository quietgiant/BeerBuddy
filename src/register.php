<?php

  /* for dev
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  */

  session_start();
  
  if (isset($_POST['inputEmail']) && isset($_POST['inputUsername']) && isset($_POST['inputPassword'])) {
    register_user();
  }


  function register_user()
  {
    
    require_once('controller/db_connection.php');
    $connection = connect_to_db();
    $postEmail = htmlspecialchars($_POST["inputEmail"]);
    $postUser = htmlspecialchars($_POST["inputUsername"]);

    // check for duplicate username
    $sql = sprintf("SELECT 1 FROM user_data WHERE username='$postUser';");
    $userCheck = $connection->query($sql) or die(mysqli_error());

    // check for duplicate email 
    $sql = sprintf("SELECT 1 FROM user_data WHERE email='$postEmail';");
    $emailCheck = $connection->query($sql) or die(mysqli_error());

    if ($userCheck->num_rows == 1) {
      echo ('<div style="color: red; text-align: center; font-size: 32px;">Username is already in use! Please try a different username.</div>');
    } else if ($emailCheck->num_rows == 1) {
      echo ('<div style="color: red; text-align: center; font-size: 32px;">Email is already in use! Please try a different email address.</div>');
    } else {

      $hashPass = password_hash(htmlspecialchars($_POST["inputPassword"]), PASSWORD_DEFAULT);

      $sql = sprintf("INSERT INTO user_data (email, username, password) VALUES ('$postEmail', '$postUser', '$hashPass');");

      // execute query
      $result = $connection->query($sql) or die(mysqli_error($connection));  

      if ($result === false) {
        die("Could not query database");
      } else {
        $connection->close();
        header("Location: login.php");
        exit;
      }

    }
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="/res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign up</title>

    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- datepicker css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="/res/styles/navigation_header.css" rel="stylesheet">
    <!-- Facebook API Key: 149958958929937 -->

  </head>

  <body>

    <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='register'; include('navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='register'; include('navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents-->
    <div class="container-fluid">

      <!-- register form -->
      <div class="container-fluid" style="margin-left:auto; margin-right:auto;">
        <form data-toggle="validator" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST" role="form" id="registerForm" name="registerForm">
          <h2 class="form-heading textBlue title-bar">Create a new account</h2>

          <!-- email address -->
          <div class="form-group">
              <label for="inputEmail" class="control-label">Email address</label>
              <div class="input-group">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-envelope"></span></span>
                <?php if (isset($_POST["inputEmail"])): ?>
                  <input type="email" class="form-control" id="inputEmail" name="inputEmail" value="<?= htmlspecialchars($_POST["inputEmail"]) ?>" data-error="Check that address!" required>
                <?php else: ?>
                  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your email address" data-error="Check that address!" required>
                <?php endif ?>                
              </div>
              <div class="help-block with-errors"></div>
          </div>

          <!-- user name -->
          <div class="form-group has-feedback">
              <label for="inputUsername" class="control-label">Username (used for posts)</label>
              <div class="input-group">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
                <?php if (isset($_POST["inputUsername"])): ?>
                  <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="20" class="form-control" id="inputUsername" name="inputUsername" value="<?= htmlspecialchars($_POST["inputUsername"]) ?>" required>
                <?php else: ?>
                  <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="20" class="form-control" id="inputUsername" name="inputUsername" placeholder="Your username" required>
                <?php endif ?>
              </div>
              <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
              <div class="help-block with-errors"></div>
            </div>

            <!-- datepicker for user's birthday 
            <div class="form-group">
              <label class="control-label" for="dob">Birthday</label>
			        <div class="input-group date" id="dob" data-provide="datepicker">
                <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-th"></span></span>
                <input type="text" class="form-control" placeholder="Your birthday">
              </div>
            </div> -->

          <!-- password entry 1 -->
          <div class="form-group">
            <label for="inputPassword" class="control-label">Password</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <input type="password" data-minlength="2" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>

          <!-- password entry 2 -->
          <div class="form-group">
            <label for="inputPasswordConfirm" class="control-label">Retype Password</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <input type="password" data-minlength="2" class="form-control" id="inputPasswordConfirm" name="inputPassword" placeholder="Password (one more time)" data-match="#inputPassword" data-match-error="Whoops, your passwords don't match!" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
          
          <!-- submit form button -->
          <div class="form-group">
            <button class="btn btn-md btn-primary btn-block" id="submitButton" name="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Sign up&nbsp;<span class="glyphicon glyphicon-new-window"></span></button>
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
