window.onload = function() {
  $('#loader').hide();
}

var openPhotoSwipe = function() {
	var pswpElement = document.querySelectorAll('.pswp')[0];
	var name = $('.park_name').html();

	var items = [
		{src: 'images/gallery/' + name + ' 01.jpg',w: 700,h: 500},
		{src: 'images/gallery/' + name + ' 02.jpg',w: 700,h: 500},
		{src: 'images/gallery/' + name + ' 03.jpg',w: 700,h: 500},
		{src: 'images/gallery/' + name + ' 04.jpg',w: 700,h: 500},
		{src: 'images/gallery/' + name + ' 05.jpg',w: 700,h: 500}		  
	];
			
	var options = {
		history: false,
		closeEl:true,
		pinchToClose: true,
		tapToClose: true,
		mouseUsed: true,
		fullscreenEl: false,
		shareEl: false,
		arrowEl: true,
		bgOpacity: 0.8,
		showAnimationDuration: 333,
		hideAnimationDuration: 333,
		showHideOpacity: true
	};
	
	var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
	gallery.init();
};
	
document.getElementById('btn-gallery').onclick = openPhotoSwipe;

function setMapBtn(name) {
  $('#btn-map').click(function() {
	window.open('../images/maps/' + name + ' Map.pdf');
  });
}


function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
	vars[key] = value;
  });
  return vars;
}

// init tabs
$(function () {
  $('#myTab a:first').tab('show');
  $('#myTabMobile a:first').tab('show');
  
  $('#myTabMobile a[href="#general"]').on('click', function() {
     $(this).addClass('activelink');
	 $('#myTabMobile a[href="#route"]').removeClass('activelink');
	 $('#btn-send-main').hide();
	 $('#btn-gallery').show();
	 $('#btn-map').show();
  });
  
  $('#myTabMobile a[href="#route"]').on('click', function() {
	 $(this).addClass('activelink');
	 $('#myTabMobile a[href="#general"]').removeClass('activelink');
	 $('#btn-send-main').show();
	 $('#btn-gallery').hide();
	 $('#btn-map').hide();
  }); 
})

$('#btn-send-main').hide();

$('#tab_general').click(function() {
  $('#btn-send-main').hide();
  $('#btn-gallery').show();
  $('#btn-map').show();
});

$('#tab_route').click(function() {
  $('#btn-send-main').show();
  $('#btn-gallery').hide();
  $('#btn-map').hide();
});

// load park data
$(document).ready(function() {
  var park_id 	= getUrlVars()["id"];
  $('#email-sendto').val(get_cookie('email'));
  
  $.ajax({				
	  url: "php/park.php",
	  type: "POST",
	  data: {
		  park_id: park_id
	  },
	  cache: false,
	  success: function(data) {
		  
		  setRides(data);
		  
		  var stringHtml = "";
		  
		  document.title = data[0].park_name + ' - מתכנן הפארקים באורלנדו';
		  var stringDescription = 'מידע כללי ופרטים על פארק ' + data[0].park_name + ' באורלנדו. כולל מסלול מומלץ למתקנים עם סרטונים וגובה מינימלי';
		  $('meta[name=description]').attr('content', stringDescription);
		  setMapBtn(data[0].park_name);
		 
		  $('#page-title-mobile').html(data[0].park_name);
		  $('.park_name').html(data[0].park_name);
		  
		  $('#loader').hide();
		  
		  $('.park-img').attr('src', 'images/parks/' + data[0].modal_name +'.jpg');
		  
		  stringHtml += '<p> <strong lang="he"> רמת אקסטרים: </strong>';
		  stringHtml += data[0].park_extreme + ' <span lang="he">מתוך</span> 10</p>';
		  stringHtml += '<p> <strong lang="he"> כתובת: </strong>';
		  stringHtml += data[0].address + '</p>';		  
		  stringHtml += '<p id="description">';
		  stringHtml += '</p>';
		  
		  $('#general-content').html(stringHtml);
		  
		  loadDesc(data[0].modal_name);
		  
		  $('#lang-english').click(function() {
		    loadDesc(data[0].modal_name);
		  });
		  $('#lang-hebrew').click(function() {
		    loadDesc(data[0].modal_name);
		  });
		  		  
		  stringHtml = ""; // empty this string before using it for route information
		  
		  for(i = 0; i  < data.length; i++) {
			  
			// set title and video icon if needed
		    if(data[i].ride_video !== '') {
              stringHtml += '<li> <a class="route-heading popup-youtube" href="' + data[i].ride_video + '">'
			  stringHtml += data[i].ride_name + '</a> <i class="fa fa-youtube"></i> <br>';
			}
			else {
			  stringHtml += '<li> <span class="route-heading">' + data[i].ride_name + '</span> <br>';
			}
			
			// set ride type
			if(data[i].ride_type !== '') {
			  stringHtml += '<strong lang="he"> <i class="fa fa-asterisk"></i> סוג: </strong> <span lang="he">';
			  if(data[i].ride_type === '3d') {
				stringHtml += 'תלת מימד';
			  }
			  else if(data[i].ride_type === 'coaster') {
				stringHtml += 'רכבת הרים';
			  }
			  else if(data[i].ride_type === 'wet') {
				stringHtml += 'סיכוי להירטב';
			  }
			  else if(data[i].ride_type === 'show') {
				stringHtml += 'הופעה';
			  }
			stringHtml +='</span><br>';
			}
			 
			// set extreme level
			stringHtml += '<strong lang="he"> <span class="glyphicon glyphicon-flash"></span> רמת אקסטרים: </strong>'
			stringHtml += data[i].ride_extreme += ' <span lang="he">מתוך</span> 10 <br>';
			
			// set min height
			stringHtml += '<strong lang="he"> <span class="glyphicon glyphicon-resize-vertical"></span> גובה מינימלי: </strong>'
			if(data[i].ride_height == 0) {
			  stringHtml += '<span lang="he"> אין </span></li>';
			}
			else {
			  stringHtml += data[i].ride_height += "<span lang='he'> סמ' </span></li>";
			}			
		  }
		  $('#route').html(stringHtml);
		  initYoutubePopUps();
		  $('#buttons').show(); // show buttons only after rest of page is loaded
	  },
	  error: function() {
	  },
  })  
});

function loadDesc(modal_name) {
  var lang = get_cookie('lang');
  if(lang === 'en') {
	var description_to_load = 'descriptions/en/' + modal_name + '.html';
  }
  else {
	var description_to_load = 'descriptions/he/' + modal_name + '.html';
  }
  
  $('#description').load(description_to_load);
}

var rides = [];
var stringHtmlSendto = '';
var stringHtmlSendtoEn = '';
var stringHtmlSendtoTemp = '';
var parkName = '';
var modalName;

function setRides(data) {
  stringHtmlSendtoEn += 'Hi! Thanks for planning your trip with Orlando Park Planner.<br>';
  stringHtmlSendtoEn += 'Here is your recommended route for ' + data[0].park_name +'.<br>';
  stringHtmlSendtoEn += 'We also attached the park map. <br>';	
	
  stringHtmlSendto += 'היי! תודה שבחרת לתכנן את הנסיעה שלך עם מתכנן הפארקים. <br>';
  stringHtmlSendto += 'להלן המסלול המומלץ עבור פארק ' + data[0].park_name + '.<br>';
  stringHtmlSendto += 'בנוסף, צרפנו את מפת הפארק. <br>';	
  
  for(i = 0; i < data.length; i++) {
    rides[i] = data[i];
	
	stringHtmlSendtoEn += '<p><strong> ' + rides[i].ride_name + '</strong> <br>';
	stringHtmlSendtoEn += 'Extreme Level: ' + rides[i].ride_extreme + ' / 10<br>';
	
	stringHtmlSendto += '<p><strong> ' + rides[i].ride_name + '</strong> <br>';
	stringHtmlSendto += 'רמת אקסטרים: ' + rides[i].ride_extreme + ' מתוך 10<br>';
	
	if(rides[i].ride_height !== '0') {
	  stringHtmlSendtoEn += 'Min Height: ' + rides[i].ride_height + ' cm <br>';
	  stringHtmlSendto += 'גובה מינימלי: ' + rides[i].ride_height + ' ס"מ <br>';
	}
	
	stringHtmlSendtoEn += '</p>';
	stringHtmlSendto += '</p>';
  }
  
  stringHtmlSendtoEn += 'Continue planning your trip - <a href="http://parkplanner.co.il">parkplanner.co.il</a>';
  stringHtmlSendto += 'להמשך תכנון הנסיעה שלך לאורלנדו - <a href="http://parkplanner.co.il">parkplanner.co.il</a>';
  
  stringHtmlSendtoTemp = stringHtmlSendto;
  
  parkName = rides[0].park_name;
  modalName = data[0].modal_name;
}

function initYoutubePopUps() {
  $('.popup-youtube').magnificPopup({type:'iframe'});
}

$('#sendto').submit(function(e) {
  e.preventDefault();
  var email = $('#email-sendto').val();
  partialResetSendto();
  
  var isValidEmail = validateEmailInput('#email-sendto', '#sendto-form-status');
  if(!isValidEmail) {
    return false;
  }
  else {
	$('#sendto-form-status').html("<span lang='he'>שולח...</span>");
	$('#sendto-form-status').show('slow');
		
	var lang = get_cookie('lang');
	if(lang === ('en')) {
	  stringHtmlSendto = stringHtmlSendtoEn;
	}
	else {
	  stringHtmlSendto = stringHtmlSendtoTemp;
	}
		
	$.ajax({
		url: "php/mail-route.php",
		type: "POST",
		data: {
			parkName: parkName,
			stringHtmlSendto: stringHtmlSendto,
			lang: lang,
			email: email,
			modalName: modalName
		},
		cache: false,
		success: function() {
		  $('#sendto-form-status').html("<span lang='he'>נשלח בהצלחה</span>");
		  $('#sendto-form-status').css('color', '#090');
		  $('#sendto-form-status').show('slow');
		  $('#email-sendto').val("");
		  hideStatus();
		  // hideModal();
		},
		error: function() {
		  $('#sendto-modal').html('<b>התרחשה שגיאה <span class="glyphicon glyphicon-remove"><span></b>');
		  $('#sendto-modal').css('color', '#900');
		},
	})
  }
});