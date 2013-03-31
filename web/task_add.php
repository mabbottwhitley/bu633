<?php

	include 'tasks.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	if (isset($_POST['projectid'])){

		$name = $_POST["name"];
		$description = $_POST["description"];
		$projectID = $_POST["projectid"];
		$sequence = $_POST["sequence"];
		$creatorID = $_POST["creatorid"];
		$assigneeID = $_POST["assigneeid"];
		$start = $_POST["start"];
		$due = $_POST["due"];
		$complete = $_POST["complete"];		
		$note = $_POST["note"];
	
		$newTask = new Task($name, $description, $projectID, $sequence, $creatorID, $assigneeID, $start, $due, $complete, $note);
		
		$name = $newTask->getName();
		$description = $newTask->getDescription();
		$projectID = $newTask->getProjectID();
		$sequence = $newTask->getSequence();
		$creatorID = $newTask->getCreatorID();
		$assigneeID = $newTask->getAssigneeID();
		$start = $newTask->getStart();
		$due = $newTask->getDue();
		$complete = $newTask->getComplete();
		$note = $newTask->getNote();

		
		$query = "INSERT INTO task (task_id, task_name, task_description, task_sequence, project_id, creator_id, assignee_id, start_date, due_date, completion, notes) VALUES (NULL, '$name', '$description', '$sequence', '$projectID', '$creatorID', '$assigneeID', '$start', '$due', '$complete', '$note')";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
			
		if($r){
		
			echo "Task Added Successfuly";
			
		}else {
			echo "Task not added";
		}
		
	}


?>