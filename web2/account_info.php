<?php

	$session = session_id();
	
	if(!isset($session)){
		
		session_start();
		
		$session = session_id();
		
	}
	
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