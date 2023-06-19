<?php
include("../../nav/admin_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["admin"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$admin_id = $_POST["admin"][$i];
		
			
			$doctor->deleteAdmin($admin_id);
		
			
			
		}
		
		header("Location: ../admins/");
	
	}
	
	?>