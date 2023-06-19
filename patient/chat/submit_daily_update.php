<?php
include("../../nav/patient_includes.php");

if(isset($_POST["submit_action"])) {

  $message = '';
  $err_temp = '';
  $err_brief = '';
  
  $temperature = '';
  $symptoms = '';
  $brief_desciption = '';

  if(empty($_POST["temperature"])) {
   
		$err_temp .= '<p class="text-danger">Temperature is required</p>';
		
		} else {
			
		$temperature = clean_text($_POST["temperature"]);
			
	}
	  
	if(empty($_POST["brief_desciption"])) { 

		$err_brief .= '<p class="text-danger">Brief desciption required</p>';

	} else {
		
		$brief_desciption = clean_text($_POST["brief_desciption"]);
		
	 
	}
	
  $checkbox1 =$_POST['symptoms'];
	
	$symptoms="";  
	
	foreach($checkbox1 as $chk1) {  
	   
		  $symptoms .= $chk1.",";  
		  
	};  
	
    $symptom = $symptoms;
	
  if($err_temp == '' && $err_brief == '' ) {
	  
	
   if($_POST["submit_action"] == "Submit your data") {
	
	
	date_default_timezone_set('Africa/Nairobi');
	
	
	$time_updated = date("H:i:s");
	$date_updated= date("Y-m-d");
	
		$p_data->submitData($temperature,$brief_desciption,$symptom,$patient_id,$date_updated,$time_updated);
	
		$message = '<div class="alert alert-success">Submitted</div>';

	   
		$data = array(
			'err_temp'   => $err_temp,
			'err_brief'   => $err_brief,
			'message' => $message
		);
   }
   
  } else {
	  
   $data = array(
			'err_temp'   => $err_temp,
			'err_brief'   => $err_brief,
			'message' => $message
	);
   
 }
 echo json_encode($data);
}

?>