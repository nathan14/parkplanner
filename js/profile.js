window.onload = function() {
  $('#loader').hide();
}

// set page title in mobile view
$(document).ready(function() {
  if(get_cookie('email') === "") {
    window.location.href = "/";
  }
  $('#page-title-mobile').html('פרופיל');
  $('#email-profile').val(get_cookie('email'));
  $('#fname-profile').val(get_cookie('fname'));
  $('#lname-profile').val(get_cookie('lname'));
  if(get_cookie('updates') == '1') {
    $('#mail-updates').prop("checked", true);
  }
  else {
    $('#mail-updates').prop("checked", false);
  }
});

$('#profile-form').submit(function(e) {
  e.preventDefault();
  var id = get_cookie('id');
  var email = $('#email-profile').val();
  var fname = $('#fname-profile').val();
  var lname = $('#lname-profile').val();
  var password = $('#password').val();
  var updates = "";
  if($('#mail-updates').is(":checked")) {
	updates = 1;
  }
  else updates = 0;
  var passwordValidate = $('#password-validate').val();
  
  var isValidEmail = validateEmailInput('#email-profile');
  var isValidFName = validateField('#fname-profile');
  var isValidLName = validateField('#lname-profile');
  var minPasswordLength = 5;
  var isValidPassword = validateField('#password');
  var isValidPassword = validateFieldLength('#password', minPasswordLength);
  
  if(!isValidEmail) {
    $('#email_label-status').html('נא להזין אימייל תקין');
	changeToRedFont('#email_label-status');
  }
  
  if(!isValidPassword) {
    $('#password-status').html('נא להזין ססמא באורך ' + minPasswordLength + ' תוים לפחות');
	changeToRedFont('#password-status');
  }
    
  if(!isValidEmail || !isValidFName || !isValidLName || !isValidPassword) {
    return false;
  }
  else {
	var lang = get_cookie('lang');
	$.ajax({
		url: "php/profiile-update.php",
		type: "POST",
		data: {
			id: id,
			fname: fname,
			lname: lname,
			email: email,
			password: password,
			updates: updates
		},
		cache: false,
		success: function(data) {
		  if(data === 'Email Exists') {
			$('#email_label-status').html('<span lang="he">האימייל כבר קיים</span>');
			changeToRedFont('#email_label-status');
			changeToRed('#email-profile');			
		  }
		  else {			
			set_cookie("email", email);
			set_cookie("fname", fname);
			set_cookie("lname", lname);
			set_cookie("updates", updates);
			set_cookie("password", password);
			doWhenLoggedIn(fname, get_cookie('id'), true);
			
			if(lang == 'en') {
			  stringToHtml = '<div align="center"><b><span lang="he">Your profile has been updated </span><span class="glyphicon glyphicon-ok"><span></b>';
			}
			else {
			  stringToHtml = '<div align="center"><b><span lang="he">פרטייך עודכנו בהצלחה </span><span class="glyphicon glyphicon-ok"><span></b>';
			}
			
			stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-success"><span lang="he">המשך לעמוד הראשי</span></a></div>';
			$('#profile-form').html(stringToHtml);
			$('#profile-form').css('color', '#090');
		  }
		},
		error: function() {
		  stringToHtml = '<div align="center"><b><span lang="he">התרחשה שגיאה </span><span class="glyphicon glyphicon-remove"><span></b>';
		  stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-danger"><span lang="he">המשך לעמוד הראשי</span></a></div>';
		  $('#profile-form').html(stringToHtml);
		  $('#profile-form').css('color', '#900');				   
		},
	})	  
  }
});