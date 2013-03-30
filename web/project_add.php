<?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

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
	
	$query = "INSERT INTO project (project_id, project_name, owner_id, start_date, due_date, progress, notes) VALUES (NULL, '$name', '$owner', '$start', '$due', '$progress', '$note')";
		
	$r = mysqli_query ($dbc, $query); 
		
	//check to ensure the query executed correctly 
		
	if($r){
	
		echo "Project Added Successfuly";
		
	}else {
		echo "Project not added";
	}


?>