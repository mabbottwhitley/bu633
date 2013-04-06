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

	$name = $_POST["name"];
	$owner = $_POST["owner"];
	$start = $_POST["start"];
	$due = $_POST["due"];
	$progress = $_POST["progress"];
	$complete = 0;
	$note = $_POST["note"];

	$newProject = new Project($name, $owner, $start, $due, $progress, $complete, $note);
	
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
