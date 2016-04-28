<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT AVG(num_of_adults) as adults, AVG(age_13_17 + age_8_12 + age_3_7) as children
						  FROM history");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"adults":"'      . $rs["adults"]   . '",';
	  $outp .= '"children":"'       . $rs["children"]   . '"}';
	  
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>