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
		<title>Accounts</title>
		<meta name="description" content="This is the Account page">
		<meta name="keywords" content="Account Page, account, page">
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
			  <div id="sidebar_container">
				<div class="sidebar">
				  <h3>User Groups</h3>
					<ul>
						<li>Administators</li>
						<li>Project Managers</li>
						<li>Task Assignees</li>
						<li>Viewers</li>
					</ul>
				</div>
			  </div>
			  <div class="content">
				<h4>User Account Info</h4>
				<p>
				
<?php

	$session = session_id();
	
	/*if(empty($session)) {
	
		session_unset();
		
		session_start();
	
		$session = session_id();
		
	}*/

	include '../sql_connect/mysqli_connect.php';
	
	ini_set('display_errors',1); 
	error_reporting(E_ALL);
	
	$queryUsers = "SELECT user_name, first_name, last_name, job_title, user_group_id FROM user WHERE session_id='$session'";
	
	$rUsers = mysqli_query ($dbc, $queryUsers); 
	
	$userCatch = 0;
				
	while ($rUserRow = mysqli_fetch_array($rUsers, MYSQLI_ASSOC)){
	
		//if ($rUserRow['session_id'] == $session){
		
			$userCatch = 1;
			
			$firstName = $rUserRow['first_name'];
			$lastName = $rUserRow['last_name'];
			$userName = $rUserRow['user_name'];
			$jobTitle = $rUserRow['job_title'];
			$userGroupID = $rUserRow['user_group_id'];
			$userGroupName = "No Group Set";
			
			$queryUsersGroup = "SELECT user_group_name FROM user_group WHERE user_group_id='$userGroupID'";
	
			$rUsersGroup = mysqli_query ($dbc, $queryUsersGroup); 
				
			while ($rUserGroupRow = mysqli_fetch_array($rUsersGroup, MYSQLI_ASSOC)){
			
				$userGroupName = $rUserGroupRow['user_group_name'];
			
			}
		//}
	
	}
	
	if($userCatch == 1){
		
		echo "<table id=\"user_info\">";
		echo "<tr><td>First Name: $firstName</td><td>";
		echo "<tr><td>Last Name: $lastName</td><td>";
		echo "<tr><td>User Name: $userName</td><td>";
		echo "<tr><td>Job Title: $jobTitle</td><td>";
		echo "<tr><td>User Group: $userGroupName</td><td>";
		echo "</table>";
		
	}else{
		
		echo "<input Type=\"button\" value=\"Create Account\" onClick=\"parent.location='account_new.html'\">";
		echo "<input Type=\"button\" value=\"Login\" onClick=\"parent.location='account_login.html'\">";
		
	}


?>					
					
				</p>
			  </div>
			</div>

			<footer>
				<p>&copy; CS633 Team1</p>
				<p id="printnotice">This is a print copy.</p>
			</footer>	
	
		</div>
	
	
	
</body>
	
</html>
