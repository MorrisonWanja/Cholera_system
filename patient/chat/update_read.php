<?php
include("../../nav/patient_includes.php");

	$patient_id = clean_text($_POST['patient_id']);
	$doctor_id = clean_text($_POST['doctor_id']);
	$msg_status =  1;//Read
	$sender = 'Doctor';
	


			$msg->updateMessage($msg_status,$doctor_id,$patient_id,$sender);

$data = array(
	'message'  => "message"
   );

 echo json_encode($data);
?>