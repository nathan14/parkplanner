<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT * FROM `sent_items`");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"id":"'     	           . $rs["id"]               . '",';
	  $outp .= '"email":"'      	       . $rs["email"]            . '",';
	  $outp .= '"type":"'                . $rs["type"]             . '",';
	  $outp .= '"is_registered":"'       . $rs["is_registered"]    . '",';
	  $outp .= '"date":"'                . $rs["date"]             . '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>