<?php

  /* for dev
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  */

  session_start();

  if (isset($_POST["inputEmail"]) && isset($_POST["inputPassword"])) {
    login();
  }

  function login()
  {

    require_once('controller/db_connection.php');

    $connection = connect_to_db();
    $postEmail = htmlspecialchars($_POST["inputEmail"]);
    $postPass = htmlspecialchars($_POST["inputPassword"]);

    $sql = sprintf("SELECT * FROM user_data WHERE email='$postEmail';");
    $result = $connection->query($sql) or die(mysqli_error());     

    // check if email was found
    if ($result->num_rows == 1)
    {
      $row = $result->fetch_assoc();
      if (password_verify($postPass, $row['password'])) {
        // authenicate user and redirect
        $_SESSION["authenticated"] = true;
        $connection->close();
        header("Location: index.php");
        exit;
      }
      
    } else {
      echo ('<div style="color: red; text-align: center; font-size: 32px;">Invalid login credentials! Please try again.</div>');
    }
    
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="/res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sign in</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    
    <link href="/res/styles/navigation_header.css" rel="stylesheet">
    <!-- Facebook API Key: 149958958929937 -->


  </head>

  <body>

    <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='login'; include('navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='login'; include('navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents-->
    <div class="container-fluid">

      <!-- login form -->
      <div class="container-fluid" style="margin-left:auto; margin-right:auto;">
        <form class="form-signin" id="loginForm" name="loginForm" action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">
          <h2 class="form-heading textBlue title-bar">Sign in</h2>
          <div class="form-group">
            <label class="control-label " for="email">Email address</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
              <?php if (isset($_POST["inputEmail"])): ?>
                <input type="email" id="email" name="inputEmail" class="form-control " value="<?= htmlspecialchars($_POST["inputEmail"]) ?>" required>
              <?php else: ?>
                <input type="email" id="email" name="inputEmail" class="form-control " placeholder="Email address" required autofocus>
              <?php endif ?>  
            </div>
          </div>
          <div class="form-group ">
            <label class="control-label " for="pass">Password</label>
            <div class="input-group">
              <span class="mytext input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <?php if (isset($_POST["inputEmail"])): ?>
                <input type="password" id= "pass" name="inputPassword" class="form-control" placeholder="Password" required autofocus>
              <?php else: ?>
                <input type="password" id= "pass" name="inputPassword" class="form-control" placeholder="Password" required>
              <?php endif ?> 
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-md btn-primary btn-block" id="submitButton" name="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Sign in&nbsp;<span class="glyphicon glyphicon-log-in"></span></button>
          </div>
          <div class="form-group">
              <button class="btn btn-md btn-primary btn-danger btn-block" id="clearButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
          </div>
          <div class="form-group text-center ">
            <p>Forgot your password? <a href="/src/help/recoverPassword.php ">Click here</a></p>
            <p>New user? <a href="/src/register.php ">Make a new account</a></p>
          </div>
        </form>
      </div>

    </div>

    <!-- footer -->
    <?php $page='login'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- clear form script -->
    <script>
  		$('#clearButton').click(function(){
          	$('#loginForm')[0].reset();
   		});
	</script>

  </body>

</html>
