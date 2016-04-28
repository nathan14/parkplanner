function set_cookie(cname, cvalue, exdays) {
  var d = new Date();
  var expires;
  if(exdays === undefined)
  {
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000)); // set cookie and set expiration
    expires = "expires=" + d.toUTCString();
  }
  else
  {
    expires = exdays;
  }
  document.cookie = cname + "=" + cvalue + ";" + expires;
}

function delete_cookie(cname) {
  document.cookie = cname + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function get_cookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for(var i=0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0)=== " ") c = c.substring(1);
    if(c.indexOf(name) !== -1) return c.substring(name.length,c.length);
    }
  return "";
}