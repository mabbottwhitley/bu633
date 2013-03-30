<?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST["project_id"])){

		$project_id = $_POST["project_id"];
		$name = $_POST["name"];
		$owner = $_POST["owner"];
		$start = $_POST["start"];
		$due = $_POST["due"];
		$progress = $_POST["progress"];
		$note = $_POST["note"];
	
		$newProject = new Project($name, $owner, $start, $due, $progress, $note);
		
		$name = $newProject->getName();
		$owner = $newProject->getOwner();
		$start = $newProject->getStart();
		$due = $newProject->getDue();
		$progress = $newProject->getProgress();
		$note = $newProject->getNote();
		
		$query = "UPDATE project SET project_name='$name', owner_id='$owner', start_date='$start', due_date='$due', progress='$progress', notes='$note' WHERE project_id='$project_id'";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
			
		if($r){
		
			echo "Project Updated Successfully";
			
		}else {
			echo "Project not updated";
		}
	}else{
		
		echo "Sorry, you must have reached this page in error.";
		
	}


?>