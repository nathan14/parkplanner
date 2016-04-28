<?php
  header("Access-Control-Allow-Origin: *");
  header("Content-Type: application/json; charset=UTF-8");
  
  include 'dbconfig.php';
      
  $result = $conn->query("SELECT * FROM fbusers GROUP BY email DESC");
    
  $outp = "[";
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
	  if ($outp != "[") {$outp .= ",";}
	  $outp .= '{"fid":"'     	 . $rs["fid"]   . '",';
	  $outp .= '"fname":"'       . $rs["fname"]    . '",';
	  $outp .= '"lname":"'       . $rs["lname"]    . '",';
	  $outp .= '"email":"'     	 . $rs["email"]   . '"}';
  }
  $outp .="]";
  
  $conn->close();
  
  echo($outp);
?>