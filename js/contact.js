window.onload = function() {
  $('#loader').hide();
}

// set page title in mobile view
$(document).ready(function() { 
  $('#page-title-mobile').html('צור קשר');
});

$('#contact-form').submit(function(e) {
  e.preventDefault();
  var email = $('#email-contact').val();
  var name = $('#name').val();
  var contact_content = $('#contact_content').val();
  var isValidEmail = validateEmailInput('#email-contact');
  var isValidName = validateField('#name');
  var isValidContent = validateField('#contact_content');
  
  if(!isValidEmail || !isValidName || !isValidContent) {
    return false;
  }
  else {
	$.ajax({
		url: "php/mail-contact.php",
		type: "POST",
		data: {
			name: name,
			contact_content: contact_content,
			email: email
		},
		cache: false,
		success: function() {
		  stringToHtml = '<div align="center"><b><span lang="he">נשלח בהצלחה </span><span class="glyphicon glyphicon-ok"><span></b>';
		  stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-success"><span lang="he">המשך לעמוד הראשי</span></a></div>';
		  $('#contact-form').html(stringToHtml);
		  $('#contact-form').css('color', '#090');
		},
		error: function() {
		  stringToHtml = '<div align="center"><b>התרחשה שגיאה <span class="glyphicon glyphicon-remove"><span></b>';
		  stringToHtml += '<br><br><a href="/" class="btn btn-lg btn-danger">המשך לעמוד הראשי</a></div>';
		  $('#contact-form').html(stringToHtml);
		  $('#contact-form').css('color', '#900');				   
		},
	})	  
  }
});