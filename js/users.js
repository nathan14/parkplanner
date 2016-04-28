window.onload = function() {
  $('#loader').hide();
}

$(document).ready(function() { 
  $('#page-title-mobile').html('משתמשים');
  if(get_cookie('email') === "") {
    window.location.href = "/";
  }
  else if(get_cookie('role') !== '1') {
    window.location.href = "/";
  }
  else {
	setRegisteredUsers('all-records');
	setFacebookUsers('all-records');
  } 
});

$('#btn-export-csv').click(function() {
  window.location.href = "php/dashboard-users-csv.php";
})

$('#num-of-users').change(function() {
  var numOfUsers = $('#num-of-users').val();
  $('#loader').show();
  setRegisteredUsers(numOfUsers);
  setFacebookUsers(numOfUsers);
})

function setRegisteredUsers(numOfUsers) {
  var stringToHtml = '';
  
  $.ajax({
	  url: "php/dashboard-manage-users.php",
	  type: "POST",
	  data: {
	  },
	  cache: false,
	  success: function(data) {

	  	if(numOfUsers === 'all-records') {
	  	  numOfUsers = data.length;
	  	}

	  	$('#total-items-users').html(data.length);
	  
		for(i = 0; i < numOfUsers; i++) {
		  stringToHtml += '<li class="list-group-item col-xs-12">';
		  stringToHtml += '<h3 class="list-group-item-heading">' + data[i].email + '</h3>';
		  stringToHtml += '<p class="list-group-item-text">';
		  stringToHtml += '<p><span lang="he">שם:</span> ' + data[i].fname + ' ' + data[i].lname + '</p>';
		  //stringToHtml += '<p>הרשאה: ' +  parseRole(data[i].role);
		  //stringToHtml += '<p>עדכונים: ' + parseUpdates(data[i].updates) + '</p>';
		  stringToHtml += '</p></li>';			  
		}
		
		$('#users-list').html(stringToHtml);

	  },
	  error: function() {	
	  },
  });	
}

function setFacebookUsers(numOfUsers) {
  var stringToHtmlFb = '';
  
  $.ajax({
	  url: "php/dashboard-view-fbusers.php",
	  type: "POST",
	  data: {
	  },
	  cache: false,
	  success: function(dataFB) {

	  	if(numOfUsers === 'all-records') {
	  	  numOfUsers = dataFB.length;
	  	}

	  	$('#total-items-fbusers').html(dataFB.length);
	  
		for(i = 0; i < numOfUsers; i++) {
		  stringToHtmlFb += '<li class="list-group-item col-xs-12 list-group-item-fb">';
		  stringToHtmlFb += '<h3 class="list-group-item-heading">' + dataFB[i].email + '</h3>';
		  stringToHtmlFb += '<p class="list-group-item-text">';
		  stringToHtmlFb += '<p><span lang="he">שם:</span> ' + dataFB[i].fname + ' ' + dataFB[i].lname;
		  stringToHtmlFb += '</p></li>';			  
		}
		
		$('#fbusers-list').html(stringToHtmlFb);

		$('#loader').hide();
		
	  },
	  error: function() {	
	  },
  });
}

function parseRole(role) {
  if(role === '1') {
    return 'מנהל מערכת';
  }
  else return 'משתמש רגיל';
}

function parseUpdates(updates) {
  if(updates === '1') {
    return 'כן';
  }
  else return 'לא';
}
