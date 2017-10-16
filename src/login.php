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
    <!-- Facebook API Key: 149958958929937 -->

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='login'; include('navigation_header.php'); ?>

    <!-- page contents-->
    <div class="container-fluid">

      <!-- login form -->
      <div class="container-fluid" style="margin-left:auto; margin-right:auto;">
        <form class=" form-signin" id="loginForm">
          <h2 class="form-heading">Sign in</h2>
          <div class="form-group">
            <label class="control-label " for="email">Email address</label>
            <div class="input-group">
              <span class="input-group-addon"><span class=" glyphicon glyphicon-user"></span></span>
              <input type="email" id="email" class="form-control " placeholder="Email address" required autofocus>
            </div>
          </div>
          <div class="form-group ">
            <label class="control-label " for="pass">Password</label>
            <div class="input-group">
              <span class="input-group-addon"><span class=" glyphicon glyphicon-lock"></span></span>
              <input type="password" id= "pass" class="form-control" placeholder="Password" required>
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-md btn-primary btn-block" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Sign in&nbsp;<span class="glyphicon glyphicon-log-in"></span></button>
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
