function validateEmailInput(emailField, labelField) {
  if(!validateEmail($(emailField).val())) {
    changeToRed(emailField);
	changeToRedFont(labelField);
    $(labelField).html('<span lang="he">נא להזין אימייל תקין</span>');
	$(labelField).show('slow');
	return false;
  }
  else return true;
}

function validateEmail(email) { 
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validateField(field) {
  if($(field).val() === "") {
	changeToRed(field);
    return false;
  }
  else return true;
}

function validateFieldLength(field, length) {
  var value = $(field).val();
  if(value.length < length) {
    return false;
  }
  else return true;
}

function validatePassword(password1, password2) {
  pass1Value = $(password1).val();
  pass2Value = $(password2).val();
  
  if(pass1Value !== pass2Value || pass1Value === "") {
    changeToRed(password1);
	changeToRed(password2);
	return false;
  }
  else return true;
}

$('.white_click').click(function() {
  changeToWhite(this);
});

// change color functions
function changeToWhite(toBeChanged) {
  $(toBeChanged).css('background-color', 'white');
  if(toBeChanged.name === 'email') {
    $('#email_label-status').html("");
  }
  if(toBeChanged.name === 'password') {
	$('#password-status').html("");
  }
}

function changeToRed(toBeChanged) {
  $(toBeChanged).css('background-color', '#FFC4C4');
}

function changeToRedFont(toBeChanged) {
  $(toBeChanged).css('color', '#900');
}

function changeToGreenFont(toBeChanged) {
  $(toBeChanged).css('color', '#090');
}

function changeToBlue(toBeChanged) {
  $(toBeChanged).css('background-color', '#4D7B9D;');
}
