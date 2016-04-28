<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $date = $_POST['date'];
  $timestamp = strtotime($date);
  $php_date = getdate($timestamp);
  $month = date("m", $timestamp);
      
  $result = $conn->query("SELECT max, min FROM weather WHERE month LIKE '$month'");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"max":"'        . $rs["max"]       . '",';
	  $outp .= '"min":"'   		 . $rs["min"] 		. '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>