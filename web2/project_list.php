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
				<h1>Project Selection</h1>										<div class="app">
<!-----PHP Coding Starts Here------------------------------------------------------------------------------->
<P><?php

include 'projects.php';
include '../sql_connect/mysqli_connect.php';

ini_set('display_errors',1); 
error_reporting(E_ALL);

$query = "SELECT * FROM project";
	
$r = mysqli_query ($dbc, $query); 
	
//check to ensure the query executed correctly 
	
if($r){

	echo "<form action=\"project_view_edit.php\" method=\"post\">";
	echo "<select name=\"projectid\">";
	
}
	
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)){
	
		echo "<option value=" . $row['project_id'] . ">" . $row['project_name'] . "</option>";
					
	} 
	
if($r){

	echo "</select> ";
	echo "<input name=\"button[]\" type=\"submit\" value=\"View\"> ";
	echo "<input name=\"button[]\" type=\"submit\" value=\"Edit\"> ";
	echo "<input name=\"button[]\" type=\"submit\" value=\"Add\"> ";
	echo "</form>";
	
}
?></p>
<!-------------PHP Coding Ends Here------------------------------------------------------------------------>
				</div>
			</div>						<div id="sidebar_container">			<P>			<h4>Project List</h4>			
			<table style="width: 100%; border-spacing:0;">							<tr>							<th>Project Name</th>							<th>Project Owner</th>							</tr>							<tr>							<td>Placeholder 1</td>							<td>Placeholder 2</td>							</tr>							<tr>							<td>Placeholder 3</td>							<td>Placeholder 4</td>							</tr>							<tr>							<td>Placeholder 5</td>							<td>Placeholder 6</td>							</tr>						</table>			</div>		</div>

			<footer>
				<p>&copy; CS633 Team1</p>
				<p id="printnotice">This is a print copy.</p>
			</footer>	
	
		</div>
	
	
	
</body>
	
</html>
