<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/webpage.css">
		<link rel="stylesheet" type="text/css" href="css/Print.css" media="print">
		<title>Projects</title>
		<meta name="description" content="This is the Project page">
		<meta name="keywords" content="Projects Page, project, page">
		<meta charset="UTF-8">
		<style>
		img {border: 1px solid white}
		</style>
		
		

	</head>

	<body>	
		<div id="main">
			<header>
				<div id="title">
					<h1><a href="Home.html">Project Manager</a></h1>
					<h2>Manage Your Tasks</h2>
				</div>
				<nav>
					<div id="menu_container">
						<ul class="menu" id="nav">
							<li><a href="Home.html">Home</a></li>
							<li class="inside"><a href="Account.html">Account</a></li>
							<li class="inside"><a href="project_list.php">Projects</a></li>
							<li class="inside"><a href="contact.html">Contact</a>       
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<div id="site_content">
			  <div class="content">
				<h4>Edit Task</h4>
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

	include 'tasks.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	if (isset($_POST['task_id'])){

		
		$button = $_POST['button'];
		$task_id = $_POST["task_id"];
		
		if($button[0]=='Update'){
					
		
			if(isset($_POST['complete'])){
				
				$complete = 1;
				
			}else{
				
				$complete = 0;
				
			}
	
			$name = $_POST["name"];
			$description = $_POST["description"];
			$projectID = $_POST["projectid"];
			$sequence = $_POST["sequence"];
			$creatorID = $_POST["creatorid"];
			$assigneeID = $_POST["assigneeid"];
			$start = $_POST["start"];
			$due = $_POST["due"];
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
			
				echo "Task Updated Successfully";
				
			}else {
				echo "Task not added";
			}
			
			}
			else if($button[0]=='Delete'){
			
				$query = "DELETE FROM task WHERE task_id='$task_id'";
				
				$r = mysqli_query ($dbc, $query);
				
				if($r){
			
					echo "Task Deleted Successfully";
				
				}else {
						echo "Task not Deleted";
				}
			
			}
	}


?></P>
<!-------------PHP Coding Ends Here------------------------------------------------------------------------>					
			  </div>
			</div>

			<footer>
				<p>&copy; CS633 Team1</p>
				<p id="printnotice">This is a print copy.</p>
			</footer>	
	
		</div>
	
	
	
</body>
	
</html>
