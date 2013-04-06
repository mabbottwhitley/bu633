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
			
			if ($row['completion'] == 1){
				$taskComplete = "checked";
			}else{
				$taskComplete = "";
			}
			
			$taskNote = $row['notes'];
			$groupID = 0;
			
			//output tasks to screen
		
			echo "<form id=\"task\" action=\"task_update.php\" method=\"post\">";
			echo "Task ID: <input type=\"text\" name=\"task_id\" value=\"$taskID\" readonly=\"true\"><br>";
			echo "Name: <input type=\"text\" name=\"name\" value=\"$taskName\"><br>";
			echo "Description: <input type=\"text\" name=\"description\" value=\"$taskDescription\"><br>";
			echo "Sequence: <input type=\"text\" name=\"sequence\" value=\"$taskSequence\"><br>";
			echo" Project ID: <input type=\"text\" name=\"projectid\" value=\"$taskProjectID\" readonly=\"true\"><br>";
			echo "Creator ID: <input type=\"text\" name=\"creatorid\" value=\"$taskCreatorID\" readonly=\"true\"><br>";
			include 'assignees.php';
			echo "Start: <input type=\"text\" name=\"start\" value=\"$taskStart\"><br>";
			echo "Due: <input type=\"text\" name=\"due\" value=\"$taskDue\"><br>";
			echo "Complete: <input type=\"checkbox\" name=\"complete\" $taskComplete><br>";
			echo "Note: <input type=\"text\" name=\"note\" value=\"$taskNote\"><br>";
	
			echo "<input type=\"submit\" name=\"button[]\" value=\"Update\">";
			echo "<input type=\"button\" value=\"Cancel\" onClick=\"history.go(-1);return true;\">";
			echo "<input type=\"submit\" name=\"button[]\" value=\"Delete\">";
			echo "</form>";
		
			}

	}else {
		
		echo "Sorry, you must have reached this page in error";
	}

	include 'footer.html';

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
