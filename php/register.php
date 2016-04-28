<?php
  header("Access-Control-Allow-Origin: *");
  
  
  include 'dbconfig.php';
  
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email 	= strtolower($_POST['email']);
  $email = preg_replace('/\s+/', '', $email); // remove spaces
  $updates = $_POST['updates'];
  $password = md5($_POST['password']);
  $today = date("Y-m-d"); 
  
  $exists = $conn->query("SELECT * FROM users WHERE email = '$email'");
  
  if($row = mysqli_fetch_assoc($exists) === NULL) {
	header("Content-Type: application/json; charset=UTF-8");
	$conn->query("INSERT INTO users (fname, lname, email, password, updates, date)
							VALUES ('$fname', '$lname', '$email', '$password', '$updates', '$today')");  
							
	$result = $conn->query("SELECT *
							FROM users
							WHERE '$email' LIKE email
							AND '$password' LIKE password");  
							
	$outp = "[";
	while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
		if ($outp != "[") {$outp .= ",";}
		$outp .= '{"id":"'        . $rs["id"]		. '"}';
	}
	$outp .="]";
							
	$conn->close();
	
	echo($outp);

  }
  else {
    echo 'Email Exists';
  }
?>