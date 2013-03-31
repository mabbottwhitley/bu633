<?php

		$button = $_POST['button'];
		
		if($button[0]=='Edit'){
			
			include 'project_edit.php';
			
		}
		else if ($button[0]=='Add Task'){
		
			$project_id = $_POST['projectid'];
			
			echo "<form action=\"task_add.php\" method=\"post\">";
			echo "Task Name: <input type=\"text\" name=\"name\"><br>";
			echo "Description: <input type=\"text\" name=\"description\"><br>";
			echo "Project ID: <input type=\"text\" name=\"projectid\" value=\"$project_id\" readonly=\"true\"><br>";
			echo "Sequence: <input type=\"text\" name=\"sequence\"><br>";
			echo "Creator ID: <input type=\"text\" name=\"creatorid\"><br>";
			echo "Assignee ID: <input type=\"text\" name=\"assigneeid\"><br>";
			echo "Start Date: <input type=\"text\" name=\"start\"><br>";
			echo "Due Date: <input type=\"text\" name=\"due\"><br>";
			echo "Complete: <input type=\"text\" name=\"complete\"><br>";
			echo "Note: <input type=\"text\" name=\"note\"><br>";
				
				echo "<input type=\"submit\" value=\"Submit\">";
			echo "</form>";
		}

?>