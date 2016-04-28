<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="מתכנן הפארקים באורלנדו יעזור לכם לארגן את הטיול שלכם לעיר אורלנדו,
    פלורידה בצורה הטובה ביותר תוך התחשבות בהרכב משפחתי, כמות ימים ורמת אקסטרים מבוקשת.">
    <meta name="keywords" content="אורלנדו, פארקים, טיול באורלנדו, פארקים באורלנדו, דיסני וורלד, יוניברסל סטודיוס, עולם הים, אי ההרפתקאות">
    <title lang="he">תוצאות - מתכנן הפארקים אורלנדו</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/results.css" rel="stylesheet">
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
        <li><a href="/" lang="he">בית</a></li>
        <li class="active" lang="he">תוצאות</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 results" id="results-div">
           
        <div class="row col-md-12">
          <h1 class="hidden-xs h1-modified" lang="he">תוצאות</h1>
          <div class="result-details">
            <span id="result-details-dates"></span>
            <span id="result-details-family"></span>
            <span id="result-details-extreme" lang="he"></span>
          </div>
        </div>
        
      <div class="row col-md-12 results-sort hidden-xs">
        <div class="col-xs-3 col-md-3 col-lg-4">
          <label lang="he">מיין לפי</label> 
          <span class="hidden-lg"><br></span>
          <select class="info-bar input-md" id="sortby">
            <option lang="he" value="Park Fit">מידת התאמה</option>
            <option lang="he" value="Park Extreme">רמת אקסטרים</option>
            <option lang="he" value"Park Name">שם פארק</option>
          </select>        
        </div>
        <div class="col-xs-3 col-sm-5 col-md-4 col-lg-4 col-md-offset-0">
          <label lang="he">
          מזג אוויר משוער
<span class="glyphicon glyphicon-question-sign blue-tooltip show-rtl" data-toggle="tooltip" data-placement="top" title="נקבע בהתאם לתאריך ההגעה"></span>          
          </label>
<span class="glyphicon glyphicon-question-sign blue-tooltip show-ltr" data-toggle="tooltip" data-placement="top" title="Bases on arrival date"></span>

			&nbsp;
          <span id="weather" class="info-bar info-bar-mod input-md" lang="he"></span>
        </div>
        <div class="col-xs-3 col-sm-4 col-md-5 col-lg-4" id="park-load-container">
          <label lang="he">עומס משוער</label>
<span class="glyphicon glyphicon-question-sign blue-tooltip show-rtl" data-toggle="tooltip" data-placement="top" title="לפי ממוצע העומסים בימי ההגעה">
</span>
<span class="glyphicon glyphicon-question-sign blue-tooltip show-ltr" data-toggle="tooltip" data-placement="top" title="Avarage for arrival period">
</span>
<span id="park-load" class="info-bar info-bar-mod input-md" lang="he"></span>
        </div>
        <div class="social-top hidden-xs">
        <!--
          <button onClick="fbShare()" class="btn btn-lg btn-social btn-social-fb">
            <i class="fa fa-facebook-square"></i>     
          </button>   
          <button onClick="gpShare()" class="btn btn-lg btn-social btn-social-gp">
            <i class="fa fa-google-plus-square"></i>     
          </button>    
        -->
        </div>
      </div>
            
      <ul class="col-md-12 list-group" id="results_parks">
      </ul> <!-- results-parks -->  
      
      <div class="bottom-btns">
          <button class="btn btn-general btn-lg" id="btn-calendar"> <i class="fa fa-calendar">
            </i> <span lang="he"> תכנן בלוח שנה </span>
          </button>
          <button onClick="fbShare()" class="btn btn-general btn-lg">
            <i class="fa fa-facebook-square"></i> <span class="hidden-xs" lang="he">שתף</span>   
          </button>
          <button onClick="gpShare()" class="btn btn-general btn-lg">
            <i class="fa fa-google-plus"></i> <span class="hidden-xs" lang="he">שתף</span>    
          </button>     
      </div>

      </div> <!-- results -->
    </div> <!-- container --> 
    
    <?php include 'includes/footer.html'; ?>
    
    <div class="footer-menu" id="footer-menu-sort" align="center">
      <select class="info-bar input-md" id="sortby-mobile">
        <option lang="he" value="Park Fit">מידת התאמה</option>
        <option lang="he" value="Park Extreme">רמת אקסטרים</option>
        <option lang="he" value"Park Name">שם פארק</option>
      </select>     
    </div>
    <div class="footer-menu" id="footer-menu-weather" align="center">
    </div>
    <div class="footer-menu" id="footer-menu-load" align="center">
    </div>  
          
    <div class="footer visible-xs" align="center">
      <a class="col-xs-4 submenu" id="show-sort" lang="he">
        <i class="fa fa-sort"></i> מיין
      </a>
      <a class="col-xs-4 submenu" id="show-weather" lang="he">
        <i class="fa fa-sun-o"></i> תחזית
      </a>        
      <a class="col-xs-4 submenu" id="show-park-load" lang="he">
        <i class="fa fa-area-chart"></i> עומס
      </a>
    </div>
          
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/date.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/results-details.js"></script> 
    <script src="js/results.js"></script>

  </body>
</html>