window.onload = function() {
  $('#loader').hide();
  if(get_cookie('lang') === "") {
    $('#lang-modal').modal('show');
  }
}

$('#lang-modal').click(function() {
  $('#lang-modal').modal('hide');
});

// set page title in mobile view
$('#page-title-mobile').html('מתכנן הפארקים באורלנדו');

// manage children fields
$('#num_of_children').on('change', set_children_fields);

// load from cookies
$(document).ready(function() {
  if(get_cookie('arrival_date') != "") {
	$('#datepicker').val(get_cookie('arrival_date'));
	$('#datepickerEN').val(get_cookie('arrival_date'));
	$('#total_days').val(get_cookie('total_days'));
	$('#total_adults').val(get_cookie('total_adults'));
	$('#num_of_children').val(get_cookie('num_of_children'));
	$('#extreme').val(get_cookie('extreme'));
	set_children_fields();
  }
  
  datePickerToShow();
  
});

function set_children_fields() {
  var num_of_children_selected = $('#num_of_children').val();
  num_of_children_selected++;
  
  for(i=1; i < num_of_children_selected; i++) {
    $('#child_age_' + i).show('fast');
	$('#c' + i).val(get_cookie('child_age_' + i));
  }
  
  for(i = num_of_children_selected; i < 6; i++) {
    $('#child_age_' + i).hide('fast');
	$('#c' + i).val('0');
  }
}

function validate() {  
  var validChildren = validateChildren();
  var validDate = validateArrivalDate();
  var validTotalPax = validteTotalPax();
  
  if(!validChildren || !validDate || !validTotalPax) {
	return false;
  }
  else {
	var lang = get_cookie('lang');
	if(lang === 'en') {
	  set_cookie("arrival_date", $('#datepickerEN').val());
	}
	else {
	  set_cookie("arrival_date", $('#datepicker').val());
	}
	set_cookie("total_days", $('#total_days').val());
	set_cookie("total_adults", $('#total_adults').val());
	set_cookie("num_of_children", $('#num_of_children').val());
	set_cookie("extreme", $('#extreme').val());
	var children = $('#num_of_children').val();
	
	for(i = 1; i <= children; i++) {
	  set_cookie('child_age_' + i, $('#c' + i).val());
	}
  }
}

// validation functions
function validateArrivalDate() {
  var arrival_date = $('#datepicker').val();
  var arrival_date_en = $('#datepickerEN').val();
  
  if(arrival_date === '' && arrival_date_en === '') {
	changeToRed('#datepicker');
	return false;
  }
  else return true;
}

function validteTotalPax() {
  if($('#num_of_children').val() + $('#total_adults').val() == 0) {
	changeToRed('#num_of_children');
	changeToRed('#total_adults');
	return false;
  }
  else return true;
}

function validateChildren() {
  var children = $('#num_of_children').val();
  var isValid = true;

  for(i = 1; i <= children; i++) {
	if($('#c' + i).val() === null) {
	  changeToRed('#c' + i);
	  isValid = false;
	}
  }
  
  return isValid;
}

// change colors for fields based on validation
$('#datepicker').click(function() {
  changeToWhite('#datepicker');
});

$('#total_adults').change(function() {
  if($(this).val() > 0) {
    changeToWhite('#num_of_children');
  }
});

$('#num_of_children').change(function() {
  if($(this).val() > 0) {
	changeToWhite('#total_adults');
  }
});

function datePickerToShow() {
  var lang = get_cookie('lang');
  if(lang === 'en') {
    $('#datepickerEN').css('display', 'block');
	$('#datepicker').css('display', 'none');
  }
  else {
    $('#datepicker').css('display', 'block');
	$('#datepickerEN').css('display', 'none');
  }
}

$('#lang-english').click(datePickerToShow);
$('#lang-init-en').click(datePickerToShow);
$('#lang-hebrew').click(datePickerToShow);
$('#lang-init-he').click(datePickerToShow);

// initalize datepicker
var picker = new Pikaday(
{
	field: document.getElementById('datepicker'),
	firstDay: 0,
	format: 'DD-MM-YYYY',
	i18n: {
	  previousMonth : 'הקודם',
	  nextMonth     : 'הבא',
	  months        : ['ינואר','פברואר','מרץ','אפריל','מאי','יוני','יולי','אוגוסט','ספטמבר','אוקטובר','נובמבר','דצמבר'],
	  weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
	  weekdaysShort : ['א','ב','ג','ד','ה','ו','ש']
	},
	isRTL: false,
	position: 'right',
	onSelect: function() {
	  console.log(this.getMoment().format('Do MM YYYY'));
	},
	minDate: new Date('2015-01-01'),
	maxDate: new Date('2016-12-31'),
	yearRange: [2015,2017]
});

var pickerEN = new Pikaday(
{
	field: document.getElementById('datepickerEN'),
	firstDay: 0,
	format: 'DD-MM-YYYY',
	i18n: {
	  previousMonth : 'Previous Month',
	  nextMonth     : 'Next Month',
	  months        : ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
	  weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
	  weekdaysShort : ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
	},
	isRTL: true,
	position: 'left',
	onSelect: function() {
	  console.log(this.getMoment().format('Do MM YYYY'));
	},
	minDate: new Date('2015-01-01'),
	maxDate: new Date('2016-12-31'),
	yearRange: [2015,2017]
});