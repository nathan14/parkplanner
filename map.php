<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="הצגת כל הפארקים באורלנדו והאזור על ידי מפת אורלנדו">
    <meta name="keywords" content="">
    <title>מפה - מתכנן הפארקים אורלנדו</title>    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link id="ltr-css" href="" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/hidden-content.css" rel="stylesheet">
    <link href="css/map.css" rel="stylesheet">
  </head>
  
  <body>
  
    <!-- Loader -->
    <div align="center" id="loader">
      <div id="circleG" align="center">
        <div id="circleG_1" class="circleG"></div>
        <div id="circleG_2" class="circleG"></div>
        <div id="circleG_3" class="circleG"></div>
      </div>
    </div>  
  
	<script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-lang.js"></script>
    <script src="js/cookies.js"></script>
    <?php include 'includes/navbar.php'; ?>
                
    <div class="container">
    
      <ol class="breadcrumb col-md-10 col-md-offset-1 hidden-xs">
        <li><a href="/" lang="he">בית</a></li>
        <li class="active" lang="he">מפה</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 maps">
        <header id="maps-header">
          <h1 class="hidden-xs h1-modified" lang="he">מפה</h1>
        </header>
        <div id="login-message"></div>
        <div id="hidden-content">
          <div id="map-container"></div>
        </div>
        
      </div>
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="js/hidden-content.js"></script> 
    <script src="js/map.js"></script> 

  </body>
</html>