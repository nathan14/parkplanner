<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $fid = $_POST['fid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email 	= strtolower($_POST['email']);
  $email = preg_replace('/\s+/', '', $email); // remove spaces
  $today = date("Y-m-d");

  $conn->query("INSERT INTO fbusers (fid, fname, lname, email, date)
  						  VALUES ('$fid', '$fname', '$lname', '$email', '$today')");  
 						  
  $result = $conn->query("SELECT *
						  FROM fbusers
						  WHERE '$fid' LIKE fid");  
						  
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"fid":"'        . $rs["fid"]		. '"}';
  }
  $outp .="]";
  						  
  $conn->close();
  
  echo($outp);
?>