<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="שאלות והצעות לשיפור עבור מתכנן הפארקים ניתן להעביר בעמוד זה">
    <meta name="keywords" content="">
    <title>צור קשר - מתכנן הפארקים אורלנדו</title> 
           
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/parkplanner.css" rel="stylesheet">
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
        <li class="active" lang="he">צור קשר</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="hidden-xs h1-modified" lang="he">צור קשר</h1>
        </header>                    
        <form id="contact-form" novalidate>
          <div class="row">
            <div class="col-sm-5 col-xs-12">
              <label lang="he">שם</label>
              <input type="text" class="form-control input-lg white_click" name="name" id="name">
            </div>
            <div class="col-sm-7 col-xs-12">
              <label class="form-label" id="email_label" lang="he">אימייל</label>
              <span id="email_label-status"></span>
              <input dir="ltr" type="email" class="form-control input-lg white_click" name="email" id="email-contact">
            </div>
            <div class="col-xs-12">
              <label class="form-label row-new" lang="he">תוכן הפנייה</label>
              <textarea rows="6" class="form-control input-lg white_click" name="contact_content" id="contact_content"></textarea>
            </div>
            <div class="col-sm-2 col-xs-4 pull-left">
              <button type="submit" class="btn btn-pink btn-block btn-lg hidden-xs" lang="he">שלח</button>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-pink btn-lg visible-xs" lang="he">שלח</button> 
            </div>
          </div>
        </form>
        
      </div> <!-- contact -->
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/contact.js"></script> 

  </body>
</html>