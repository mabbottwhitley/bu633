<?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST['projectid'])){
	
		$project_id = $_POST['projectid'];
		
		$query = "SELECT * FROM project WHERE project_id = $project_id";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			$name = $row['project_name'];
			$owner = $row['owner_id'];
			$start = $row['start_date'];
			$due = $row['due_date'];
			$progress = $row['progress'];
			$note = $row['notes'];
			
		}
		
		echo "<form action=\"project_update.php\" method=\"post\">";
		echo "Project ID: <input type=\"text\" name=\"project_id\" value=\"$project_id\" readonly=\"true\"><br>";
		echo "Project Name: <input type=\"text\" name=\"name\" value=\"$name\"><br>";
		echo "Project Owner: <input type=\"text\" name=\"owner\" value=\"$owner\"><br>";
		echo "Start Date: <input type=\"text\" name=\"start\" value=\"$start\"><br>";
		echo" Due Date: <input type=\"text\" name=\"due\" value=\"$due\"><br>";
		echo "Progress: <input type=\"text\" name=\"progress\" value=\"$progress\"><br>";
		echo "Notes: <input type=\"text\" name=\"note\" value=\"$note\"><br>";
		echo "<input type=\"submit\" value=\"Submit\">";
		echo "</form>";

	}else {
		
		echo "Sorry, you must have reached this page in error";
	}


?>