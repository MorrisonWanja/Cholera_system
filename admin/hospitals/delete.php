<?php
include("../../nav/admin_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["hospital"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$hospital_id = $_POST["hospital"][$i];
			
			$hospital->deleteHospital($hospital_id);
		
			
			
		}
		
		header("Location: ../hospitals/");
	
	}
	
	?>