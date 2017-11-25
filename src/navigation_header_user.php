<?php
// beerbuddy header navigation bar
$username = $_SESSION['username'];
$nav = "
<nav class=\"navbar navbar-default navbar-static-top\">
  <div class=\"container\" style=\"padding-left: 0px; padding-right: 0px\">
    <div class=\"navbar-header\">
      <button type=\"button\" id=\"header\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">
        <span class=\"sr-only\">Toggle navigation</span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
        <span class=\"icon-bar\"></span>
      </button>
      <a class=\"navbar-brand\" href=\"/src/index.php\">BeerBuddy</a>
      <img class=\"navbar-brand\" src=\"/res/img/icon.png\" alt=\"BeerBuddyLogo\">
            
    </div>
    <div id=\"navbar\" class=\"navbar-collapse collapse\">
      <ul class=\"nav navbar-nav\">
        <li class=\"".($class = ($page == 'index') ? 'active' : '')."\"><a href=\"/src/index.php\">Explore Deals</a></li>
        <li class=\"".($class = ($page == 'post') ? 'active' : '')."\"><a href=\"/src/post.php\">Post Deal</a></li>
        <li class=\"".($class = ($page == 'search') ? 'active' : '')."\"><a href=\"/src/search.php\">Search Deals</a></li>
        <li class=\"dropdown ".($class = ($page == 'help') ? 'active' : '')."\">
          <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">Help<span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li class=\"".($class = ($page == 'quickstart') ? 'active' : '')."\"><a href=\"/src/help/quickstart.php\">Quickstart</a></li>
            <li class=\"".($class = ($page == 'guidelines') ? 'active' : '')."\"><a href=\"/src/help/guidelines.php\">Posting guidelines</a></li>
            <li role=\"separator\" class=\"divider\"></li>
            <li class=\"dropdown-header\">Account Settings</li>
            <li><a href=\"#\">View profile</a></li>
            <li class=\"".($class = ($page == 'recoverPassword') ? 'active' : '')."\"><a href=\"/src/help/recoverPassword.php\">Recover password</a></li>
          </ul>
        </li>
      </ul>
      <ul class=\"nav navbar-nav navbar-right\">
        <li><a id=\"username_block\">Hello ".($username)."!&nbsp;<span class=\"glyphicon glyphicon-ok\"></span></a></li>
        <li><a href=\"/src/logout.php\">Logout&nbsp;<span class=\"glyphicon glyphicon-log-out\"></span></a></li>
      </ul>
    </div>
  </div>
</nav>";
echo $nav
?>

<!DOCTYPE html>
<html>
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- google lobster font -->
	  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <!-- custom styles -->
    <link href="/res/styles/ColorScheme.css" rel="stylesheet">
  </head>
</html>