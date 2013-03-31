<?php

	include 'task.php';
	include '../sql_connect/mysqli_connect.php';
	include 'header.html';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST['task_id'])){
	
		$task_id = $_POST['task_id'];
		
		$query = "SELECT * FROM task WHERE task_id = $task_id";
			
		$r = mysqli_query ($dbc, $query); 
			
			
		//check to ensure the query executed correctly 
		
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			$taskID = $row['task_id'];
			$taskName = $row['task_name'];
			$taskDescription = $row['task_description'];
			$taskSequence = $row['task_sequence'];
			$taskProjectID = $row['project_id'];
			$taskCreatorID = $row['creator_id'];
			$taskAssigneeID = $row['assignee_id'];
			$taskStart = $row['start_date'];
			$taskDue = $row['due_date'];
			$taskComplete = $row['completion'];
			$taskNote = $row['notes'];
			
			//output tasks to screen
		
			echo "<form id=\"task\" action=\"task_update.php\" method=\"post\">";
			echo "Task ID: <input type=\"text\" name=\"task_id\" value=\"$taskID\" readonly=\"true\"><br>";
			echo "Name: <input type=\"text\" name=\"name\" value=\"$taskName\"><br>";
			echo "Description: <input type=\"text\" name=\"description\" value=\"$taskDescription\"><br>";
			echo "Sequence: <input type=\"text\" name=\"sequence\" value=\"$taskSequence\"><br>";
			echo" Project ID: <input type=\"text\" name=\"projectid\" value=\"$taskProjectID\" readonly=\"true\"><br>";
			echo "Creator ID: <input type=\"text\" name=\"creatorid\" value=\"$taskCreatorID\" readonly=\"true\"><br>";
			echo "Assignee ID: <input type=\"text\" name=\"assigneeid\" value=\"$taskAssigneeID\"><br>";
			echo "Start: <input type=\"text\" name=\"start\" value=\"$taskStart\"><br>";
			echo "Due: <input type=\"text\" name=\"due\" value=\"$taskDue\"><br>";
			echo "Complete: <input type=\"text\" name=\"complete\" value=\"$taskComplete\"><br>";
			echo "Note: <input type=\"text\" name=\"note\" value=\"$taskNote\"><br>";
	
			echo "<input type=\"submit\" value=\"Submit\">";
			echo "</form>";
		
			}
			

	}else {
		
		echo "Sorry, you must have reached this page in error";
	}

	include 'footer.html';

?>