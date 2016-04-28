<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="לוח הבקרה עוזר לנהל את המידע העובר באתר ואת משתמשי האתר.">
    <meta name="keywords" content="">
    <title>לוח בקרה - מתכנן הפארקים אורלנדו</title>    

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
    <link id="ltr-css" href="" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    
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
        <li las><a href="/" lang="he">בית</a></li>
        <li class="active" lang="he">לוח בקרה</li>
      </ol>
    
      <div class="dashboard-area col-md-10 col-md-offset-1">
      <header>
        <h1 class="hidden-xs h1-modified" lang="he">לוח בקרה</h1>
      </header>  
       
        <div class="col-md-6">
          <h4 lang="he">כמות חישובים בחודש</h4>
          <div class="chart">
            <canvas id="calculations-requsts-month" class="show-rtl"></canvas>
            <canvas id="calculations-requsts-monthEN" class="show-ltr"></canvas>
          </div>
        </div>  
        
        <div class="col-md-6">
          <h4 lang="he">החודשים המבוקשים ביותר</h4>
          <div class="chart">
            <canvas id="calculations-per-month" class="show-rtl"></canvas>
            <canvas id="calculations-per-monthEN" class="show-ltr"></canvas>
          </div>
        </div>    
        
        <div class="col-md-6">
          <h4 lang="he">הרכב משפחתי ממוצע</h4>
          <div class="chart">
            <canvas id="family-struct" class="show-rtl"></canvas>
            <canvas id="family-structEN" class="show-ltr"></canvas>
          </div>
        </div>
        
        <div class="col-md-6">
          <h4 lang="he">התפלגות רמת אקסטרים</h4>
          <div class="chart">
            <canvas id="extreme-level" class="show-rtl"></canvas>
            <canvas id="extreme-levelEN" class="show-ltr"></canvas>
          </div>
        </div>  
        
        <div class="bottom-btns col-xs-12">
           <button class="btn btn-general btn-lg" id="btn-manage-users" lang="he">
             <i class="fa fa-users"></i> משתמשים
           </button>
           <button class="btn btn-general btn-lg" id="btn-manage-mail" lang="he">
             <i class="fa fa-envelope"></i> דואר
           </button>           
        </div>
                     
      </div> <!-- dashboard-area -->
                      
    </div> <!-- container --> 
    
	<?php include 'includes/footer.html'; ?>
              
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/dashboard.js"></script>

  </body>
</html>