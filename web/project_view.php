<?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	include 'header.html';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST['projectid'])){
	
		$project_id = $_POST['projectid'];
	
		//$project_id = $_POST['project_id'][0];
		
		//echo $project_id;
		
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
		
		echo "<form id=\"project\" action=\"project_edit_add.php\" method=\"post\">";
		echo "Project ID: <input type=\"text\" name=\"projectid\" value=\"$project_id\" readonly=\"true\"><br>";
		echo "Project Name: <input type=\"text\" name=\"name\" value=\"$name\" readonly=\"true\"><br>";
		echo "Project Owner: <input type=\"text\" name=\"owner\" value=\"$owner\" readonly=\"true\"><br>";
		echo "Start Date: <input type=\"text\" name=\"start\" value=\"$start\" readonly=\"true\"><br>";
		echo" Due Date: <input type=\"text\" name=\"due\" value=\"$due\" readonly=\"true\"><br>";
		echo "Progress: <input type=\"text\" name=\"progress\" value=\"$progress\" readonly=\"true\"><br>";
		echo "Notes: <input type=\"text\" name=\"note\" value=\"$note\" readonly=\"true\"><br>";
		echo "<input name=\"button[]\" type=\"submit\" value=\"Edit\">";
		echo "<input name=\"button[]\" type=\"submit\" value=\"Add Task\">";
		echo "</form>";
		
		echo "<br>";
		
		//get tasks
		
		$query = "SELECT * FROM task WHERE project_id = $project_id";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
		
		if($r){
		
			echo "<div id=taskbracket>";
		
		}
		
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
		
			echo "<form id=\"task\" action=\"task_edit.php\" method=\"post\">";
			echo "Task ID: <input type=\"text\" name=\"task_id\" value=\"$taskID\" readonly=\"true\"><br>";
			echo "Name: <input type=\"text\" name=\"name\" value=\"$taskName\" readonly=\"true\"><br>";
			echo "Description: <input type=\"text\" name=\"owner\" value=\"$taskDescription\" readonly=\"true\"><br>";
			echo "Sequence: <input type=\"text\" name=\"start\" value=\"$taskSequence\" readonly=\"true\"><br>";
			echo" Project ID: <input type=\"text\" name=\"due\" value=\"$taskProjectID\" readonly=\"true\"><br>";
			echo "Creator ID: <input type=\"text\" name=\"progress\" value=\"$taskCreatorID\" readonly=\"true\"><br>";
						
			$queryUser = "SELECT * FROM user WHERE user_id='$taskAssigneeID'";
		
			$userOutput = mysqli_query ($dbc, $queryUser); 
			
			while ($record = mysqli_fetch_array($userOutput, MYSQLI_ASSOC)){
		
				echo "Assigned To: <input type=\"text\" name=\"assignee_id\" value=\"" . $record['first_name'] . " " . $record['last_name'] . "\"readonly=\"true\"><br>";
						
			} 
			
			echo "Start: <input type=\"text\" name=\"note\" value=\"$taskStart\" readonly=\"true\"><br>";
			echo "Due: <input type=\"text\" name=\"note\" value=\"$taskDue\" readonly=\"true\"><br>";
			echo "Complete: <input type=\"text\" name=\"note\" value=\"$taskComplete\" readonly=\"true\"><br>";
			echo "Note: <input type=\"text\" name=\"note\" value=\"$taskNote\" readonly=\"true\"><br>";
	
			echo "<input type=\"submit\" value=\"Edit\">";
			echo "</form>";
			
			echo "<br>";
		
			}
			
		if($r){
		
			echo "</div>";
		
		}

	}else {
		
		echo "Sorry, you must have reached this page in error";
	}

	include 'footer.html';

?>