<?php
include("../../nav/doctor_includes.php");

if(clean_text($_POST["action"]) == "Delete"){
		
		$rowCount = count($_POST["chat"]);
		
		for($i=0;$i<$rowCount;$i++) {

			$chat_id = $_POST["chat"][$i];
		
			
			$msg->deleteMessage($chat_id);
		
			
			
		}
		
		header("Location: ../messages/");
	
	}
	
	?>