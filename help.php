<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="רוצים לדעת איך מתכנן הפארקים באורלנדו עובד? כאן תמצאו את התשובות">
    <meta name="keywords" content="">
    <title>עזרה - מתכנן הפארקים אורלנדו</title>    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/help.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
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
        <li class="active" lang="he">עזרה</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="hidden-xs h1-modified" lang="he">עזרה</h1>
        </header>      
        <div class="show-rtl">
          <h3>למי המערכת מתאימה?</h3>
          <p>
            מתכנן הפארקים באורלנדו נוצר על מנת לעזור למשפחות עם זמן מוגבל באורלנדו לנצל את הזמן בצורה הטובה ביותר. <br>
            המערכת מתאימה לכל אדם הנוסע לאורלנדו וצריך עזרה בקבלת ההחלטה בנוגע למסלול הטיול שלו.
          </p>
          <h3>איך זה עובד?</h3>
          <p>
            בהתאם לגילאים המוזנים, המערכת יודעת להציג את רשימת הפארקים המתאימים ביותר במגבלת מספר הימים. <br>
            שילוב גילאי הנוסעים יחד עם רמת האקסטרים המבוקשת (כמה מפחידים המתקנים) עוברות באלגוריתם שלנו שלבסוף מפיק את התוצאות המתאימות ביותר.<br>
          </p>   
          <h3>איך נקבע מזג האוויר?</h3>
          <p>
            מאחר ולא ניתן לצפות בצורה מדויקת את מזג האוויר כמה חודשים קדימה, מזג האוויר המוצג הוא משוער בלבד. <br>
            מזג האוויר המוצג מבוסס על התאריכים בהם תגיעו לאורלנדו ביחס לאותם תאריכים בתקופות קודמות.
          </p>  
          <h3>איך נקבע העומס בפארק?</h3>
          <p>
            כמו מזג האוויר, לא ניתן לחזות בצורה מדויקת את העומס בפארק כמה חודשים קדימה. <br>
            על מנת להציג תמונה כמה שיותר ברורה, העומס בפארק מבוסס על ממוצע העומס בכל אחד מהימים בהם תגיעו.<br>
            עומס בכל יום נקבע לפי תחזית בהתאם לחופשות וחגים בארצות הברית.
          </p>
          <h3>יש עוד שאלות?</h3>
          <p>
            אין בעיה, אתם מוזמנים לפנות אלינו בעזרת <a href="contact.php">טופס צור קשר</a> ואנחנו נחזור אליכם.
          </p>      
        </div>
        
        <div class="show-ltr">
          <h3>Who should use Park Planner?</h3>
          <p>
            Orlando Park Planner was created manily for families who visit Orlando for short periods. <br>
            Such visit must include planning and prioritize the chosen parks. <br>
            Park Planner will help such families with the planning task.
          </p>
          <h3>How Does Park Planner works?</h3>
          <p>
            We use arrival dates, number of adults, children ages and extreme level to determine the best match for you. <br>
            Using our expirience in Orlando parks we can recommend what are the bost options.
          </p>
          <h3>How can you estimate the weather?</h3>
          <p>
            We use meteorological services to predicte the weather based on past climate on the same days.
          </p>
          <h3>How can you estimate park load?</h3>
          <p>
            We give each dat a score from 1 to 10 where 10 is busiest, those grades are based on holidays and vacation periods. <br>
            Finally we calculate the avarage based on arrival date.
          </p>
          <h3>More questions?</h3>
          <p>
            You can always contact us using our <a href="contact.php">Contact Form</a>.
          </p>
        </div>
        
      </div> <!-- help -->
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script>
	  window.onload = function() {
		$('#loader').hide();
	  }	
	
	  $(document).ready(function() { 
		$('#page-title-mobile').html('עזרה');
	  });	
	</script>

  </body>
</html>