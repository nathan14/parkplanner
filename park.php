<!DOCTYPE html>
<html lang="he">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="images/favicon.png"/>
    <meta name="description" content="מידע על פארק כולל מתקנים ומסלולים מומלצים">
    <meta name="keywords" content="פארקים באורלנדו, טיול בר מצווה, טיול לאורלנדו">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link id="rtl-css" href="css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="fonts/font-awesome-4.1.0/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/photoswipe.css" rel="stylesheet">
    <link href="css/default-skin.css" rel="stylesheet">
    <link href="css/loader.css" rel="stylesheet">
    <link href="css/parkplanner.css" rel="stylesheet">
    <link href="css/park.css" rel="stylesheet">
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
        <li class="active park_name"></li>
      </ol>          
    
      <div class="col-md-10 col-md-offset-1 park" id="park-div">
      
        <h1 class="park_name hidden-xs"></h1>
        <ul class="nav nav-tabs nav-justified hidden-xs" role="tablist" id="myTab">
          <li role="presentation" class="active" id="tab_general"><a href="#general" role="tab" data-toggle="tab" lang="he"> <i class="fa fa-info-circle"></i> כללי</a></li>
          <li role="presentation" id="tab_route"><a href="#route" role="tab" data-toggle="tab" lang="he"><i class="fa fa-road"></i> מסלול מומלץ </a></li>
        </ul>
 
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="general">
            <img class="img-responsive park-img">
            <div id="general-content"></div>
          </div>
          <div role="tabpanel" class="tab-pane tab-pane-utils" id="route">
          <ul class="media-list" id="route-list" div="printable">
          </ul>
          </div>
          <div id="buttons">
           <button class="btn btn-lg hidden-xs btn-general" onClick="javascript:window.print()" id="btn-print">
             <span lang="he"> <span class="glyphicon glyphicon-print"></span> הדפס</span>
           </button>  
           <button id="btn-send-main" data-toggle="modal" data-target="#sendto" class="btn btn-lg btn-general">
             <span lang="he"> <i class="fa fa-paper-plane"></i> שלח אליי</span>
           </button>
           <button class="btn btn-lg btn-general" id="btn-gallery">
             <span lang="he"><i class="fa fa-picture-o"></i> גלרייה</span>
           </button>  
           <button class="btn btn-lg btn-general" id="btn-map">
             <span lang="he"><i class="fa fa-file-pdf-o"></i> מפה</span>
           </button>  
         </div>
                        
        </div>
      </div> <!-- park -->
    </div> <!-- container --> 
    
	<?php include 'includes/footer.html'; ?>
            
    <div class="footer visible-xs" align="center" role="tablist" id="myTabMobile">
        <a href="#general" role="tab" data-toggle="tab" class="col-xs-6 activelink" lang="he"> <i class="fa fa-info-circle"></i> כללי</a>
        <a href="#route" role="tab" data-toggle="tab" class="col-xs-6" lang="he"> <i class="fa fa-road"></i> מסלול מומלץ</a>        
    </div>
    
    <div class="modal fade" id="sendto">
      <div class="modal-dialog">
        <div class="modal-content"> 
          <div class="modal-body" id="sendto-modal">
            <p class="form-status" id="sendto-form-status" lang="he"> </p>
            <form role="form" id="sendto" novalidate>
              <div class="inner-addon right-addon">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control input-lg white_click" name="email" id="email-sendto" lang="he" placeholder="אימייל">
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
    
    <!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="סגור"></button>
            <button class="pswp__button pswp__button--share" title="שתף"></button>
            <button class="pswp__button pswp__button--fs" title="מסך מלא"></button>
            <button class="pswp__button pswp__button--zoom" title="זום"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div> 
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="הקודם">
          </button>
          <button class="pswp__button pswp__button--arrow--right" title="הבא">
          </button>
          <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
          
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/magnificpopup.min.js"></script>
    <script src="js/photoswipe.min.js"></script>
    <script src="js/photoswipe-ui-default.min.js"></script>
    <script src="js/validationutils.js"></script> 
    <script src="js/park.js"></script>  
    <script src="js/sendto.js"></script>  

  </body>
</html>