<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="הרשמה למתכנן הפארקים באורלנדו תאפשר לכם לקבל עדכונים וחדשות.">
    <meta name="keywords" content="">
    <title>הרשמה - מתכנן הפארקים אורלנדו</title> 
           
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/build.css" rel="stylesheet">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link id="ltr-css" href="" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
  </head>
  
  <body>
  
	<script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/jquery-lang.js"></script>
    <script src="js/cookies.js"></script>
    <?php include 'includes/navbar.php'; ?>
    
    <!-- Loader -->
    <div align="center" id="loader">
      <div id="circleG" align="center">
        <div id="circleG_1" class="circleG"></div>
        <div id="circleG_2" class="circleG"></div>
        <div id="circleG_3" class="circleG"></div>
      </div>
    </div> 
                
    <div class="container">
    
      <ol class="breadcrumb col-md-10 col-md-offset-1 hidden-xs">
        <li><a href="/" lang="he">בית</a></li>
        <li class="active" lang="he">הרשמה</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="hidden-xs h1-modified" lang="he">הרשמה</h1>
        </header>                    
        <form id="register-form" novalidate>
          <div class="row">
            <div class="col-xs-12">
              <label id="email_label" lang="he">אימייל</label>
              <span id="email_label-status" lang="he"></span>
              <input dir="ltr" type="email" class="form-control input-lg white_click" name="email" id="email-register">
            </div>          
            <div class="col-xs-6">
              <label class="form-label row-new" lang="he">שם פרטי</label>
              <input type="text" class="form-control input-lg white_click" name="fname-register" id="fname-register">
            </div>             
            <div class="col-xs-6">
              <label class="form-label row-new" lang="he">שם משפחה</label>
              <span id="email_label-status"></span>
              <input type="text" class="form-control input-lg white_click" name="lname-register" id="lname-register">
            </div>
            <div class="col-xs-12">
              <label class="form-label row-new" lang="he">ססמא</label>
              <span id="password-status" lang="he"></span>
              <input dir="ltr" type="password" class="form-control input-lg white_click" name="password" id="password">
            </div>             
           <div class="col-xs-10 col-sm-8 col-md-9 checkbox checkbox-primary">
              <input id="mail-updates" type="checkbox" checked>
              <label for="mail-updates" lang="he">
                  מאשר קבלת עדכונים לאימייל
              </label>
            </div>         
            <div class="col-xs-2 col-sm-4 col-md-2 pull-left">
              <button type="submit" class="btn btn-pink btn-block btn-lg hidden-xs" lang="he">הרשמה</button>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-pink btn-lg visible-xs" lang="he">הרשמה</button> 
            </div>
          </div>
        </form>
        
      </div> <!-- contact -->
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/register.js"></script> 

  </body>
</html>