<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
      
  $result = $conn->query("SELECT AVG(park_load) as avarage FROM orlando_load WHERE day >= '$start_date' AND day <= '$end_date'");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"avarage":"'        . $rs["avarage"]       . '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>