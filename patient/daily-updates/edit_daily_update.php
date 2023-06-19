<?php
include("../../nav/patient_includes.php");

if(isset($_POST["edit_action"])) {

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
	
	$data_id = clean_text($_POST["data_id"]);
	
  if($err_temp == '' && $err_brief == '' ) {
	  
	
   if($_POST["edit_action"] == "Edit your data") {
	//$patient_id = 6;
		$p_data->editData($data_id,$temperature,$brief_desciption,$symptom);
	
		$message = '<div class="alert alert-warning">Edited</div>';

	   
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