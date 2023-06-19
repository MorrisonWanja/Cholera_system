<?php
include("../../nav/patient_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["data"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$data_id = $_POST["data"][$i];
		
			
			$p_data->deleteData($data_id);
		
			
			
		}
		
		header("Location: ../hospitals/");
	
	}
	
	?>