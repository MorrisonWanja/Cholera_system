<?php
include("../../nav/doctor_includes.php");

	$patient_id = 5;//clean_text($_POST['patient_id']);
	$doctor_id = 41;//clean_text($_POST['doctor_id']);
	$msg_status =  1;//Read
	$sender = 'Patient';
	


			$msg->updateMessage($msg_status,$doctor_id,$patient_id,$sender);

$data = array(
	'message'  => "message"
   );

 echo json_encode($data);
?>