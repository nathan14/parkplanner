<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="טיול לאורלנדו מורכב ממספר גורמים אחרים מעבר לפארקים כמו שופינג והשכרת רכב. כאן יובאו טיפים בנושא.">
    <meta name="keywords" content="">
    <title>לוח שנה - מתכנן הפארקים אורלנדו</title>    
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="css/bootstrap-tour.css" rel="stylesheet">
    <link rel="stylesheet" href="fonts\font-awesome-4.1.0\css\font-awesome.min.css">
    <link href="css/loader.css" rel="stylesheet">    
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
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
        <li><a href="javascript:history.back()" lang="he">תוצאות</a></li>
        <li class="active" lang="he">לוח שנה</li>
      </ol>
      
      <div class="col-md-10 col-md-offset-1 filters">
      
        <div class="row col-md-12">
          <h1 class="hidden-xs h1-modified" lang="he">לוח שנה</h1>
          <div class="result-details">
            <span id="result-details-family"></span>
            <span id="result-details-extreme" lang="he"></span>
          </div>          
          <button class="btn btn-lg btn-general show-rtl" id="go-tour"><i class="fa fa-question-circle"></i></button> 
          <button class="btn btn-lg btn-general show-ltr" id="go-tour-en"><i class="fa fa-question-circle"></i></button> 
        </div>
        
        <div class="dates">
          
          <div class="row">
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div0">
              <div class="date-container" id="date-container0">
                <span id="date-dat0"></span> <br>
                <span id="date-park-name0"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park0"><i class="fa fa-minus"></i></button>   
              </div>
            </div>         
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div1">
              <div class="date-container" id="date-container1">
                <span id="date-dat1"></span> <br>
                <span id="date-park-name1"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park1"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div2">
              <div class="date-container" id="date-container2">
                <span id="date-dat2"></span> <br>
                <span id="date-park-name2"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park2"><i class="fa fa-minus"></i></button>   
              </div>           
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div3">
              <div class="date-container" id="date-container3">
                <span id="date-dat3"></span> <br>
                <span id="date-park-name3"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park3"><i class="fa fa-minus"></i></button>   
              </div>
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div4">
              <div class="date-container" id="date-container4">
                <span id="date-dat4"></span> <br>
                <span id="date-park-name4"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park4"><i class="fa fa-minus"></i></button> 
              </div>                
            </div>  
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div5">
              <div class="date-container" id="date-container5">
                <span id="date-dat5"></span> <br>
                <span id="date-park-name5"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park5"><i class="fa fa-minus"></i></button>    
              </div>             
            </div>            
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div6">
              <div class="date-container" id="date-container6">
                <span id="date-dat6"></span> <br>
                <span id="date-park-name6"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park6"><i class="fa fa-minus"></i></button> 
              </div>               
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div7">
              <div class="date-container" id="date-container7">
                <span id="date-dat7"></span> <br>
                <span id="date-park-name7"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park7"><i class="fa fa-minus"></i></button> 
              </div> 
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div8">
              <div class="date-container" id="date-container8">
                <span id="date-dat8"></span> <br>
                <span id="date-park-name8"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park8"><i class="fa fa-minus"></i></button>
              </div>  
            </div>
            <div class="col-sm-3 col-xs-12 col-lg-2 date-div" id="date-div9">
              <div class="date-container" id="date-container9">
                <span id="date-dat9"></span> <br>
                <span id="date-park-name9"></span>
                <button class="btn btn-date-park btn-general" id="btn-date-park9"><i class="fa fa-minus"></i></button>  
              </div>
            </div>
          </div>
        </div>
      
        <div class="calendar-parks" id="test">
          <div class="row">
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div0">
              <div class="park-container" id="park-container0">
                <span id="park-name0"></span>
                <button class="btn btn-park btn-general" id="btn-park0"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div1">
              <div class="park-container" id="park-container1">
                <span id="park-name1"></span>
                <button class="btn btn-park btn-general" id="btn-park1"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div2">
              <div class="park-container" id="park-container2">
                <span id="park-name2"></span>
                <button class="btn btn-park btn-general" id="btn-park2"><i class="fa fa-plus"></i></button>
              </div>
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div3">
              <div class="park-container" id="park-container3">
                <span id="park-name3"></span>
                <button class="btn btn-park btn-general" id="btn-park3"><i class="fa fa-plus"></i></button>  
              </div>            
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div4">
              <div class="park-container" id="park-container4">
                <span id="park-name4"></span>
                <button class="btn btn-park btn-general" id="btn-park4"><i class="fa fa-plus"></i></button>
              </div>           
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div5">
              <div class="park-container" id="park-container5">
                <span id="park-name5"></span>
                <button class="btn btn-park btn-general" id="btn-park5"><i class="fa fa-plus"></i></button>
              </div>              
            </div>            
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div6">
              <div class="park-container" id="park-container6">
                <span id="park-name6"></span>
                <button class="btn btn-park btn-general" id="btn-park6"><i class="fa fa-plus"></i></button> 
              </div>                 
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div7">
              <div class="park-container" id="park-container7">
                <span id="park-name7"></span>
                <button class="btn btn-park btn-general" id="btn-park7"><i class="fa fa-plus"></i></button>   
              </div>             
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div8">
              <div class="park-container" id="park-container8">
                <span id="park-name8"></span>
                <button class="btn btn-park btn-general" id="btn-park8"><i class="fa fa-plus"></i></button>
              </div>       
            </div>
            <div class="col-sm-3 col-xs-10 col-lg-2 park-div" id="park-div9">
              <div class="park-container" id="park-container9">
                <span id="park-name9"></span>
                <button class="btn btn-park btn-general" id="btn-park9"><i class="fa fa-plus"></i></button>   
              </div>                 
            </div>
          </div>
          
        </div>
        <div class="hidden-xs col-xs-12">
           <button data-toggle="modal" id="sendto-web" data-target="#not-completed" class="btn btn-lg btn-pink-form pull-left">
             <span> <i class="fa fa-paper-plane"></i> <span lang="he">שלח אליי</span></span>
           </button>  
        </div>           
        
      </div>
       
     <button data-toggle="modal" data-target="#not-completed" class="btn btn-lg btn-pink visible-xs" id="sendto-mobile">
       <span> <i class="fa fa-paper-plane "></i> <span lang="he">שלח אליי</span></span>
     </button>              

    </div>
        
    </div> <!-- container -->

	<?php include 'includes/footer.html'; ?>
    
    <div class="modal fade" id="sendto">
      <div class="modal-dialog">
        <div class="modal-content"> 
          <div class="modal-body" id="sendto-modal">
            <p class="form-status" id="sendto-form-status" lang="he"> </p>
            <form role="form" id="sendto" novalidate>
              <div class="inner-addon right-addon">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control input-lg white_click" name="email" id="email-sendto" placeholder="אימייל" lang="he">
              </div> 
              <p></p>
              <button type="submit" class="btn btn-lg btn-pink-form btn-block" id="btn-send">
                <i class="fa fa-paper-plane pull-right btn-inner-addon"></i> <sapn class="btn-icon-label" lang="he">שלח אליי</span>
              </button>
            </form>
            <div id="sendto-form-status"></div>    
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->   
    
    <div class="modal fade" id="not-completed">
      <div class="modal-dialog">
        <div class="modal-content"> 
          <div class="modal-body" id="not-completed-modal">
            <p lang="he">
              יש להוסיף פארק לכל אחד מהימים בלוח השנה כדי להמשיך.  
            </p>
            <button class="btn btn-lg btn-pink-form btn-block" data-dismiss="modal">
              <span class="glyphicon glyphicon-remove pull-right btn-inner-addon"></span> <sapn class="btn-icon-label" lang="he">סגור</span>
            </button>            
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->        
    
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-tour.js"></script>
    <script src="js/validationutils.js"></script>
    <script src="js/date.js"></script>
    <script src="js/sendto.js"></script>
    <script src="js/results-details.js"></script>
    <script src="js/calendar.js"></script> 
    
    <script>
	  $(function () {
		  var tour = new Tour();
		  tour.addStep({
			element: "#btn-park0",
			title: "שלב 1",
			content: "הוסיפו את הפארק הרצוי על ידי שימוש בכפתור.",
			placement: "left",
			backdrop: true,
		  });
		  	  
		  tour.addStep({
			element: "#date-container0",
			title: "שלב 2",
			content: "כל פארק שתוסיפו יכנס לתאריך הראשון הזמין.",
			placement: "bottom",
			backdrop: true
		  });
	  
		  tour.addStep({
			element: ".sendto",
			title: "שלב 3",
			content: "כשתסיימו לבחור את כל הפארקים, תוכלו לקבל למייל פרטים חיוניים ואת לוח הזמנים של הטיול שלכם.",
			placement: "top",
			backdrop: true
		  });		  
		  
		  $('#go-tour').click(function() {
		    tour.init();
			tour.start(true);
		  });
		  
		  // English Tour	  
		  var tourEn = new Tour({
		    template: '<div class="popover" role="tooltip"> <div class="arrow"></div> <h3 class="popover-title"></h3> <div class="popover-content"></div> <div class="popover-navigation"> <div class="btn-group"> <button class="btn btn-md btn-general" data-role="prev">&laquo; Prev</button> <button class="btn btn-md btn-general" data-role="next">Next &raquo;</button> <button class="btn btn-sm btn-general" data-role="pause-resume" data-pause-text="Pause" data-resume-text="Play">Pause</button> </div> <button class="btn btn-md btn-general" data-role="end">Finish</button> </div> </div>'
		  });
		  
		  tourEn.addStep({
			element: "#btn-park0",
			title: "Step 1",
			content: "Use the '+' button to add park into date.",
			placement: "left",
			backdrop: true,
		  });
		  	  
		  tourEn.addStep({
			element: "#date-container0",
			title: "Step 2",
			content: "Each park will go into the first availlable date.",
			placement: "bottom",
			backdrop: true
		  });
	  
		  tourEn.addStep({
			element: ".sendto",
			title: "Step 3",
			content: "When you are done, you can send the plan to your email.",
			placement: "top",
			backdrop: true
		  });		  
		  
		  $('#go-tour-en').click(function() {
		    tourEn.init();
			tourEn.start(true);
		  });		  
	  });
	</script>

  </body>
</html>