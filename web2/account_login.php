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
				<h4>User Login</h4>
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

	//session_start();
	
	/*if(empty($session)) {
	
		session_unset();
		
		session_start();
	
		$session = session_id();
		
	}*/
	
	$session = session_id();

	include 'projects.php';
	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);

	$user = $_POST["user"];
	$password = $_POST["password"];
	
	$passwordHash = md5($password);
	
	$queryUsers = "SELECT user_name, password_hash FROM user WHERE user_name='$user' AND password_hash='$passwordHash'";
	
	$rUsers = mysqli_query ($dbc, $queryUsers); 

	$userFound = 0;
		
	while ($rUserRow = mysqli_fetch_array($rUsers, MYSQLI_ASSOC)){
	
		$userFound = 1;	
	
		$querySessionUpdate = "UPDATE user SET session_id='$session' WHERE user_name='$user'";
				
			$r = mysqli_query ($dbc, $querySessionUpdate); 
				
			//check to ensure the query executed correctly 
				
			if($r){
			
				echo "User logged in";
				
			}else {
				echo "User not logged in";
			}
	
	}
		
	if ($userFound == 0) {
		echo "Username or password error";
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
