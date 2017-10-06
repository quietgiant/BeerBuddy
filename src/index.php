<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>BeerBuddy</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='index'; include('navigation_header.php'); ?>

    <!-- page contents -->
    <div class="container-fluid">
        
        <div class="container col-md-12">
              <iframe  id="MapLocation" src="https://maps.google.com/maps?q=liquor+store+near+me&amp;output=embed" width="75%" height="500px" border="2px"></iframe>
        </div>

    </div>

    <!-- footer -->
    <?php $page='index'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
