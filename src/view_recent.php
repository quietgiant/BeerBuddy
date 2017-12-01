<?php 

  session_start();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Recent Deals</title>

    <!-- boostrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <!-- animate on scroll css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css" type="text/css" />
    <!-- custom styles -->
    <link href="/res/styles/navigation_header.css" rel="stylesheet">
    <link href="/res/styles/view_recent.css" rel="stylesheet">

  </head>

  <body>
  
    <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='search'; include('navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='search'; include('navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents -->
    <div class="container-fluid">

      <!-- recent deals content -->
      <div class="container-fluid">
        
        <h2 class="animated fadeIn textBlue title-bar">Recent deals</h2>
        <div id="recentDealsFeed"><!-- feed of recent deals --></div>

      </div>

    </div>

    <!-- footer -->
    <?php $page='view'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- animate on scroll js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css" type="text/css" />
    <!-- feed js -->
    <script type="text/javascript" src="/src/js/view_recent.js"></script>

  </body>

</html>
