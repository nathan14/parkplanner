<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $age_18 		= $_POST['age_18'];
  $age_18_ing	= $_POST['age_18_ignore'];
  $age_13_17 	= $_POST['age_13_17'];
  $age_8_12 	= $_POST['age_8_12'];
  $age_3_7 		= $_POST['age_3_7'];  
  $days 		= $_POST['days'];
  $water 		= $_POST['water'];
  $date 		= $_POST['date'];
  $extreme 		= $_POST['ext'];
  $modified_date = date("Y-m-d", strtotime($date));
  $today = date("Y-m-d");    
    
  $result = $conn->query("SELECT park_id, address, modal_name, water_park, park_extreme, park_name,
  						('$age_18'*18_rating + '$age_13_17'*13_17_rating + '$age_8_12'*8_12_rating + '$age_3_7'*3_7_rating + '$extreme' * exterme_adjust)
						as total
						FROM parks
						WHERE (water_park LIKE '$water' OR water_park LIKE 0)
						ORDER BY total DESC LIMIT $days");
  if($age_18 == '0') {
    $age_18 = $age_18_ing;
  }
						
  $conn->query("INSERT INTO history (date ,today, arrival_date, num_of_days, num_of_adults, age_13_17, age_8_12, age_3_7, extreme_level)
				VALUES ('$modified_date', '$today' ,'$date', '$days', $age_18, $age_13_17, $age_8_12, $age_3_7, '$extreme')");						
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"park_name":"'        . $rs["park_name"]       . '",';
	  $outp .= '"park_extreme":"'   	. $rs["park_extreme"] 	. '",';
	  $outp .= '"park_id":"'           . $rs["park_id"]         . '",';
	  $outp .= '"modal_name":"'   . $rs["modal_name"] . '",';
	  $outp .= '"address":"'   	. $rs["address"] 	. '",';
	  $outp .= '"total":"'           . $rs["total"]         . '",';
	  $outp .= '"water_park":"'   . $rs["water_park"] . '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>