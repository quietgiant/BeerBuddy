<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Search Deals</title>

    <!-- bootstrap core css -->
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
    <?php $page='search'; include('navigation_header.php'); ?>

    <!-- page contents -->
    <div class="container-fluid">

      <!-- search functions -->
      <div class="container-fluid">

        <h2 class="animated lightSpeedIn" style="text-align: center">What sounds good to drink tonight?</h2>
          
        <div class="container formBox">

          <!-- tabs -->
          <ul class="nav nav-pills nav-justified">
            <li class="presentation active"><a href="#beer" data-toggle="tab" style="font-size: 25px;">Beer</a></li>
            <li class="presentation "><a href="#booze" data-toggle="tab" style="font-size: 25px">Booze</a></li>
          </ul>

          <!-- tab panes -->
          <div class="tab-content">

            <!-- beer pane -->
            <div class="tab-pane active animated flipInY" id="beer">
              <div class="container-fluid" style="margin-left:auto; margin-right:auto;">

                <!-- beer search form -->
                <form role="form" id="beerSearch">
                  <h3 class="form-heading">Search for beer around you</h3>
                  <h5 class="form-heading">(at least one field is required)</h5>

                  <!-- brewery/brand field -->
                  <div class="form-group">
                      <label for="brand" class="control-label">Brand/brewery:</label>
                      <input type="text" class="form-control" id="brandBeer" name="brandBeer" placeholder="Brand or brewery">
                  </div>

                  <!-- name field -->
                  <div class="form-group">
                      <label for="name" class="control-label">Name of drink:</label>
                      <input type="text" class="form-control" id="nameBeer" name="nameBeer" placeholder="Name of drink">
                  </div>

                  <!-- price range slider -->
                  <div class="form-group">
                    <label id="pv" for="priceRangeBeer" class="control-label">Maximum price: $<span id="priceRangeBeerValue">&nbsp;-</span><br>
                    <input id="priceRangeBeer" type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="0"/>
                  </div>

                  <!-- submit form button -->
                  <div class="form-group">
                    <button class="btn btn-md btn-primary btn-block" id="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Search deals&nbsp;<span class="glyphicon glyphicon-search"></span></button>
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
                <form role="form" id="boozeSearch">
                  <h3 class="form-heading">Search for booze around you</h3>
                  <h5 class="form-heading">(at least one field is required)</h5>

                  <!-- liquor type field -->
                  <div class="form-group">
                    <label for="type" class="control-label">Type of liquor:</label>
                    <select class="combobox form-control" id="typeBooze" name="typeBooze">
                      <option></option>
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
                      <input type="text" class="form-control" id="brandBooze" name="brandBooze" placeholder="Brand of liquor">
                  </div>

                  <!-- name field -->
                  <div class="form-group">
                      <label for="name" class="control-label">Name of drink:</label>
                      <input type="text" class="form-control" id="nameBooze" name="nameBooze" placeholder="Name of liquor">
                  </div>

                  <!-- price range slider -->
                  <div class="form-group">
                    <label for="priceRangeBooze" class="control-label">Maximum price: $<span id="priceRangeBoozeValue">&nbsp;-</span><br>
                    <input id="priceRangeBooze" type="text" data-slider-min="0" data-slider-max="50" data-slider-step="1" data-slider-value="0"/>
                  </div>

                  <!-- submit form button -->
                  <div class="form-group">
                    <button class="btn btn-md btn-primary btn-block" id="submitButton" style="width:67%; margin-left:auto; margin-right:auto;" type="submit">Search deals&nbsp;<span class="glyphicon glyphicon-search"></span></button>
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
    <!-- typeahead plug-in -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
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
    
  </body>

</html>
