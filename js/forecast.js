// set page title in mobile view
$(document).ready(function() { 
  $('#page-title-mobile').html('תחזית - אורלנדו, פלורידה');
  
  $.ajax({
	  url: "http://api.wunderground.com/api/d1ab30be3178ac9b/forecast10day/q/FL/Orlando.json",
	  dataType: "jsonp",
	  success: function(data) {
		  
		setTimeout(function(){  
		
		var stringToHtml = '';
		var date = Date.today().toString('dd/MM/yyyy');
		var start_date_day = date.substring(0, 2);
		var start_date_month = date.substring(3, 5);
		var start_date_year = date.substring(6, 10);
		var start_date = "";
		start_date += start_date_year + '-' + start_date_month + '-' + start_date_day;
		var start_date_string = start_date.toString('yyyy-MM-dd');
		
		var maxTemp;
		var minTemp;
		var conditions;
		var humidity;
		var condtionsHebrew;
		var conditionsIcon;
		var conditionsIconColor;
		var avgWind;
		var dayInWeek;
	
		for(i = 0; i < 10; i++) {
		  newDate = start_date_string;
		  newDate = Date.parse(newDate).add(parseInt(i)).days();
		  newDate = newDate.toString('dd/MM/yyyy');
		  
          maxTemp = data['forecast']['simpleforecast']['forecastday'][i]['high']['celsius'] + '°';
		  minTemp = data['forecast']['simpleforecast']['forecastday'][i]['low']['celsius'] + '°';
		  
		  conditions = data['forecast']['simpleforecast']['forecastday'][i]['conditions'];

		  // translate condition and set icon
		  if(conditions === 'Partly Cloudy') {
			condtionsHebrew = 'מעונן חלקית';
			conditionsIcon = 'climacon cloud sun';
			conditionsIconColor = 'grey';
		  }
		  else if(conditions === 'Chance of a Thunderstorm') {
			condtionsHebrew = 'סיכוי לסופה';
			conditionsIcon = 'climacon lightning';
			conditionsIconColor = 'red';
		  } 
		  else if(conditions === 'Clear') {
			condtionsHebrew = 'בהיר';
			conditionsIcon = 'climacon sun';
			conditionsIconColor = 'yellow';
		  }   	
		  else if(conditions === 'Overcast') {
			condtionsHebrew = 'מעונן';
			conditionsIcon = 'climacon cloud';
			conditionsIconColor = 'dark-grey';
		  }  
		  else if(conditions === 'Chance of Rain') {
			condtionsHebrew = 'טיפטוף קל';
			conditionsIcon = 'climacon drizzle';
			conditionsIconColor = 'blue';
		  }
		  else if(conditions === 'Mostly Cloudy') {
			condtionsHebrew = 'בעיקר מעונן';
			conditionsIcon = 'climacon wind cloud sun';
			conditionsIconColor = 'grey';
		  }
		  else if(conditions === 'Thunderstorm') {
		    condtionsHebrew = 'סופת ברקים';
			conditionsIcon = 'climacon lightning';
			conditionsIconColor = 'dark-red';
		  }
		  else if(conditions === 'Rain') {
		    condtionsHebrew = 'גשם';
			conditionsIcon = 'climacon rain';
			conditionsIconColor = 'dark-blue';
		  }		  
		  else {
		    condtionsHebrew = conditions;
			conditionsIcon = 'climacon tornado';
		  }
		  
		  humidity = data['forecast']['simpleforecast']['forecastday'][i]['avehumidity'] + '%';
		  avgWind = data['forecast']['simpleforecast']['forecastday'][i]['avewind']['kph']; + ' קמ"ש';
		  rainChance = data['forecast']['simpleforecast']['forecastday'][i]['pop'] + '%';
		  dayInWeek = translateDay(data['forecast']['simpleforecast']['forecastday'][i]['date']['weekday_short']);
			
		  stringToHtml += '<li class="list-group-item list-group-item-forecast col-lg-3 col-md-4 col-sm-6" id="forecast"' + i + '>';
		  stringToHtml += '<span class="fs1 ' +  conditionsIcon + ' forecast-icon ' + conditionsIconColor + '"></span>';
		  stringToHtml += '<h3 class="list-group-item-heading">' + newDate + ' ' + '<span lang="he">' + dayInWeek + '</span></h3>';
		  stringToHtml += '<p class="list-group-item-text">';
		  stringToHtml += '<p>' + maxTemp + ' - ' + minTemp + ' ' + '<span lang="he">' + condtionsHebrew + '</span></p>';
		  stringToHtml += '<p>' + humidity + ' <span lang="he">לחות</span></p>';
		  stringToHtml += '<p>' + rainChance + ' <span lang="he">סיכוי לגשם</span></p>';	  
		  stringToHtml += '</p></li>'
		}
		$('#forecast').html(stringToHtml);
		
		$('#loader').hide();
		
		}, 1000);		
	  },
	  error: function() {
	  },
  })
});

function translateDay(day) {
  if(day === 'Sun') {
    return "א'";
  }
  if(day === 'Mon') {
	  return "ב'";
	}  
  if(day === 'Tue') {
	  return "ג'";
	}    
  if(day === 'Wed') {
	  return "ד'";
	}  
  if(day === 'Thu') {
	  return "ה'";
	}    
  if(day === 'Fri') {
	  return "ו'";
	}  
  if(day === 'Sat') {
	  return "ש'";
	}  
}

