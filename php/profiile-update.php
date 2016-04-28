<?php
  header("Access-Control-Allow-Origin: *");
  
  include 'dbconfig.php';
  
  $fname 	= $_POST['fname'];
  $lname 	= $_POST['lname'];
  $email 	= strtolower($_POST['email']);
  $email = preg_replace('/\s+/', '', $email); // remove spaces
  $updates 	= $_POST['updates'];
  $password = md5($_POST['password']);
  $id 		= $_POST['id'];
  
  $exists = $conn->query("SELECT * FROM users WHERE email = '$email' AND id != '$id'");
  
  if($row = mysqli_fetch_assoc($exists) === NULL) {
	header("Content-Type: application/json; charset=UTF-8");
	$conn->query("UPDATE users
				  SET fname = '$fname', lname = '$lname', email = '$email', password = '$password', updates = '$updates'
				  WHERE id LIKE '$id'");
							
	$conn->close();
	
  echo(true);
  
  }
  else {
    echo 'Email Exists';
  }  

?>