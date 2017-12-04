<?php

  session_start();
 
  // check for which form was submitted
  if (isset($_POST['typeBooze']) || isset($_POST['brandBooze']) || isset($_POST['nameBooze']) ||  ($_POST['priceRangeBooze'] > 0)) {
    searchBooze();
  } else if (isset($_POST['brandBeer']) || isset($_POST['nameBeer']) || ($_POST['priceRangeBeer'] > 0)) {
    searchBeer();
  }
  
  function searchBeer() {
    // start sql build
    $_SESSION['isBeer'] = "true";
    $_SESSION['boozeType'] = null;
    $_SESSION['boozeBrand'] = null;
    $_SESSION['boozeName'] = null;
    $_SESSION['boozePrice'] = null;
    
    if(isset($_POST['typeBooze'])){
      $_SESSION['boozeType'] = "beer";
    }
    if(isset($_POST['brandBeer'])){
      $_SESSION['boozeBrand'] = $_POST['brandBeer'];
    }
    if(isset($_POST['nameBeer'])){
      $_SESSION['boozeName'] = $_POST['nameBeer'];
    }
    if($_POST['priceRangeBeer']){
      $_SESSION['boozePrice'] = $_POST['priceRangeBeer'];
    }
    
    // go to deals page with current sql statment
    header('Location: search_deals.php');
  }
  
  function searchBooze() {
    // start sql build
    $_SESSION['isBeer'] = null;
    $_SESSION['boozeType'] = null;
    $_SESSION['boozeBrand'] = null;
    $_SESSION['boozeName'] = null;
    $_SESSION['boozePrice'] = null;
    
    if(isset($_POST['typeBooze'])){
      $_SESSION['boozeType'] = $_POST['typeBooze'];
    }
    if(isset($_POST['brandBooze'])){
      $_SESSION['boozeBrand'] = $_POST['brandBooze'];
    }
    if(isset($_POST['nameBooze'])){
      $_SESSION['boozeName'] = $_POST['nameBooze'];
    }
    if($_POST['priceRangeBooze']){
      $_SESSION['boozePrice'] = $_POST['priceRangeBooze'];
    }
    
    // go to deals page with current sql statment
    header('Location: search_deals.php');
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Search Deals</title>
    
    <!-- bootstrap css-->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- animate css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet">
    <!-- boostrap slider css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/css/bootstrap-slider.min.css" rel="stylesheet">
    <!-- boostrap combo-box css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-combobox/1.1.8/css/bootstrap-combobox.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../res/styles/navigation_header.css" rel="stylesheet">
    <link href="../res/styles/search.css" rel="stylesheet">    

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

      <!-- search functions -->
      <div class="container-fluid">

        <h2 class="animated lightSpeedIn textBlue title-bar">What sounds good to drink tonight<span class="textGold ">?</span></h2>
          
        <div class="container formBox">

          <!-- tabs -->
          <ul class="nav nav-pills nav-justified">
            <li class="presentation active"><a href="#beer" data-toggle="tab" style="font-size: 25px; ">Beer</a></li>
            <li class="presentation "><a href="#booze" data-toggle="tab" style="font-size: 25px">Booze</a></li>
          </ul>

          <!-- tab panes -->
          <div class="tab-content">

            <!-- beer pane -->
            <div class="tab-pane active animated flipInY" id="beer">
              <div class="container-fluid" style="margin-left:auto; margin-right:auto;">

                <!-- beer search form -->
                <form role="form" id="beerSearch" name="beerSearch" method="POST"> 
                  <h3 class="form-heading">Search for beer around you</h3>
                  <h5 class="form-heading">(at least one field is required)</h5>

                  <!-- brewery/brand field -->
                  <div class="form-group">
                      <label for="brand" class="control-label">Brand/brewery:</label>
                      <input type="text" class="form-control" id="brandBeer" name="brandBeer" autocomplete="off" placeholder="Brand or brewery">
                  </div>

                  <!-- name field -->
                  <div class="form-group">
                      <label for="name" class="control-label">Name of drink:</label>
                      <input type="text" class="form-control" id="nameBeer" name="nameBeer" autocomplete="off" placeholder="Name of drink">
                  </div>

                  <!-- price range slider -->
                  <div class="form-group">
                    <label id="pv" for="priceRangeBeer" class="control-label">Maximum price: $<span id="priceRangeBeerValue">&nbsp;-</span><br>
                    <input id="priceRangeBeer" type="text" name="priceRangeBeer" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="0"/>
                  </div>

                  <!-- submit form button -->
                  <div class="form-group">
                    <button class="btn btn-md btn-primary btn-block" id="submitBeerButton" name="submitBeerButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Search deals&nbsp;<span class="glyphicon glyphicon-search"></span></button>
                  </div>

                  <!-- clear form button -->
                  <div class="form-group">
                      <button class="btn btn-md btn-primary btn-danger btn-block" id="clearBeerButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
                  </div>

                </form>
              </div>
            </div>

            <!-- booze pane -->
            <div class="tab-pane animated flipInY" id="booze">
              <div class="container-fluid" style="margin-left:auto; margin-right:auto;">

                <!-- booze search form -->
                <form role="form" id="boozeSearch" name="boozeSearch" method="POST">
                  <h3 class="form-heading">Search for booze around you</h3>
                  <h5 class="form-heading">(at least one field is required)</h5>

                  <!-- liquor type field -->
                  <div class="form-group">
                    <label for="type" class="control-label">Type of liquor:</label>
                    <select class="combobox form-control" id="typeBooze" name="typeBooze" >
                      <option disabled selected></option>
                      <option value="all">ALL</option>
                      <option value="brandy">Brandy</option>
                      <option value="bourbon">Bourbon</option>
                      <option value="gin">Gin</option>
                      <option value="liqueur">Liqueur</option>
                      <option value="rum">Rum</option>
                      <option value="tequila">Tequila</option>
                      <option value="vodka">Vodka</option>
                      <option value="whiskey">Whiskey</option>
                      <option value="wine">Wine</option>
                    </select>
                  </div>

                  <!-- brand field -->
                  <div class="form-group">
                      <label for="brand" class="control-label">Brand:</label>
                      <input type="text" class="form-control" id="brandBooze" name="brandBooze" autocomplete="off" placeholder="Brand of liquor">
                  </div>

                  <!-- name field -->
                  <div class="form-group">
                      <label for="name" class="control-label">Name of drink:</label>
                      <input type="text" class="form-control" id="nameBooze" name="nameBooze" autocomplete="off" placeholder="Name of liquor">
                  </div>

                  <!-- price range slider -->
                  <div class="form-group">
                    <label for="priceRangeBooze" class="control-label">Maximum price: $<span name="priceRangeBoozeValue" id="priceRangeBoozeValue">&nbsp;-</span><br>
                    <input id="priceRangeBooze" type="text"  name="priceRangeBooze" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="0"/>
                  </div>

                  <!-- submit form button -->
                  <div class="form-group">
                    <button class="btn btn-md btn-primary btn-block" id="submitBoozeButton" name="submitBoozeButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Search deals&nbsp;<span class="glyphicon glyphicon-search"></span></button>
                  </div>

                  <!-- clear form button -->
                  <div class="form-group">
                      <button class="btn btn-md btn-primary btn-danger btn-block" id="clearBoozeButton" style="width:67%; margin-left:auto; margin-right:auto;" type="reset">Clear&nbsp;<span class="glyphicon glyphicon-trash"></span></button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

    <!-- footer -->
    <?php $page='search'; include('footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- bootstrap slider js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.9.0/bootstrap-slider.min.js"></script>
    <!-- boostrap combo-box js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-combobox/1.1.8/js/bootstrap-combobox.min.js"></script>
    <!-- sweetalert js -->
    <script src="https://unpkg.com/sweetalert2@7.0.6/dist/sweetalert2.all.js"></script>
    <!-- typeahead js -->
    <script src="/res/lib/typeahead.js"></script>
    <!-- search js -->
    <script type="text/javascript" src="js/search.js"></script>
    
    <!-- clear form script -->
    <script>
      $('#clearBeerButton').click(function(){
        $('#priceRangeBeer').slider('setValue', 0);
        $('#priceRangeBeerValue').text(' -');
      });
      $('#clearBoozeButton').click(function(){
        $('#priceRangeBooze').slider('setValue', 0);
        $('#priceRangeBoozeValue').text(' -');
      });
    </script>
    
    <!-- init combo-box script -->
    <script type="text/javascript">
      $(document).ready(function(){
        $('.combobox').combobox();
      });
    </script>
    
    <!-- init typeahead -->
    <script type="text/javascript">
    /*$(document).ready(function () {
        $("#brandBeer").typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/src/controller/typeahead_name.php",
					          data: {
					            "term": query
					          },            
                    dataType: "json",
                    method: "POST",
                    success: function (data) {
						            result($.map(data, function (item) {
							              return item;
                        }));
                    }
                });
            }
        });
        
        $("#nameBeer").typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/src/controller/typeahead_name.php",
					          data: {
					            "term": query
					          },            
                    dataType: "json",
                    method: "POST",
                    success: function (data) {
						            result($.map(data, function (item) {
							              return item;
                        }));
                    }
                });
            }
        });
        
        $("#brandBooze").typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/src/controller/typeahead_name.php",
					          data: {
					            "term": query
					          },            
                    dataType: "json",
                    method: "POST",
                    success: function (data) {
						            result($.map(data, function (item) {
							              return item;
                        }));
                    }
                });
            }
        });
        
        $("#nameBooze").typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "/src/controller/typeahead_name.php",
					          data: {
					            "term": query
					          },            
                    dataType: "json",
                    method: "POST",
                    success: function (data) {
						            result($.map(data, function (item) {
							              return item;
                        }));
                    }
                });
            }
        });
    });*/
  </script>
    
  </body>

</html>
