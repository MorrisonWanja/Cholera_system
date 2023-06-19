<?php
include("../../nav/patient_includes.php");


if(isset($_POST["send_action"])) {

  $message = '';
  $error = '';
  $message = '';

  if(empty($_POST["message_to_send"])){
	  
   $error .= '<p class="text-danger">Please type your message</p>';
  
  }
  else {
   
    $message = clean_text($_POST["message_to_send"]);

  }
  
  if($error == '') {
	  
	date_default_timezone_set('Africa/Nairobi');

   if($_POST["send_action"] == "Send"){

	



	$msg_status = '0';//Unread
	$sender = $_POST['sender'];
	$patient_id = $_POST['patient_id'];
	$doctor_id = $_POST['doctor_id'];


	
	$msg->sendMessage($patient_id,$doctor_id,$message,$msg_status,$sender);
	

	$message = '<div class="alert alert-success">Message sent</div>';
    
   }

   
    $data = array(
		'error'   => $error,
		'message'  => $message
    );
   
  }
 
 echo json_encode($data);
}

?>