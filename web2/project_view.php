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
							<li class="inside"><a href="account.php">Account</a></li>
							<li class="inside"><a href="project_list.php">Projects</a></li>
							<li class="inside"><a href="contact.html">Contact</a>       
							</li>
						</ul>
					</div>
				</nav>
			</header>
			<div id="site_content">
			  <div class="content">
				<h4>Project Selection</h4>
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

	include 'projects.php';
	
	include '../sql_connect/mysqli_connect.php';
	include 'header.html';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST['projectid'])){
	
		$project_id = $_POST['projectid'];
	
		//$project_id = $_POST['project_id'][0];
		
		//echo "project id: " . $project_id;
		
		$query = "SELECT * FROM project WHERE project_id = $project_id";
			
		$r = mysqli_query ($dbc, $query); 
			
		//check to ensure the query executed correctly 
		
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
		
			$name = $row['project_name'];
			$owner = $row['owner_id'];
			$start = $row['start_date'];
			$due = $row['due_date'];
			
			//calculate progress
			
			$queryTasks = "SELECT * FROM task WHERE project_id='$project_id'";
	
			$rTasks = mysqli_query ($dbc, $queryTasks); 
			
			$rTaskSize = 0;
			$rTasksComplete = 0;
						
			while ($rTaskRow = mysqli_fetch_array($rTasks, MYSQLI_ASSOC)){
			
				$rTaskSize = $rTaskSize + 1;
			
				if ($rTaskRow['completion'] == 1){
				
					$rTasksComplete = $rTasksComplete + 1;
					
				}
			
			}
			
			if ($rTaskSize == 0){
				
				$progress = 0;
			}else{
			
				$progress = number_format((($rTasksComplete / $rTaskSize) * 100),0);
			}
			//end calculate progress
			
			
			if ($row['complete'] == 1){
				$complete = "checked";
			}else{
				$complete = "";
			}
			
			$note = $row['notes'];
			
		}
		
		echo "<form id=\"project\" action=\"project_edit_add.php\" method=\"post\"><table>";
		echo "<tr><td>Project ID:</td><td> <input type=\"text\" name=\"projectid\" value=\"$project_id\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Project Name:</td><td> <input type=\"text\" name=\"name\" value=\"$name\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Project Owner:</td><td> <input type=\"text\" name=\"owner\" value=\"$owner\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Start Date:</td><td> <input type=\"text\" name=\"start\" value=\"$start\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Due Date:</td><td> <input type=\"text\" name=\"due\" value=\"$due\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Progress:</td><td> <input type=\"text\" name=\"progress\" value=\"$progress%\" readonly=\"true\"></td></tr>";
		echo "<tr><td>Complete:</td><td> <input type=\"checkbox\" name=\"progress\" $complete disabled=\"true\"></td></tr>";
		echo "<tr><td>Notes:</td><td> <input type=\"text\" name=\"note\" value=\"$note\" readonly=\"true\"></td></tr>";
		echo "<tr><td colspan=3><input name=\"button[]\" type=\"submit\" value=\"Edit\">&nbsp;";
		echo "<input name=\"button[]\" type=\"submit\" value=\"Add Task\">";
		echo "<INPUT Type=\"button\" VALUE=\"Back\" onClick=\"history.go(-1);return true;\"></td></tr></table>";
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
			
			if ($row['completion'] == 1){
				$taskComplete = "checked";
			}else{
				$taskComplete = "";
			}
			
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
			echo "Complete: <input type=\"checkbox\" name=\"note\" $taskComplete disabled=\"true\"><br>";
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
