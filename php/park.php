<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
  
  $park_id = $_POST['park_id'];
    
  $result = $conn->query("SELECT park_id, address, modal_name, water_park,
  						park_extreme, park_name, ride_name, ride_extreme, ride_type, ride_video, priority, ride_height
						FROM parks JOIN rides USING (park_id)
						WHERE parks.park_id LIKE '$park_id'
						ORDER BY priority");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"park_name":"'         . $rs["park_name"]       . '",';
	  $outp .= '"park_extreme":"'   	. $rs["park_extreme"] 	. '",';
	  $outp .= '"park_id":"'            . $rs["park_id"]         . '",';
	  $outp .= '"modal_name":"'         . $rs["modal_name"] . '",';
	  $outp .= '"address":"'   	        . $rs["address"] 	. '",';
	  $outp .= '"ride_name":"'   	    . $rs["ride_name"] 	. '",';
	  $outp .= '"ride_extreme":"'   	. $rs["ride_extreme"] 	. '",';
	  $outp .= '"ride_type":"'   		. $rs["ride_type"] 	. '",';
	  $outp .= '"ride_height":"'   	    . $rs["ride_height"] 	. '",';
	  $outp .= '"ride_video":"'   	    . $rs["ride_video"] 	. '",';
	  $outp .= '"priority":"'   	    . $rs["priority"] 	. '",';
	  $outp .= '"water_park":"'         . $rs["water_park"] . '"}';
	  
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>