window.onload = function() {
  $('#loader').hide();
}

// set page title in mobile view
$(document).ready(function() { 
  $('#page-title-mobile').html('מפה');
});

function initialize() {
  var mapOptions = {
	center: { lat: 28.427441, lng: -81.504965},
	zoom: 11,
	disableDefaultUI: true,
	zoomControl: true,
	zoomControlOptions: {
	  style: google.maps.ZoomControlStyle.LARGE,
	  position: google.maps.ControlPosition.LEFT_TOP
	}
  };
  
  var map = new google.maps.Map(document.getElementById('map-container'),
	  mapOptions);
	  
  var iconBase = 'images/marker/';
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.418687, -81.581212),
	  map: map,
	  icon: iconBase + 'results_magic_kingdom.png',
	  title: 'Magic Kigdnom'
  });
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.374425, -81.549425),
	  map: map,
	  icon: iconBase + 'results_epcot.png',
	  title: 'Epcot'
  });
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.359409, -81.591156),
	  map: map,
	  icon: iconBase + 'results_animal_kingdom.png',
	  title: 'Animal Kingdom'
  });
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.357496, -81.558464),
	  map: map,
	  icon: iconBase + 'results_holywood_studios.png',
	  title: 'Holywood Studios'
  });  
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.474307, -81.468023),
	  map: map,
	  icon: iconBase + 'results_universal_studios.png',
	  title: 'Universal Studios'
  }); 
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.470947, -81.471533),
	  map: map,
	  icon: iconBase + 'results_island_of_advantures.png',
	  title: 'Island of Advantures'
  });
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.411338, -81.461866),
	  map: map,
	  icon: iconBase + 'results_sea_world.png',
	  title: 'Sea World'
  });
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.572867, -80.648981),
	  map: map,
	  icon: iconBase + 'results_kennedy_space_center.png',
	  title: 'Kennedy Space Center'
  });  
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(28.036347, -82.422446),
	  map: map,
	  icon: iconBase + 'results_busch_gardens.png',
	  title: 'Busch Gardens'
  });    
  
  var marker = new google.maps.Marker({
	  position: new google.maps.LatLng(27.989400, -81.691299),
	  map: map,
	  icon: iconBase + 'results_legoland.png',
	  title: 'Legoland'
  });   
}
google.maps.event.addDomListener(window, 'load', initialize);