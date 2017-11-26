<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="page icon" href="../res/img/beer.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>About Us</title>

    <!-- bootstrap css -->
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/readable/bootstrap.min.css" rel="stylesheet">
    <!-- custom styles -->
    <link href="../../res/styles/about.css" rel="stylesheet">


  </head>

  <body>
  
        <!-- top navigation bar -->
    <?php if (isset($_SESSION["authenticated"])): ?>
      <?php $page='about'; include('../navigation_header_user.php'); ?>
    <?php else: ?>
      <?php $page='about'; include('../navigation_header.php'); ?>
    <?php endif ?>

    <!-- page contents -->
    <div class="container-fluid">

      <!-- about us -->
      <div class="container-fluid">
        
        <h1 class = "textBlue title-bar" >Meet the developers</h1>
        
        <div class="container" id="info">
          <div class="row">
            <div class="col-md-4">
              <h4>Amrit Pal Banwait</h4>
              <img src="/res/img/AmritBanwait.jpg" alt="Picture of Amrit Pal Banwait" width="80%" height="420px"/>
            </div>
          
            <div class="col-md-4">
              <h4>Jimmy Gould</h4>
              <img src="/res/img/JimmyGould.jpg" alt="Picture of Jimmy Gould" width="80%" height="420px"/>
            </div>

            <div class="col-md-4">
              <h4>Kurtis Taylor</h4>
              <img src="/res/img/KurtisTaylor.jpg" alt="Picture of Kurtis Taylor" width="80%" height="420px"/>
            </div>
          </div>

          <div class="row">
                
            <div class="col-md-4">         
              <h5>Currently pursuing B.S/M.S degress with a concentration in software development.<br><br>
              My favorite thing about software programming is the ability to turn nothing into something.</h5>
            </div>

            <div class="col-md-4">
              <h5>Information System major, Computer Science and Business minor. SDI IT intern.<br><br>
              Interests: Guns, computers, cars, video games<br><br>
              Fact: I’ve seen a volcano erupt</h5>
            </div>
            
            <div class="col-md-4">
              <h5>Mostly interested in networking, cryptography, bitcoin and the evolving crypto-economy, algorithm design, and artificial intelligence. In general, I am interested in cool stuff that computers can do.<br><br>
              Fact: My favorite programming spot is the Foo Bar.</h5>
            </div>
            
          </div>
        </div>
      </div>

    </div>

    <!-- footer -->
    <?php $page='about'; include('../footer.php'); ?>

    <!-- jQuery core js -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <!-- bootstrap core js -->


  </body>

</html>
