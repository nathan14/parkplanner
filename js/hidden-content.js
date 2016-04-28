$(document).ready (function (){
  if(get_cookie('email') === "") {
	$('#hidden-content').hide();
	var stringHtml = ' <i class="fa fa-lock" id="login-message-icon"></i><br>';
	stringHtml += '<span lang="he">צפייה בתוכן זה מתאפשרת למשתמשים רשומים בלבד.</span> <br>'
	stringHtml += '<button class="btn btn-lg btn-pink-form" data-toggle="modal" data-target="#login-modal" lang="he">לכניסה</button>';
	$('#login-message').html(stringHtml);
	$('#login-message').css('display', 'block');
  }
  else {
	$('#hidden-content').show();
	$('#login-message').html('');
	$('#login-message').css('display', 'none');
  }
});