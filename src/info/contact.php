<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Contact Us</title>
    
    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">

  </head>

  <body>

    <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='contact'; include('../navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='contact'; include('../navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents -->
    <div class="container-fluid">

      <!-- contact us form -->
      <div class="container-fluid">
        
        <h1 class="textBlue title-bar">Contact us</h1>
        <p>hit us up here</p>
        
      </div>

    </div>

    <!-- footer -->
    <?php $page='contact'; include('../footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
