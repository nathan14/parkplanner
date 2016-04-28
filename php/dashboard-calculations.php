<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT MONTH(date) as month, COUNT(*) as count
						FROM history 
						GROUP BY MONTH(date);");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"month":"'      . $rs["month"]   . '",';
	  $outp .= '"count":"'       . $rs["count"]   . '"}';
	  
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>