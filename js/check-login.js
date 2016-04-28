(function login() { 
  var uname = get_cookie('uname');
  var password = get_cookie('password');
  
  $.ajax({
	  url: "php/check-login.php",
	  type: "POST",
	  data: {
		  uname: uname,
		  password: password
	  },
	  cache: false,
	  success: function(data) {
		if(data[0] !== undefined) {
		  doWhenLoggedIn(uname);
		  checkIfAdmin(data[0].role);
		}
	  },
	  error: function() {
		
	  }
  });
})();

