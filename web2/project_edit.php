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
				<h4>Edit Project</h4>
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	if (isset($_POST['projectid'])){
	
		$project_id = $_POST['projectid'];
		
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
		
		echo "<form action=\"project_update.php\" method=\"post\">";
		echo "Project ID: <input type=\"text\" name=\"project_id\" value=\"$project_id\" readonly=\"true\"><br>";
		echo "Project Name: <input type=\"text\" name=\"name\" value=\"$name\"><br>";
		echo "Project Owner: <input type=\"text\" name=\"owner\" value=\"$owner\"><br>";
		echo "Start Date: <input type=\"text\" name=\"start\" value=\"$start\"><br>";
		echo" Due Date: <input type=\"text\" name=\"due\" value=\"$due\"><br>";
		echo "Progress: <input type=\"text\" name=\"progress\" value=\"$progress%\" readonly=\"true\"><br>";
		echo "Complete: <input type=\"checkbox\" name=\"complete\" $complete><br>";
		echo "Notes: <input type=\"text\" name=\"note\" value=\"$note\"><br>";
		echo "<input type=\"submit\" value=\"Submit\">";
		echo "<input type=\"button\" value=\"Cancel\" onClick=\"history.go(-1);return true;\">";
		echo "</form>";

	}else {
		
		echo "Sorry, you must have reached this page in error";
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
