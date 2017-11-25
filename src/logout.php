<?php 

    session_start();

    // delete cookies
    setcookie("user", "", time() - 3600);
    setcookie("pass", "", time() - 3600);

    // log user out
    setcookie(session_name(), "", time() - 3600);
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="page icon" href="../res/img/beer.ico" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<META http-equiv="refresh" content="3;URL=/src/index.php">

	<title>BeerBuddy</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
	<!-- bootstrap core css -->
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
	<!-- font awesome css-->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>


	<!-- page contents -->
	<div class="container-fluid">	
        <h1>Logging you out...</h1>
        <h3>Redirecting you <a href="/src/index.php">home</a> in 3 seconds...</h3>
	</div>

	<!-- jQuery core js -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<!-- bootstrap core js -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
