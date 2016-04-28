window.onload = function() {
  $('#loader').hide();
}	

$(document).ready(function() { 
  if(get_cookie('total_days') === "") {
    window.location.href = "/";
  }
  $('#page-title-mobile').html('לוח שנה');
  $('#email-sendto').val(get_cookie('email'));
  setDatesAndParks();
  setResultDetails();
  
  if($(window).width() < 768) {
    $('#sendto-mobile').addClass('sendto');
	$('#sendto-web').removeClass('sendto');
  }
  else {
    $('#sendto-mobile').removeClass('sendto');
	$('#sendto-web').addClass('sendto');
  }
});

$(window).resize(function() {
  if($(window).width() < 768) {
    $('#sendto-mobile').addClass('sendto');
	$('#sendto-web').removeClass('sendto');
  }
  else {
    $('#sendto-mobile').removeClass('sendto');
	$('#sendto-web').addClass('sendto');
  }
});

// global vars
var dateParkArray = [];
var days = localStorage.getItem('days');
var date = localStorage.getItem('date');
var parksData = localStorage.getItem('parksData');
parksData = JSON.parse(parksData);

var stringHtmlSendtoEn = '';
var stringHtmlSendto = '';

$('.btn-park').click(function() { // plus button
  var btnNumber = (this.id.substring(8, 9) * 1);
  var parkName = $('#park-name' + btnNumber).html();
  var dateDivName = 'date-div';
  var dateDivSelector = '#' + dateDivName + currentDateDivIndex;
  
  var currentDateDivIndex = getNextEmptyDateDiv();

  disableSelection(btnNumber, currentDateDivIndex);
  
  $('#date-park-name' + currentDateDivIndex).html(parkName);
  
  checkIfSendShouldBeDisabled();
  
  dateParkArray[currentDateDivIndex] = btnNumber;
});

$('.btn-date-park').click(function() { // minus button
  var btnNumber = (this.id.substring(13, 14) * 1);
  $('#date-park-name' + btnNumber).html("");
  
  checkIfSendShouldBeDisabled();
  
  enableSelection(dateParkArray[btnNumber], btnNumber);
});

function disableSelection(btnNumber, currentDateDivIndex) {
  $('#btn-park' + btnNumber).attr('disabled', 'disabled');
  $('#btn-park' + btnNumber).hide();
  $('#park-name' + btnNumber).hide();
  $('#park-div' + btnNumber).css('opacity', '0');
  $('#btn-date-park' + currentDateDivIndex).show();
  var parkName = $('#park-name' + btnNumber).html();
  $('#date-container' + currentDateDivIndex).css('background', 'url("images/calendar/' + parkName + '.jpg")');
}

function enableSelection(btnNumber, currentDateDivIndex) {
  $('#btn-park' + btnNumber).removeAttr('disabled');
  $('#btn-park' + btnNumber).show();
  $('#park-name' + btnNumber).show();
  $('#park-div' + btnNumber).css('opacity', '1');
  $('#btn-date-park' + currentDateDivIndex).hide();
  $('#date-container' + currentDateDivIndex).css('background', 'white');
}

function getNextEmptyDateDiv() {
  for(i = 0; i <= 9; i ++) {
    divToCheck = $('#date-park-name' + i).html();
	if(divToCheck === '') {
	  return i;
	}
  }
 
  return false;
}

function checkIfSendShouldBeDisabled() {
  var days = localStorage.getItem('days');
  
  for(i = 0; i <= (days - 1); i ++) {
    divToCheck = $('#date-park-name' + i).html();
	if(divToCheck === '') {
	  $('#sendto-web').attr('data-target', '#not-completed');
	  $('#sendto-mobile').attr('data-target', '#not-completed');
	  return;
	}
  }
  
  $('#sendto-web').attr('data-target', '#sendto');
  $('#sendto-mobile').attr('data-target', '#sendto');
  return;
}

function setDatesAndParks() {

  var start_date_day = date.substring(0, 2);
  var start_date_month = date.substring(3, 5);
  var start_date_year = date.substring(6, 10);
  var start_date = "";
  start_date += start_date_year + '-' + start_date_month + '-' + start_date_day;
  var start_date_string = start_date.toString('yyyy-MM-dd');
  var end_date = Date.parse(start_date_string).add(parseInt(days)).days();
  end_date = end_date.toString('yyyy-MM-dd');  
  
  for(i = 0; i < days; i++) {
	newDate = start_date_string;
	newDate = Date.parse(newDate).add(parseInt(i)).days();
	newDate = newDate.toString('dd/MM/yyyy');  
    $('#date-dat' + i).html(newDate);
	$('#park-name' + i).html(parksData[i].park_name);
	$('#date-div' + i).show();
	$('#park-div' + i).show();
	$('#park-container' + i).css('background', 'url("images/calendar/' + parksData[i].park_name + '.jpg")');
  }
}

function findParkId(parkName) {
  for(j = 0; j < days; j++) {
    if(parkName === parksData[j].park_name) {
	  return parksData[j].park_id;
	}
  }
}

$('#sendto').submit(function(e) {
  e.preventDefault();
  var email = $('#email-sendto').val();
  var parksDataForPhp = '';
  partialResetSendto();
  
  var isValidEmail = validateEmailInput('#email-sendto', '#sendto-form-status');
  if(!isValidEmail) {
    return false;
  }
  else {
	$('#sendto-form-status').html('<span lang="he">שולח...</span>');
	$('#sendto-form-status').show('slow');
	
	stringHtmlSendtoEn = '';
	stringHtmlSendtoEn += 'Hi! Thanks for planning your trip with Orlando Park Planner.<br>';
	stringHtmlSendtoEn += 'Here is your upcoming schedule for your visit to Orlando. <br>';
	stringHtmlSendtoEn += 'We also attached the map for the parks you are about to visit. <br>';
	
	stringHtmlSendto = '';
	stringHtmlSendto += 'היי! תודה שבחרת לתכנן את הנסיעה שלך עם מתכנן הפארקים. <br>';
	stringHtmlSendto += 'להלן לוח הזמנים שבחרת עבור הטיול הקרוב שלך באורלנדו.  <br>';
	stringHtmlSendto += 'בנוסף, צרפנו את מפות הפארקים בהם תבקרו. <br>';
	  	
	for(i = 0; i < days; i++) {
	  var currentParkName = $('#date-park-name' + i).html();
	  var currentDate = $('#date-dat' + i).html();
	  var currentParkId = findParkId(currentParkName);
	  	  
	  parksDataForPhp += currentParkName + ',';
	  
	  stringHtmlSendtoEn += '<p> <strong>Day ' + (i+1) + ' - ' + currentDate + '</strong> <br>';
	  stringHtmlSendtoEn += currentParkName + '<br>';
	  stringHtmlSendtoEn += '<a href="http://parkplanner.co.il/park.php?id=' + currentParkId + '">Recommended Route & more info</a></p>';
	  
	  stringHtmlSendto += '<p> <strong>יום ' + (i+1) + ' - ' + currentDate + '</strong> <br>';
	  stringHtmlSendto += currentParkName + '<br>';
	  stringHtmlSendto += '<a href="http://parkplanner.co.il/park.php?id=' + currentParkId + '">מידע נוסף ומסלול מומלץ</a></p>';
	}
	
	stringHtmlSendto += 'להמשך תכנון הנסיעה שלך לאורלנדו - <a href="http://parkplanner.co.il">parkplanner.co.il</a>';
	stringHtmlSendtoEn += 'Continue planning your trip - <a href="http://parkplanner.co.il">parkplanner.co.il</a>';
	
	stringHtmlSendtoTemp = stringHtmlSendto;
	
	var lang = get_cookie('lang');
	if(lang === ('en')) {
	  stringHtmlSendto = stringHtmlSendtoEn;
	}
	else {
	  stringHtmlSendto = stringHtmlSendtoTemp;
	}
	
	$.ajax({
		url: "php/mail-calendar.php",
		type: "POST",
		data: {
			stringHtmlSendto: stringHtmlSendto,
			email: email,
			lang: lang,
			parksDataForPhp: parksDataForPhp
		},
		cache: false,
		success: function() {
		  $('#sendto-form-status').html('<span lang="he">נשלח בהצלחה</span>');
		  $('#sendto-form-status').css('color', '#090');
		  $('#sendto-form-status').show('slow');
		  $('#email-sendto').val("");
		  hideStatus();
		},
		error: function() {
		  $('#sendto-modal').html('<b>התרחשה שגיאה <span class="glyphicon glyphicon-remove"><span></b>');
		  $('#sendto-modal').css('color', '#900');
		},
	})
  }
});