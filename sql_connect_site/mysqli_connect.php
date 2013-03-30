<?php # Script 9.2 - mysqli_connect.php

	DEFINE ('DB_USER', 'proxee96_dbproj');
	DEFINE ('DB_PASSWORD', 'metcs633');
	DEFINE ('DB_HOST', 'localhost');
	DEFINE ('DB_NAME', 'proxee96_projects');
	
	$dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
	
	mysqli_set_charset($dbc, 'utf8');
	
?>