<?php
include("../../nav/admin_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["patient"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$patient_id = $_POST["patient"][$i];
		
			
			$patient->deletePatient($patient_id);
		
			
			
		}
		
		header("Location: ../patients/");
	
	}
	
	?>