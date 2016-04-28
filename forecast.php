<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="מזג אוויר הוא שיקול משמעותי במהלך הטיול באורלנדו, כאן תוכלו לקבל את המידע העדכני ביותר.">
    <meta name="keywords" content="">
    <title>תחזית - מתכנן הפארקים אורלנדו</title>
    
    <meta property="og:image" content="images/fb/forecast.jpg" />
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link rel="stylesheet" href="fonts\climacons-font\climacons-font.css">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/hidden-content.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/forecast.css" rel="stylesheet">
    <link id="ltr-css" href="" rel="stylesheet">
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
        <li class="active" lang="he">תחזית</li>
      </ol>
      
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="h1-modified hidden-xs" lang="he">תחזית - אורלנדו, פלורידה</h1>
        </header>
        
        <div id="login-message"></div>
        
        <div id="hidden-content">
          <ul class="col-md-12 list-group" id="forecast">
          </ul>
          
          <p align="center">
            <a href="http://www.wunderground.com/" lang="he">מופעל בעזרת Weather Underground Inc.</a>
          </p>
        </div>
      </div>
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/hidden-content.js"></script> 
    <script src="js/date.js"></script>
    <script src="js/forecast.js"></script> 

  </body>
</html>