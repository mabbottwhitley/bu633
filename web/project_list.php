<?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	$query = "SELECT * FROM project";
		
	$r = mysqli_query ($dbc, $query); 
		
	//check to ensure the query executed correctly 
		
	if($r){
	
		echo "<form action=\"project_view_edit.php\" method=\"post\">";
		echo "<select name=\"projectid\">";
		
	}
		
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			echo "<option value=" . $row['project_id'] . ">" . $row['project_name'] . "</option>";
						
		} 
		
	if($r){
	
		echo "</select>";
		echo "<input name=\"button[]\" type=\"submit\" value=\"Edit\">";
		echo "<input name=\"button[]\" type=\"submit\" value=\"View\">";
		echo "</form>";
		
	}


?>