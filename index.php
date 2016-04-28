<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="מתכנן הפארקים באורלנדו יעזור לכם לארגן את הטיול שלכם לעיר אורלנדו,
    פלורידה בצורה הטובה ביותר תוך התחשבות בהרכב משפחתי, כמות ימים ורמת אקסטרים מבוקשת.">
    <meta name="keywords" content="אורלנדו, פארקים, טיול באורלנדו, פארקים באורלנדו, דיסני וורלד, יוניברסל סטודיוס, עולם הים, אי ההרפתקאות">
    <title lang="he">מתכנן הפארקים באורלנדו | פארקים באורלנדו</title>
    
    <meta property="og:title" content="מתכנן הפארקים באורלנדו" />
    <meta property="og:type" content="המלצות טיולים" />
    <meta property="og:url" content="http://parkplanner.co.il" />
    <meta property="og:image" content="images/fb/buzz.png" />
    
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
        <li lang="he">בית</li>
      </ol>
    
      <div class="col-md-10 col-md-offset-1 filters">
        <header>
          <h1 class="hidden">מתכנן הפארקים אורלנדו</h1>
        </header>
        <form class="filters-form" id="filters-form" action="results.php" onSubmit="return validate()">
          <div class="row">
            <div class="col-sm-3 col-xs-8">
              <label lang="he">תאריך הגעה</label>
              <input readonly type="text" class="form-control input-lg" name="date" id="datepicker">
              <input readonly type="text" class="form-control input-lg" name="dateEN" id="datepickerEN">              
            </div>          
            <div class="col-sm-2 col-xs-4">
              <label lang="he">ימי כניסה</label>
              <select class="form-control input-lg" name="days" id="total_days">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option>
              </select>
            </div>
            <div class="col-sm-2 col-xs-4">
              <label class="form-label" lang="he">מבוגרים 18+</label>
              <select class="form-control input-lg white_click" name="adt" id="total_adults">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>                
              </select>
            </div>          
            <div class="col-sm-2 col-xs-4">
              <label class="form-label" lang="he">ילדים 3-17</label>
              <select class="form-control input-lg white_click" name="chl" id="num_of_children">
                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-sm-3 col-xs-12">
              <label class="form-label" lang="he">אקסטרים</label>
              <select class="form-control input-lg child" name="ext" id="extreme">
                <option value="scary" lang="he">הכי מפחיד</option>
                <option value="medium" lang="he">בינוני</option>
                <option value="noscary" lang="he">לא מפחיד בכלל</option>
              </select>
            </div>            
          </div>

          <div class="row row-new">
           <div class="col-sm-2 col-xs-4" id="child_age_1">
              <label class="form-label" lang="he">ילד 1</label>
              <select class="form-control input-lg white_click" name="c1" id="c1">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option> <option>11</option>
                <option>12</option> <option>13</option> <option>14</option>
                <option>15</option> <option>16</option> <option>17</option>
              </select>
            </div>
           <div class="col-sm-2 col-xs-4" id="child_age_2">
              <label class="form-label" lang="he">ילד 2</label>
              <select class="form-control input-lg white_click" name="c2" id="c2">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option> <option>11</option>
                <option>12</option> <option>13</option> <option>14</option>
                <option>15</option> <option>16</option> <option>17</option>
              </select>
            </div> 
           <div class="col-sm-2 col-xs-4" id="child_age_3">
              <label class="form-label" lang="he">ילד 3</label>
              <select class="form-control input-lg white_click" name="c3" id="c3">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option> <option>11</option>
                <option>12</option> <option>13</option> <option>14</option>
                <option>15</option> <option>16</option> <option>17</option>
              </select>
            </div>
           <div class="col-sm-2 col-xs-4" id="child_age_4">
              <label class="form-label" lang="he">ילד 4</label>
              <select class="form-control input-lg white_click" name="c4" id="c4">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option> <option>11</option>
                <option>12</option> <option>13</option> <option>14</option>
                <option>15</option> <option>16</option> <option>17</option>
              </select>
            </div>             
           <div class="col-sm-2 col-xs-4" id="child_age_5">
              <label class="form-label" lang="he">ילד 5</label>
              <select class="form-control input-lg white_click" name="c5" id="c5">
                <option>3</option> <option>4</option> <option>5</option>
                <option>6</option> <option>7</option> <option>8</option>
                <option>9</option> <option>10</option> <option>11</option>
                <option>12</option> <option>13</option> <option>14</option>
                <option>15</option> <option>16</option> <option>17</option>
              </select>
            </div>       
            <div class="col-sm-2 col-xs-4 pull-left">
              <button type="submit" class="btn btn-pink btn-block btn-lg hidden-xs" lang="he">המשך</button>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-pink btn-lg visible-xs" lang="he">המשך</button> 
            </div>
          </div>
        </form>
        
      </div> <!-- filters -->
      
      <div class="col-md-10 col-md-offset-1 intro hidden-xs" id="intro-div">
        <div class="index-div-container">
          <div class="col-sm-4 index-div">
            <i class="fa fa-bolt index-icon"></i>
            <h2 lang="he">רמת אקסטרים</h2>
            <p lang="he">
             מתכנן הפארקים יאפשר לכם לדרג את הפארקים לפי רמת האקסטרים שלהם, המייצגת עד כמה מפחידים המתקנים באותו פארק. <br>
            </p>
          </div>
          <div class="col-sm-4 index-div">
            <i class="fa fa-sun-o index-icon"></i>
            <h2 lang="he">מזג אוויר</h2>
            <p lang="he">
             נכון שמתכננים הרבה זמן מראש, וכדי לתת את מקסימום המידע הדרוש, תוכלו לקבל תחזית משוערת לימים בהם תשהו בעיר אורלנדו.  <br>
            </p>            
          </div>
          <div class="col-sm-4 index-div">
            <i class="fa fa-area-chart index-icon"></i>
            <h2 lang="he">עומס בפארק</h2>
            <p lang="he">
             התור למתקנים בפארק הוא משהו שהרבה נוסעים מודאגים ממנו, בהתאם לתאריכים בהם אתם מגיעים אנחנו נגיד לכם אם כדאי לכם לדאוג או לא. <br>
            </p>            
          </div>
        </div> 
        
        <div class="show-rtl">
          <h2>ברוכים הבאים למקום בו חלומות מתגשמים</h2>
          
          <img class="img-responsive pull-left hidden" src="images/יוניברסל אורלנדו.png" alt="דמות פארק אורלנדו">
          <p>
            כמות המידע ברחבי הרשת לגבי פארקים באורלנדו היא גדולה מאוד, ולא תמיד קל למצוא את מה שמתאים לכם בין כמות הביקורות והדירוגים השונים. <br>
            מתכנן הפארקים באורלנדו נותן תוצאות שהכי מתאימות לכם אישית - בהתאם להרכב המשפחתי ומבוסס על אלגוריתם שנבנה ע"י המומחים שלנו בתחום. 
          </p>
          <p>
            <h3>הטיול שלכם בעיר אורלנדו</h3>
            <strong>מתכנן הפארקים באורלנדו</strong> נולד מתוך הצורך של הקהל הישראלי להיכנס לפארקים ב<b>אורלנדו</b> המתאימים ביותר לכל אחד ואחד. <br>
            המשפחה הישראלית הממוצעת נוסעת בדרך כלל ל-5 ימי טיול באורלנדו וכמובן שיש שם המון מה לעשות! <br>
            כדי לעשות את המקסימום במינימום הזמן, המערכת מאפשרת להגדיר פרמטרים שונים כגון רמת אקסטרים מבוקשת המתייחסת ל "עד כמה המתקנים בפארק מפחידים"
            ועד לרמת הגילאים של הילדים כדי לקבל את ההתאמה הטובה ביותר. <br>
            בתוצאות שתקבלו תוכלו לסנן את הפארקים לפי מידת ההתאמה לכם, לפי רמת האקסטרים שלהם או פשוט לפי שם הפארק.<br>
            בנוסף, עבור כל פארק באורלנדו והאזור תוכלו לקבל רשימה של מתקנים ומידע חיוני עליהם - רמת אקסטרים, גובה מינמלי וסוג המתקן.<br>
            אנו מציעים גם צפייה בסרטונים על מנת שתוכלו להבין מהי המהות של המתקן ולהחליט אם הוא מתאים לטיול שלכם באורלנדו או לא.<br>
          </p>
          <p>
            <h3>פארקים באורלנדו</h3>
            בין הפארקים שתקבלו בתוצאות במערכת תוכלו למצוא את כלל הפארקים של דיסני - ממלכת החיות, ממלכת הקסמים, אפקוט והוליווד סטודיוס.
            <a href="map.php">מפת פארקים באורלנדו</a> <br>
            בנוסף תוכלו למצוא פארקים קצת יותר "מפחידים" כמו בוש גארדנס ושני הפארקים של יוניברסל סטודיוס - אי ההרפתקאות ויונברסל סטודיוס (כמו שם המתחם).<br>
            יש פארקים נוספים באורלנדו כמו עולם הים, אקווטיקה, לוגלנד ועוד... גם אותם תוכלו לקבל בין התוצאות!
          </p>
          <p>
            <h3>מידע עליו תוצאות הטיול מבוססות</h3>
             אם אתם רוצים לדעת איך מקבלים את התוצאות, איך נקבע מזג האוויר המשוער או העומס המשוער של פארקים באורלנדו במערכת, תוכלו
             להשתמש בעמוד <a href="help.php">העזרה שלנו</a>.<br>
             המידע באתר מבוסס על ביקורים רבים בפארקים והשוואה מתמדתת המתבצעת ביניהם, כמו כן כולל גם שיחות רבות עם משפחות שנסעו וגם משפחות
             המתכננות טיול באורלנדו בעתיד.<br>
          </p>
          <p>
            כמובן שאנחנו פתוחים להצעות ונשמח לשמוע על רעיונות והצעות שיש לכם לשיפור המערכת ולחווית הטיול הכוללת בעיר אורלנדו. <br>
            ניתן ליצור איתנו קשר ע"יש שימוש <a href="contact.php">בטופס צור קשר</a>.
          </p>  
        </div>
        
        <div class="show-ltr">
          <h2>Welcome to the place where dreams come true</h2>
          <p>
            The web is filled with lots of reviews and opinions about parks in Orlando, Florida. <br>
            Eeach family or individual has a different opition and prespective, this creates confusion for new visitor to Orlando. <br>
          </p>
          <h3>Why we are here?</h3>
          <p>
            In order to get the best trip plan and go the right park for <b>YOUR FAMILY</b>, we use a special algorithm to reccomend
            the options for you. <br>
            This is the end for reading numerous reviews, based on lots of expirence with parks, we know what's best for you. <br> 
            We will also provide the estimated park load (how busy the park) during your stay, and estimated weather.
          </p>
          <h3>Can we send you the information?</h3>
          <p>
            Of course, after getting results, you can use our calendar to plan where to go each day and then recieve it all to your email, including
            recommended rides, minimum heights and park maps.
          </p>
          <h3>Other Questions?</h3>
          <p>
            Orlando Park Planner is always looking to improve, we would be glad to here your comments and suggestions. <br>
            You can reach us using the <a href="contact.php">Contact Form</a>.
        </div>
        
      </div>
        
    </div> <!-- container -->
    
    <div class="modal fade" id="lang-modal">
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body">
              <div class="lang-chooser">
                <a class="btn btn-lg btn-general btn-block" id="lang-init-en" onclick="changeLang('en');">
                  <img src="images/flags/usa.png" class="pull-right" width="30px">
                  <span class="lang-choose">English</span>
                </a>
                <a class="btn btn-lg btn-general btn-block" id="lang-init-he" onclick="changeLang('he');">
                  <img src="images/flags/israel.png" class="pull-right" width="30px">
                  <span class="lang-choose">עברית</span>
                </a>
              </div>
            </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->      
    
    <?php include 'includes/footer.html'; ?>

    <link href="css/index.css" rel="stylesheet">        
    <link href="css/pikaday.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/pikaday.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/index.js"></script> 

  </body>
</html>