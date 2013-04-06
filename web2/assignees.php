<?php
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	$query = "SELECT * FROM user";
		
	$r = mysqli_query ($dbc, $query); 
		
	//check to ensure the query executed correctly 
		
	if($r){
	
		echo "Assigned To: <select name=\"assigneeid\">";
				
	}
		
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			
		if ($row['user_id']==$taskAssigneeID){
		
			echo "<option selected=\"selected\" value=" . $row['user_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";
		
		}else{
			
			echo "<option value=" . $row['user_id'] . ">" . $row['first_name'] . " " . $row['last_name'] . "</option>";
			
		}						
						
		} 
		
	if($r){
	
		echo "</select><br>";
		
	}
	
?>