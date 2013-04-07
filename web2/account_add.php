<?php 
	
	if(!isset($_SESSION)) {
		
		session_start();
		
	}

?>
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
				<h4>Edit Project</h4>
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

	$session = session_id();
	
	/*if(empty($session)) {
	
		session_unset();
		
		session_start();
	
		$session = session_id();
		
	}*/
	
	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	$first = $_POST["first"];
	$last = $_POST["last"];
	$user = $_POST["user"];
	$title = $_POST["title"];
	$password = $_POST["password"];
	$verify = $_POST["verify"];
	$is_active = 1;
	
	$queryUsers = "SELECT user_name FROM user";
	
	$rUsers = mysqli_query ($dbc, $queryUsers); 
	
	$userCatch = 0;
				
	while ($rUserRow = mysqli_fetch_array($rUsers, MYSQLI_ASSOC)){
	
		if ($rUserRow['user_name'] == $user){
		
			$userCatch = 1;
			
		}
	
	}
	

	if($password == $verify && $userCatch != 1){
	
		$passwordHash = md5($password);
	
		$query = "INSERT INTO user (user_id, first_name, last_name, user_name, job_title, is_active, session_id, password_hash) VALUES (NULL, '$first', '$last', '$user', '$title', '$is_active', '$session', '$passwordHash')";
		
		$r = mysqli_query ($dbc, $query); 
		
		//check to ensure the query executed correctly 
		
		if($r){
	
			echo "User Added Successfully";
		
			}else {
				echo "User not added";
			}
	}else if ($password != $verify){
		
		echo "Passwords don't match";
		
	}else if ($userCatch == 1){
		
		echo "Username already taken";
		
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
