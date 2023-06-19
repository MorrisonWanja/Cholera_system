<?php
include("../../nav/doctor_includes.php");

	
	$msg_status = 0;
	$patient_id = clean_text($_POST['patient_id']);
	
	$sender ='Doctor';

	
	
	$count_msg = $msg->checkUnread($patient_id,$msg_status,$sender);
	
	

    $data = array(
		'status'   => $count_msg
    );
   

 
 echo json_encode($data);
?>