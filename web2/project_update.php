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

	if (isset($_POST["project_id"])){
	
		if(isset($_POST['complete'])){
			
			$complete = 1;
			
		}else{
			
			$complete = 0;
			
		}

		$project_id = $_POST["project_id"];
		$name = $_POST["name"];
		$owner = $_POST["owner"];
		$start = $_POST["start"];
		$due = $_POST["due"];
		$progress = $_POST["progress"];

		$note = $_POST["note"];
	
		$newProject = new Project($name, $owner, $start, $due, $progress, $complete, $note);
		
		$name = $newProject->getName();
		$owner = $newProject->getOwner();
		$start = $newProject->getStart();
		$due = $newProject->getDue();
		$progress = $newProject->getProgress();
		$complete = $newProject->getComplete();
		$note = $newProject->getNote();
		
		$query = "UPDATE project SET project_name='$name', owner_id='$owner', start_date='$start', due_date='$due', progress='$progress', complete='$complete', notes='$note' WHERE project_id='$project_id'";
			
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
