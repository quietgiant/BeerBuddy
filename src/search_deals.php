<?php 

  session_start();
  
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Deal Results</title>

    <!-- boostrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="/res/styles/navigation_header.css" rel="stylesheet">
    <link href="/res/styles/feed.css" rel="stylesheet">

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
        
        <h2 class="animated fadeIn textBlue title-bar">Deal Results</h2>
        <div id="searchResultsFeed"><!-- feed of search results of deals --></div>

      </div>

    </div>

    <!-- footer -->
    <?php $page='view'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- sweetalert js -->
    <script src="https://unpkg.com/sweetalert2@7.0.6/dist/sweetalert2.all.js"></script>
    <!-- feed js -->
    <script type="text/javascript" src="/src/js/search_deals.js"></script>

  </body>

</html>
