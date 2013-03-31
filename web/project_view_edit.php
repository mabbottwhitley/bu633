<?php

		$button = $_POST['button'];
		
		if($button[0]=='View'){
			
			include 'project_view.php';
			
		}
		else if ($button[0]=='Edit'){
			
			include 'project_edit.php';
		}

?>