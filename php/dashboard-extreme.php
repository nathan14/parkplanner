<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT COUNT(extreme_level) as count, extreme_level FROM history GROUP BY extreme_level");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"extreme_level":"'      . $rs["extreme_level"]   . '",';
	  $outp .= '"count":"'       . $rs["count"]   . '"}';
	  
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>