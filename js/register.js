window.onload = function() {
  $('#loader').hide();
}	

// set page title in mobile view
$(document).ready(function() { 
  $('#page-title-mobile').html('הרשמה');
});

$('#register-form').submit(function(e) {
  e.preventDefault();
  var email = $('#email-register').val();
  var uname = $('#uname-register').val();
  var fname = $('#fname-register').val();
  var lname = $('#lname-register').val();
  var password = $('#password').val();
  var updates = "";
  if($('#mail-updates').is(":checked")) {
    updates = 1;
  }
  else updates = 0;
  
  var isValidEmail = validateEmailInput('#email-register');
  var isValidUName = validateField('#uname-register');
  var isValidFName = validateField('#fname-register');
  var isValidLName = validateField('#lname-register');
  var minPasswordLength = 5;
  var isValidPassword = validateField('#password');
  var isValidPassword = validateFieldLength('#password', minPasswordLength);
  
  if(!isValidEmail) {
    $('#email_label-status').html('<span lang="he"נא להזין אימייל תקין</span>');
	changeToRedFont('#email_label-status');
  }
  
  if(!isValidPassword) {
    $('#password-status').html('נא להזין ססמא באורך ' + minPasswordLength + ' תוים לפחות');
	changeToRedFont('#password-status');
  }
    
  if(!isValidEmail || !isValidUName || !isValidFName || !isValidLName || !isValidPassword) {
    return false;
  }
  else {
	var lang = get_cookie('lang');
	$.ajax({
		url: "php/register.php",
		type: "POST",
		data: {
			fname: fname,
			lname: lname,
			email: email,
			updates: updates,
			password: password
		},
		cache: false,
		success: function(data) {
		  if(data === 'Email Exists') {
			$('#email_label-status').html('<span lang="he">האימייל כבר קיים</span>');
			changeToRedFont('#email_label-status');
			changeToRed('#email-register');			
		  }
		  else {
			set_cookie("email", email);
			set_cookie("fname", fname);
			set_cookie("lname", lname);
			set_cookie("id", data[0].id); // get auto generated id from database
			set_cookie("role", '0'); // admin or not
			set_cookie("updates", updates);
			set_cookie("password", password);
			id = data[0].id;
			$('#user-name').html(fname);
			doWhenLoggedIn(uname, id, true);	
			
			if(lang == 'en') {
			  stringToHtml = '<div align="center"><b><span lang="he">Registration Completed </span><span class="glyphicon glyphicon-ok"><span></b>';
			}
			else {
			  stringToHtml = '<div align="center"><b><span lang="he">ההרשמה הושלמה </span><span class="glyphicon glyphicon-ok"><span></b>';
			}		  		
			stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-success"><span lang="he">המשך לעמוד הראשי</span></a></div>';
			$('#register-form').html(stringToHtml);
			$('#register-form').css('color', '#090');
		  }
		},
		error: function(error) {
		  stringToHtml = '<div align="center"><b><span lang="he">התרחשה שגיאה </sapn><span class="glyphicon glyphicon-remove"><span></b>';
		  stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-danger"><span lang="he">המשך לעמוד הראשי</sapn></a></div>';
		  $('#register-form').html(stringToHtml);
		  $('#register-form').css('color', '#900');				   
		},
	})	  
  }
});