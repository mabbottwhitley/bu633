<?php

	include 'tasks.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	if (isset($_POST['task_id'])){

		$task_id = $_POST["task_id"];
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

		
		$query = "UPDATE task SET task_name='$name', task_description='$description', task_sequence='$sequence', assignee_id='$assigneeID', start_date='$start', due_date='$due', completion='$complete', notes='$note' WHERE task_id='$task_id'";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
			
		if($r){
		
			echo "Task Added Successfuly";
			
		}else {
			echo "Task not added";
		}
		
	}


?>