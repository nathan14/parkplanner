Lang.prototype.attrList.push('title');

function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
  });
  return vars;
}

$('#btn-calendar').click(function() {
  var days 	= getUrlVars()["days"];
  var lang = get_cookie('lang');
  if(lang === 'en') {
    var date = getUrlVars()["dateEN"];
  }
  else {
	var date = getUrlVars()["date"];
  }
  
  localStorage.setItem('days', days);
  localStorage.setItem('date', date);
  
  window.location.href = 'calendar.php';
});

$(document).ready(function() {  
  $('#page-title-mobile').html('תוצאות');
  $('#footer-menu-weather').html('<span lang="he">טוען...</span>');
  setResultDetails();
  	
  var days 	= getUrlVars()["days"];
  var adt 	= getUrlVars()["adt"];
  var chl 	= getUrlVars()["chl"];
  var ext 	= getUrlVars()["ext"];
  
  if(ext === 'scary') {
    ext = 1;
  }
  else if(ext === 'medium') {
    ext = 0;
  }
  else {
    ext = -1;
  }
    
  var wtr 	= getUrlVars()["wtr"];
  var date	= getUrlVars()["date"];
  
  var childArr = [];
  childArr[0] 	= getUrlVars()["c1"];
  childArr[1] 	= getUrlVars()["c2"];
  childArr[2]	= getUrlVars()["c3"];
  childArr[3] 	= getUrlVars()["c4"];
  childArr[4] 	= getUrlVars()["c5"];
  
  var age_18 = adt;
  var age_13_17 = 0;
  var age_8_12 = 0;
  var age_3_7 = 0;
    
  for(i = 0; i < chl; i++) { // get childern age based on number of children
    if(childArr[i] > 12)
	  age_13_17 ++;
	else if (childArr[i] > 7) {
	  age_8_12 ++;
	}
	else {
	  age_3_7 ++;
	}
  }

  var water = 0;
  
  var lang = get_cookie('lang');
  if(lang === 'en') {
    var date = getUrlVars()["dateEN"];
  }
  else {
	var date = getUrlVars()["date"];
  }
    
  // modify and create start & end dates
  var start_date_day = date.substring(0, 2);
  var start_date_month = date.substring(3, 5);
  var start_date_year = date.substring(6, 10);
  var start_date = "";
  start_date += start_date_year + '-' + start_date_month + '-' + start_date_day;
  var start_date_string = start_date.toString('yyyy-MM-dd');
  var end_date = Date.parse(start_date_string).add(parseInt(days)).days();
  end_date = end_date.toString('yyyy-MM-dd');
    
  $.ajax({
	  url: "php/park-load.php",
	  type: "POST",
	  data: {
		  start_date: start_date,
		  end_date: end_date
	  },
	  cache: false,
	  success: function(data) {
		localStorage.setItem('parkLoad', JSON.stringify(data));
	    var parkLoad = data[0].avarage;
		if(parkLoad === 0) {
		  loadNotAvailable()
		}
		else {
		  parkLoad = Math.round(parkLoad * 100) / 100;
		  determineParkLoad(parkLoad);
		}
	  },
	  error: function() {
		loadNotAvailable()
	  },
  })
  
  function determineParkLoad(parkLoad) {	
	var result;
	var color;
	var showScore = true;
		
	if(parkLoad == 0) {
	  showScore = false;
	}
	else if(parkLoad < 4) {
	  result = 'נמוך';
	  color = '#090';
	}
	else if(parkLoad < 7) {
	  result = 'בינוני';
	  color = '#8a6d3b';
	}
	else if(parkLoad <= 10) {
	  result = 'גבוה';
	  color = '#900';
	}
	
	if(showScore) {
	  $('#park-load').html('<span lang="he">' + result + '</span> ' + parkLoad + ' / 10');
	  $('#park-load').css('color', color);
	  $('#footer-menu-load').html('<span lang="he">' + result + '</span> ' + parkLoad + ' / 10 <span lang="he">ממוצע עומס בתאריכי הגעה</span>');
	  $('#footer-menu-load').css('color', color);	
	}
	else {
	  $('#park-load').html('<span lang="he">לא זמין</span>');
	  $('#footer-menu-load').html('<span lang="he"> לא זמין </span>');
	}
  }
  
  // Weather Underground API
  var startDateWeather = start_date_string.toString('MMdd');
  startDateWeather = startDateWeather.substring(5, 10);
  var endDateWeather = end_date.toString('MMdd');
  endDateWeather = endDateWeather.substring(5, 10);
  $('#weather').html('<span lang="he">טוען...</span>');
    
  $.ajax({
	  url: "http://api.wunderground.com/api/d1ab30be3178ac9b/planner_" + startDateWeather + endDateWeather + "/q/FL/Orlando.json",
	  dataType: "jsonp",
	  success: function(data) {
		localStorage.setItem('weather', JSON.stringify(data));
		var maxTemp = data['trip']['temp_high']['avg']['C'];
		var minTemp = data['trip']['temp_low']['avg']['C'];
		$('#weather').html(maxTemp + '° - ' + minTemp + '°');
		setWeather(maxTemp, minTemp);
	  },
	  error: function() {
		$('#weather').html('<span lang="he">לא זמין</span>');
	  },
  })
  
  // Weather Underground API
  
  if((age_13_17 + age_8_12 + age_3_7) > 0) {
    var age_18_ignore = age_18;
	age_18 = 0;
  }
  else {
    age_18_ignore = 0;
  }
	    
  $.ajax({				
	  url: "php/data.php",
	  type: "POST",
	  data: {
		  age_18: age_18,
		  age_18_ignore: age_18_ignore,
		  age_13_17: age_13_17,
		  age_8_12: age_8_12,
		  age_3_7: age_3_7,
		  water: water,
		  ext: ext,
		  date: date,
		  days: days
	  },
	  cache: false,
	  success: function(data) {
		  localStorage.setItem('parksData', JSON.stringify(data));
		  setParks(data);
		  showParks();
		  $('.results-sort').css('display', 'block');
	  },
	  error: function() {
	  },
  })
});

var parks = [];

function setParks(data) {
  for(i = 0; i < data.length; i++) {
    parks[i] = data[i];
	parks[i].park_fit = i; // create fit level field
  }
}

function showParks() {
  var string_to_html = "";
  var totalPax = getUrlVars()["chl"] * 1;
  if(totalPax === 0) {
    totalPax += getUrlVars()["adt"] * 1;
  }
    
  for(i = 0; i < parks.length; i++) {
	string_to_html += '<li> <a href="park.php?id=';
	string_to_html += parks[i].park_id;
	string_to_html += '" class="list-group-item">';
	string_to_html += '<img class="results-img" src="images/logo/results_';
	string_to_html += parks[i].modal_name;
	string_to_html += '.png">';
	string_to_html += '<h3 class="list-group-item-heading">'
	string_to_html += parks[i].park_name;
	string_to_html += '</h3> <div class="list-group-item-text">';
	string_to_html += '<p><strong lang="he">מידת התאמה: </strong> ' + calculateFit(parks[i].total, totalPax) + '%';
	string_to_html += '</p> <p> <strong lang="he">רמת אקסטרים: </strong> ';
	string_to_html += parks[i].park_extreme + ' <span lang="he">מתוך</span> 10 <br> </p>';
	string_to_html += '<p class="hidden-xs"> <strong lang="he"> כתובת: </strong>';
	string_to_html += parks[i].address + '</p> </div>';
	string_to_html += '<button class="btn btn-info btn-lg pull-left hidden-xs" lang="he">פרטים נוספים</button>';
	string_to_html += '</a></li>';
  }
  
  $('#results_parks').html(string_to_html);
  $('#results-div').css('display', 'block');  
  $('#loader').hide();
}

function calculateFit(total, totalPax) {
  var res = Math.round(total / totalPax);
  if(res > 100) {
    return 100;
  }
  else return res;
}

$('#sortby').change(function() {
  var sortMethod = $('#sortby').val();
  if(sortMethod === 'שם פארק') {
    sortMethod = 'Park Name';
  }
  updateSort(sortMethod);
});

$('#sortby-mobile').change(function() {
  var sortMethod = $('#sortby-mobile').val();
  updateSort(sortMethod);
});

function updateSort(sortMethod) { 
  if(sortMethod === 'Park Extreme') {
    sortByExtreme(); 
  }
  else if(sortMethod === 'Park Name') {
    sortByName();
  }
  else if(sortMethod === 'Park Fit') {
    sortByFit();
  }
  
  showParks();  }

function sortByExtreme() {
  parks.sort(function(park1, park2) {
    return park2.park_extreme - park1.park_extreme;
  });
}

function sortByName() {
   parks.sort(function(park1, park2) {
    return park2.park_name < park1.park_name;
  });
}

function sortByFit() {
  parks.sort(function(park1, park2) {
    return park1.park_fit - park2.park_fit;
  });
}

function loadNotAvailable() {
  $('#park-load').html('לא זמין');
  $('#footer-menu-load').html('לא זמין');
}

var weather = "";
var parkLoad = "";

function setWeather(minTemp, MaxTemp) {
  weather = minTemp + '° - ' + MaxTemp + '°';
  $('#footer-menu-weather').html(weather + ' <span lang="he">(משוער בהתאם לתאריך ההגעה)</span>');
}

function setParkLoad(data) {
  
}

$('.submenu').click(function() {
  var submenuType = this.id;
  
  if(submenuType === 'show-weather') {
	$('#footer-menu-weather').toggle(1);
    $('#show-weather').toggleClass('activelink');
	$('#show-sort').removeClass('activelink');
	$('#show-park-load').removeClass('activelink');
	$('#footer-menu-sort').hide(1);
	$('#footer-menu-load').hide(1);
  }
  else if(submenuType === 'show-sort') {
	$('#footer-menu-sort').toggle(1);
	$('#show-sort').toggleClass('activelink');
	$('#show-weather').removeClass('activelink');
	$('#show-park-load').removeClass('activelink');	
	$('#footer-menu-weather').hide(1);
	$('#footer-menu-load').hide(1);
  }
  else if(submenuType === 'show-park-load') {
	$('#footer-menu-load').toggle(1);
	$('#show-park-load').toggleClass('activelink');
	$('#show-sort').removeClass('activelink');
	$('#show-weather').removeClass('activelink');
	$('#footer-menu-sort').hide(1);
	$('#footer-menu-weather').hide(1);
  }    
});

$(window).resize(function() {
  hideSubMenu(); // hide sub menu when changing from mobile to desktop
});

function hideSubMenu() {
  $('#footer-menu-load').hide('fast');
  $('#footer-menu-sort').hide('fast');
  $('#footer-menu-weather').hide('fast');
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

function fbShare() {
  var url = document.URL;
  
  FB.ui({
	method: 'share',
	href: url,
  }, function(response){});
}

function gpShare() {
  var url = document.URL;
  window.open('https://plus.google.com/share?url='+ url,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');  
}

$('#btn-sort').click(function() {
  $('#sortby-mobile').attr('size',6);
});