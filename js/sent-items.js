window.onload = function() {
  $('#loader').hide();
}	

$(document).ready(function() { 
  $('#page-title-mobile').html('דואר יוצא');
  if(get_cookie('email') === "") {
    window.location.href = "/";
  }
  else if(get_cookie('role') !== '1') {
    window.location.href = "/";
  }
  else {
	setSentItems('all-records');
  } 
});

$('#btn-export-csv').click(function() {
  window.location.href = "php/dashboard-sent-items-csv.php";
})

$('#num-of-items').change(function() {
  var numOfItems = $('#num-of-items').val();
  $('#loader').show();
  setSentItems(numOfItems);
})

function setSentItems(numOfItems) {
  var stringToHtml = '';
  
  $.ajax({
	  url: "php/dashboard-sent-items.php",
	  type: "POST",
	  data: {
	  },
	  cache: false,
	  success: function(data) {

	  	if(numOfItems === 'all-records') {
	  	  numOfItems = data.length;
	  	}

	  	$('#total-items').html(data.length);
	  
		for(i = 0; i < numOfItems; i++) {
		  stringToHtml += '<li class="list-group-item col-xs-12">';
		  stringToHtml += '<h3 class="list-group-item-heading">' + data[i].email + '</h3>';
		  stringToHtml += '<p class="list-group-item-text">';
		  stringToHtml += '<p><span lang="he">תאריך:</span> ' + parseDate(data[i].date) + ' ';
		  stringToHtml += '<span lang="he">סוג:</span> <span lang="he">' +  parseType(data[i].type) + '</span';
		  stringToHtml += '</p></li>';			  
		}
		
		$('#items-list').html(stringToHtml);

		$('#loader').hide();

	  },
	  error: function() {	
	  },
  });	
}

function parseType(role) {
  if(role === 'route') {
    return 'מסלול פארק';
  }
  else return 'לוח זמנים';
}

function parseDate(date) {
  var strDate = Date.parse(date).toString('dd/MM/yyyy')
  return strDate;
}