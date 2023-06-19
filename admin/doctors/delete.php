<?php
include("../../nav/admin_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["doctor"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$doctor_id = $_POST["doctor"][$i];
		
			
			$doctor->deleteDoctor($doctor_id);
		
			
			
		}
		
		header("Location: ../doctors/");
	
	}
	
	?>