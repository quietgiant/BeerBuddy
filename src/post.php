<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Post Deal</title>

    <!-- bootstrap core css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">
    <!-- google maps api -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_jpR5OsONNoj9ZB-YzRuK9d4TEKwLUx4&callback=initMap"
    type="text/javascript"></script>

  </head>

  <body>

    <!-- top navigation bar -->
    <?php $page='post'; include('navigation_header.php'); ?>

    <!-- page contents -->
    <div class="container-fluid">

      <div class="container-fluid">
        <h1 class="my-4">Post a deal</h1>

        <form>
          <label>Name:</label>
          <input list="bottleName" name="bottleName" class="form-control" spellcheck="false">
            <datalist id="bottleName">
              <option value="KNOB CREEK BOURBON 9YR 100P 375ML"></option>
              <option value="KNOB CREEK BOURBON 9YR 100P 1.75L"></option>
            </datalist>
          <div class="form-group ">
            <label for="price">Price:</label><input type="text" class="form-control" id="price">
          </div>
          
          </br>
          <input type="submit">
          </br>
          </br>
        </form>
      </div>
    
    </div>

    <!-- footer -->
    <?php $page='post'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  </body>

</html>
