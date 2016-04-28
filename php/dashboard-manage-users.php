<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT * FROM users GROUP BY id DESC");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"id":"'     	 . $rs["id"]   . '",';
	  $outp .= '"fid":"'      	 . $rs["fid"]    . '",';
	  $outp .= '"fname":"'       . $rs["fname"]    . '",';
	  $outp .= '"lname":"'       . $rs["lname"]    . '",';
	  $outp .= '"email":"'		 . $rs["email"]    . '",';
	  $outp .= '"role":"'        . $rs["role"]    . '",';
	  $outp .= '"updates":"'     . $rs["updates"]   . '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>