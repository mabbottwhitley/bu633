<?php

	include 'projects.php';
	include 'mysqli_connect.php';
	include 'tasks.php';
	include 'header.html';

	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	$name = 'Development';
	$owner = 'Jon';
	$start = '030312';
	$due = '033112';
	$progress = 'progress';
	$note = 'some data';
	
	$taskname = 'task name';
	$taskdescription = 'description';
	$taskprojectID = 'projectid';
	$taskcreatorID = 'taskid';
	$taskassigneeID = 'assigneeid';
	$taskstart = 'taskstart';
	$taskdue = 'duedate';
	$taskcomplete = 'taskcomplete';
	$tasknote = 'tasknote';

	$myProject = new Project($name, $owner, $start, $due, $progress, $note);
		
	/*
	echo "project name: " . $myProject->getName() . "<br>"
		. "project owner: " . $myProject->getOwner() . "<br>"
		. "project start: " . $myProject->getStart() . "<br>"
		. "project due: " . $myProject->getEnd() . "<br>"
		. "project note: " . $myProject->getNote() . "<br>";
	
	$myProject->setName('new name');
	$myProject->setOwner('new owner');
	$myProject->setStart('new start');
	$myProject->setEnd('new end');
	$myProject->setNote('new note');
	
	echo "<br><br>project name: " . $myProject->getName() . "<br>"
		. "project owner: " . $myProject->getOwner() . "<br>"
		. "project start: " . $myProject->getStart() . "<br>"
		. "project due: " . $myProject->getEnd() . "<br>"
		. "project note: " . $myProject->getNote() . "<br>";
	
	//taks test
	
	$myTask = new Task($taskname, $taskdescription, $taskprojectID, $taskcreatorID, $taskassigneeID, $taskstart, $taskdue, $taskcomplete, $tasknote);
	
	echo "<br><br>task name: " . $myTask->getName() . "<br>"
	 	. "task description: " . $myTask->getDescription() . "<br>"
	 	. "task project ID: " . $myTask->getProjectID() . "<br>"
		. "task creator ID: " . $myTask->getCreatorID() . "<br>"
		. "task assignee ID: " . $myTask->getAssigneeID() . "<br>"
		. "task start date: " . $myTask->getStart() . "<br>"
		. "task due date: " . $myTask->getDue() . "<br>"
		. "task complete: " . $myTask->getComplete() . "<br>"
		. "task note: " . $myTask->getNotes() . "<br>";
	
	$myTask->setName('new name');
	$myTask->setDescription('new description');
	$myTask->setProjectID('new project id');
	$myTask->setCreatorID('new creator id');
	$myTask->setAssigneeID('new assignee id');
	$myTask->setStart('new start date');
	$myTask->setDue('new due date');
	$myTask->setComplete('new complete');
	$myTask->setNotes('new note');
	
	echo "<br><br>task name: " . $myTask->getName() . "<br>"
	 	. "task description: " . $myTask->getDescription() . "<br>"
	 	. "task project ID: " . $myTask->getProjectID() . "<br>"
		. "task creator ID: " . $myTask->getCreatorID() . "<br>"
		. "task assignee ID: " . $myTask->getAssigneeID() . "<br>"
		. "task start date: " . $myTask->getStart() . "<br>"
		. "task due date: " . $myTask->getDue() . "<br>"
		. "task complete: " . $myTask->getComplete() . "<br>"
		. "task note: " . $myTask->getNotes() . "<br>";
	*/
	//test sql
	
		$query = "SELECT * FROM project WHERE project_id = 1";
		
		$r = mysqli_query ($dbc, $query); 
		
		//check to ensure the query executed correctly 
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
			{

				$myProject->setName($row['project_name']);
				$myProject->setOwner($row['owner_id']);
				$myProject->setStart($row['start_date']);
				$myProject->setDue($row['due_date']);
				$myProject->setNote($row['notes']);
						
			} 
		
	echo "<br><br>project name: " . $myProject->getName() . "<br>"
		. "project owner: " . $myProject->getOwner() . "<br>"
		. "project start: " . $myProject->getStart() . "<br>"
		. "project due: " . $myProject->getDue() . "<br>"
		. "project note: " . $myProject->getNote() . "<br>";
	
	
	include 'footer.html';
	

?>