  
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">הצג תפריט</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand hidden-xs hidden-sm" href="/" lang="he">
             <span class="show-ltr">&nbsp;</span> מתכנן הפארקים באורלנדו
            <img class="pull-right navbar-brand-logo" src="images/logo.png">
          </a>
          <a class="navbar-brand visible-xs" id="back-btn" href="javascript:history.back()"><i class="fa fa-arrow-right"></i></a>
          <a class="navbar-brand visible-xs" id="page-title-mobile" lang="he"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/"> <span class="glyphicon glyphicon-home"></span> <span lang="he"> בית </span> </a></li>
            <li><a href="map.php"> <span class="glyphicon glyphicon-map-marker" lang="he"></span> <span lang="he"> מפה </span> </a></li>
            <li><a href="tips.php"> <span class="glyphicon glyphicon-info-sign"></span> <span lang="he"> טיפים </span> </a></li>
            <li><a href="forecast.php"> <i class="fa fa-sun-o"></i> <span lang="he"> תחזית </span> </a></li>
            <li><a href="contact.php"> <span class="glyphicon glyphicon-envelope"></span> <span lang="he"> צור קשר </span> </a></li>   
            <li id="nav-dashboard">
              <a href="dashboard.php" id="dashboard-link"> <span class="glyphicon glyphicon-cog"></span> <span lang="he"> לוח בקרה </span> </a>
            </li>
            <li id="nav-profile">
              <a href="profile.php" id="profile-link">
                <span class="glyphicon glyphicon-user"></span>
                <span id="user-name"></span>
              </a>
            </li>
            <li id="nav-logout">
              <a id="logout-link" href="" onclick="logout()"> <span class="glyphicon glyphicon-off"></span> <span lang="he"> יציאה </span> </a>
            </li>
            <li id="nav-login">
              <a href="#" id="login-link" data-toggle="modal" data-target="#login-modal"> <span class="glyphicon glyphicon-user"></span>
                <span lang="he"> כניסה </span>
              </a>
            </li>
            <li id="nav-register">
              <a href="register.php" id="register-link"> <span class="glyphicon glyphicon-pencil"></span> <span lang="he"> הרשמה </span></a>
            </li>  
            <li id="lang-english">
              <a onclick="changeLang('en');"> <i class="fa fa-globe"></i> <span> English </span> </a>
            </li>
            <li id="lang-hebrew">
              <a onclick="changeLang('he');"> <i class="fa fa-globe"></i> <span> עברית </span> </a>
            </li>
                                                    
          </ul>
        </div> <!--/.nav-collapse -->
      </div>
    </nav>
    
    <div class="modal fade" id="login-modal">
      <div class="modal-dialog"> 
        <div class="modal-content"> 
          <div class="modal-body">
            <p class="form-status" id="login-form-status"> </p>
            <form role="form" id="login-form" novalidate>
              <div class="form-group">
                <div class="inner-addon right-addon">
                  <i class="fa fa-envelope"></i>
                  <input type="email" class="form-control input-lg white_click login-reset" id="email-login" lang="he" placeholder="אימייל">
                </div>    
                <p></p>
                <div class="inner-addon right-addon">
                  <i class="fa fa-key"></i>
                  <input type="password" class="form-control input-lg white_click login-reset" id="password-login" lang="he" placeholder="ססמא">
                </div>  
              </div>
            </form>
            <div class="login-utils-btns">
              <button class="btn btn-md btn-general" id="forgot-passowrd" lang="he">שכחתי ססמא</button>
              <button class="btn btn-md btn-general pull-left" id="goto-register" lang="he">הרשמה</button>
            </div>
            <button onclick="checkLogin()" class="btn btn-lg btn-pink-form btn-block" id="btn-login">
              <i class="fa fa-user pull-right btn-inner-addon"></i><sapn class="btn-icon-label" lang="he">כניסה</span>
            </button>
            <p></p>
            <button onclick="doLogin()" class="btn btn-lg btn-fb-form btn-block" id="btn-login-fb">
              <i class="fa fa-facebook-square pull-right btn-inner-addon"></i>
              <sapn class="btn-icon-label" lang="he">כניסה עם פייסבוק</span>
            </button>
            <div id="fb-root">
            <!-- <fb:login-button onlogin="getLoginStatus()" size="xlarge" scope="user_about_me"></fb:login-button> -->
            </div>            
            </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->    

    <div class="modal fade" id="forgot-password-modal">
      <div class="modal-dialog">
        <div class="modal-content"> 
          <div class="modal-body" id="forgot-password-modal-body">
            <p class="form-status" id="forgot-password-modal-status" lang="he"> </p>
            <form role="form" id="forgot-password-form" novalidate>
              <div class="inner-addon right-addon">
                <i class="fa fa-envelope"></i>
                <input type="email" class="form-control input-lg white_click" name="email" id="forgot-password-modal-email" lang="he" placeholder="אימייל">
              </div> 
              <p></p>
              <button type="submit" class="btn btn-lg btn-pink-form btn-block" id="forgot-password-form-submit">
                <i class="fa fa-paper-plane pull-right btn-inner-addon"></i> <sapn class="btn-icon-label" lang="he">אפס ססמא</span>
              </button>
            </form>
            <br />
            <button class="btn btn-md btn-general" id="forgot-password-modal-back" lang="he">חזור להתחברות</button>
            <div id="forgot-password-form-status"></div>    
          </div>
        </div>
      </div>
    </div>  
                
	<script>
	  (function checkLoginCookie() {
		 
		 var email = get_cookie('email');
		 var id = get_cookie('id');
		 var role = get_cookie('role');
		 var fname = get_cookie('fname');
		 var fbname = get_cookie('fbname');
		 var isLoggedIn = false;
		 var isAdmin = false;
	     if(email !== "") {
		   doWhenLoggedIn(fname, id, true);
		   isLoggedIn = true;
		 }
	     if(fbname !== "") {
		   doWhenFaceBookLoggedIn(fbname, true);
		   isLoggedIn = true;
		 }
		 if(role === '1') {
		   isAdmin = true;
		   displayCP();
		 }
		 else {
		   hideCP();
		 }
		 if(!isLoggedIn) {
		   displayLoginHideLogout();
		 }
	  })();
	  
	  $(document).ready(function(e) {
        checkAndSetLang();
      });
	  
	  $('#goto-register').click(function() {
	    window.location.href = 'register.php';
	  });
	  
	  $('#forgot-passowrd').click(initForgotPassword);
	  
	  function initForgotPassword() {
		$('#login-modal').modal('hide');
		$('#forgot-password-modal-status').hide();
		$('#forgot-password-modal-status').html("");
		$('#forgot-password-modal-email').val($('#email-login').val());
		$('#forgot-password-modal').modal('show');
	  }
	  
	  $('#forgot-password-modal-back').click(function() {
	    $('#forgot-password-modal').modal('hide');
		$('#login-modal').modal('show');
	  });
	  
	  $('#forgot-password-modal-email').keydown(function() {
	    $('#forgot-password-modal-status').hide('slow');
		$('#forgot-password-modal-status').html("");
		$('#forgot-password-modal-status').css('color', 'black');
	  });
	  
	  $('#forgot-password-form').submit(function(e) {
		e.preventDefault();
		var email = $('#forgot-password-modal-email').val();
		
		var isValidEmail = validateEmailInput('#forgot-password-modal-email', '#forgot-password-modal-status');
		if(!isValidEmail) {
		  return false;
		}
		else {
		  $('#forgot-password-modal-status').css('color', 'black');
		  $('#forgot-password-modal-status').html('<span lang="he">שולח...</span>');
		  $('#forgot-password-modal-status').show('slow');
			  
		  var lang = get_cookie('lang');
			  
		  $.ajax({
			  url: "php/mail-forgot-password.php",
			  type: "POST",
			  data: {
				  lang: lang,
				  email: email,
			  },
			  cache: false,
			  success: function(data) {
				if(data !== 'No Email') {
				  $('#password-login').val("");
				  $('#login-form-status').html("");
				  $('#forgot-password-modal-status').html('<span lang="he">נשלח בהצלחה</span>');
				  $('#forgot-password-modal-status').css('color', '#090');
				  $('#forgot-password-modal-status').show('slow');
				  setTimeout(function () {$('#forgot-password-modal').modal('hide'); $('#login-modal').modal('show');}, 1000);
				}
				else {
				  $('#forgot-password-modal-status').html('<span lang="he">אימייל לא קיים</span>');
				  $('#forgot-password-modal-status').css('color', '#900');
				}
			  },
			  error: function() {
				alert('error');
			  },
		  })
		}
	  });	  
	  
	  function checkAndSetLang() {
	    var lang = get_cookie('lang');
		setLangButtons(lang);
		changeLang(lang);
	  }
	  
	  function setLangButtons(lang) {
		if(lang === 'en') {
		  $('#lang-hebrew').css('display', 'block');
		  $('#lang-english').css('display', 'none');
		  $('#rtl-css').attr('href', '');
		  $('#ltr-css').attr('href', 'css/ltr-adj.css');
		}
		else {
		  $('#lang-hebrew').css('display', 'none');
		  $('#lang-english').css('display', 'block');
		  $('#rtl-css').attr('href', 'css/bootstrap-rtl.min.css');
		  $('#ltr-css').attr('href', '');
		}
	  }
	  
	  $('.login-reset').keydown(function() {
		$('#login-form-status').hide('slow');
	  });
	  
	  function checkLogin() {
		var email = $('#email-login').val();
		var password = $('#password-login').val();
		
		isValidEmail = validateField('#email-login');
		isValidPassword = validateField('#password-login');
		
		if(isValidEmail	&& 	isValidPassword) {
		  $.ajax({
			  url: "php/check-login.php",
			  type: "POST",
			  data: {
				  email: email,
				  password: password
			  },
			  cache: false,
			  success: function(data) {
				if(data[0] === undefined) {
				  changeToRedFont('#login-form-status');
				  $('#login-form-status').html('<span lang="he">הפרטים שהוזנו שגויים</sapn>');
				  $('#login-form-status').show('slow');
				}
				else {
				  changeToGreenFont('#login-form-status');
				  $('#login-form-status').html('<span lang="he">התחברת בהצלחה!</span>');
				  $('#login-form-status').show('slow');
				  set_cookie("email", email);
				  set_cookie("password", password);
				  set_cookie("fname", data[0].fname);
				  set_cookie("lname", data[0].lname);
				  set_cookie("id", data[0].id);
				  set_cookie("role", data[0].role); // admin or not
				  set_cookie("updates", data[0].updates);
				  id = data[0].id;
				  doWhenLoggedIn(data[0].fname, id, false);
				}
			  },
			  error: function() {
				alert('שגיאת תקשורת');			   
			  }
		  });
		}
	  }
	  
	  function doWhenLoggedIn(fname, id, noRefresh) {
		displayLogoutHideLogin();
			
		$('#profile-link').attr('href', 'profile.php?id=' + id);
		$('#user-name').html(fname);
		if(!noRefresh) {
		  location.reload();
		}
	  }
	  
	  function doWhenFaceBookLoggedIn(name, noRefresh) {
		displayLogoutHideLogin();
		
		$('#profile-link').attr('href', '#');
		$('#user-name').html(name);
		var fbPictureLink = 'https://graph.facebook.com/';
		fbPictureLink +=  get_cookie('fbid') + '/picture?width=20';
		$('#fbpicture').attr('src', fbPictureLink);
		
		if(!noRefresh) {
		  location.reload();
		}
	  }
	  
	  function FBToDatabase(fid, email, fname, lname) {		  
		  $.ajax({
			  url: "php/facebook-log.php",
			  type: "POST",
			  data: {
				  email: email,
				  fid: fid,
				  lname: lname,
				  fname: fname,
			  },
			  cache: false,
			  success: function(data) {
			  }
		  })
	  }
	  
	  function logout() {
		  
		displayLoginHideLogout();
		
		if(get_cookie("fbname")) {
		  delete_cookie("fbname", "", 0);
		  delete_cookie('fbid', "", 0);
		  delete_cookie("email", "", 0);
		}		
		else {  
		  delete_cookie("password", "", 0);
		  delete_cookie("email", "", 0);
		  delete_cookie("role", "", 0);
		  delete_cookie("fname", "", 0);
		  delete_cookie("lname", "", 0);
		}

		window.location.reload(true);
	  }
	  
	  function displayLoginHideLogout() {
		$('#nav-register').css('display', 'inline');
		$('#nav-login').css('display', 'inline');
		$('#nav-logout').css('display', 'none');	
		$('#nav-profile').css('display', 'none');
	  }
	  
	  function displayLogoutHideLogin() {
		$('#nav-register').css('display', 'none');
		$('#nav-login').css('display', 'none');
		$('#nav-logout').css('display', 'inline');	
		$('#nav-profile').css('display', 'inline');
	  }
	  
	  function hideCP () {
		$('#nav-dashboard').css('display', 'none');
	  }
	  
	  function displayCP () {
		$('#nav-dashboard').css('display', 'inline');
	  }
	
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-60178353-1', 'auto');
      ga('send', 'pageview');
	  
	  // ---- FACEBOOK -----
	  function doLogin() {
		FB.login(function(response) {
		   if (response.authResponse) {
		     getLoginStatus();
		   }
		 },{scope: 'email'});
	  }
	  
	  function getLoginStatus() {
		FB.getLoginStatus(function(response) {
		  if(response.status == 'connected') {
			FB.api('/me', function(response) {
			  set_cookie('fbname', response.first_name);
			  set_cookie('fblname', response.last_name);
			  set_cookie('fbid', response.id);
			  set_cookie('email', response.email);
			  FBToDatabase(response.id, response.email, response.first_name, response.last_name);
			  doWhenFaceBookLoggedIn(response.first_name, false);
			});
		  }
		});
	  }
	
	  window.fbAsyncInit = function() {
	  FB.init({
		appId      : '655734597865400',
		cookie     : true, 
		xfbml      : true,  
		version    : 'v2.2',
	  });
	  };
	
	  // Load the SDK asynchronously
	  (function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	  }(document, 'script', 'facebook-jssdk'));
	  
    </script>