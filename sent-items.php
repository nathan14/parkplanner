<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="keywords" content="">
    <title>דואר יוצא - מתכנן הפארקים אורלנדו</title>    

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/loader.css" rel="stylesheet">
    <link id="ltr-css" href="" rel="stylesheet">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/sent-items.css" rel="stylesheet">
    
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
        <li><a href="dashboard.php" lang="he">לוח בקרה</a></li>
        <li class="active" lang="he">דואר יוצא</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="hidden-xs h1-modified" lang="he">דואר יוצא</h1>
        </header>

        <div class="col-md-12">
          <label lang="he">רשומות להצגה</label> 
          <select class="input-md info-bar" id="num-of-items">
            <option lang="he" value="all-records">הכל</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
          </select>
          <sapn>
            <i class="fa fa-envelope"></i> <sapn id="total-items"></sapn>
          </sapn>
        </div>
        
        <ul class="col-xs-12 list-group" id="items-list">
        </ul>
        
        <div class="bottom-btns">
          <button class="btn btn-lg btn-general" id="btn-export-csv">
            <i class="fa fa-file-excel-o"></i> CSV
          </button>
        </div>
                
      </div> <!-- users-area -->
                      
    </div> <!-- container --> 
    
	<?php include 'includes/footer.html'; ?>
              
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/date.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/sent-items.js"></script>

  </body>
</html>