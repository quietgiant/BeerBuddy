<?php

  session_start();
  
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Quickstart</title>

    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">

  </head>

  <body>
  
        <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='help'; include('../navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='help'; include('../navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents -->
    <div class="container-fluid">

      <!-- about us -->
      <div class="container-fluid">
        
        <h1 class = "textBlue title-bar">Quickstart</h1>
        <p>First, <a href="/src/register.php">sign up for a new account</a> if you don't already have one.</p>
        <p>description of things to get new users going</p>

      </div>

    </div>

    <!-- footer -->
    <?php $page='help'; include('../footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
