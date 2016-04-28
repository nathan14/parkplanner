<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $email 	= strtolower($_POST['email']);
  $email = preg_replace('/\s+/', '', $email); // remove spaces
  $password = md5($_POST['password']);
    
  $result = $conn->query("SELECT *
						FROM users
						WHERE '$email' LIKE email
						AND '$password' LIKE password");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"id":"'        . $rs["id"]		. '",';
	  $outp .= '"fname":"'   	. $rs["fname"] 	. '",';
	  $outp .= '"lname":"'      . $rs["lname"]  . '",';
	  $outp .= '"role":"'       . $rs["role"]   . '",';
	  $outp .= '"updates":"'    . $rs["updates"]. '",';
	  $outp .= '"email":"'      . $rs["email"]  . '"}';
	  
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>