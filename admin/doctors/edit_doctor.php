<?php
include("../../nav/admin_includes.php");

if(isset($_POST["edit_doc_action"])) {

  $message = '';
  $err_doc_name = '';
  $err_no = '';
  $err_mail = '';
  $err_hospital = '';
  /*$err_pass = '';
  $err_cpass = '';*
  
  $doctor_name = '';
  $phone_number = '';
  $email = '';
  $hospital_id  = '';
  /*$password = '';
  $cpassword = '';*/

  if(empty($_POST["doctor_name"])) {
   
		$err_doc_name .= '<p class="text-danger">Doctor name is required</p>';
		
		} else {
			
		$doctor_name = clean_text($_POST["doctor_name"]);
			
	}
	  
	if(empty($_POST["email"])) { 

		$err_mail .= '<p class="text-danger">Email required</p>';

	} else {
		
		$email = clean_text($_POST["email"]);
		
	 
	}
	
  if (strlen($_POST["phone_number"]) >= '8') {
		
		if(empty($_POST["phone_number"])){
		   
			$err_no .= '<p class="text-danger">Phone number is required</p>';
		  
		}
		else {
				
			$phone_number = clean_text($_POST["phone_number"]);	
		
		}
	} else {
			 
		$err_no .= '<p class="text-danger">Incorrect phone number!</p>';
		
	}
  
	if(empty($_POST["hospital"])) {
	  
		$err_hospital .= '<p class="text-danger">Hospital is required</p>';
		
		} else {
		  
			$hospital_id = clean_text($_POST["hospital"]);
	   
		
	}
	/*if($_POST["password"] == $_POST["cpassword"]) {
	  
	  if(empty($_POST["password"])) { 
	  
			$err_pass .= '<p class="text-danger">Password required</p>';
	   
	  } else {
		  
		   if (!strlen($_POST["password"]) >= '8') {
			   
				$err_pass .= '<p class="text-danger">Your password must contain at least 8 characters!</p>';
			
		   } else {
			   
			$password = clean_text($_POST["password"]);
			
		   }
		}
	} else {
	   
	   $err_cpass .= '<p class="text-danger">Password do not match</p>';
	    && $err_pass == ''  && $err_cpass == ''
	}*/

	
  if($err_doc_name == '' && $err_no == ''  && $err_mail == ''  && $err_hospital == '' ) {
	  
	
   if($_POST["edit_doc_action"] == "Edit Doctor") {
		
		$doctor_id = clean_text($_POST["doctor_id"]);
			
		$doctor->editDoctor($doctor_id,$doctor_name,$phone_number,$email,$hospital_id);
	
		$message = '<div class="alert alert-warning">Doctor edited successfully</div>';

	   
		$data = array(
			'err_doc_name'   => $err_doc_name,
			'err_no'   => $err_no,
			'err_mail'   => $err_mail,
			'err_hospital'   => $err_hospital,
			'message' => $message
		);
   }
   
  } else {
	  
   $data = array(
		'err_doc_name'   => $err_doc_name,
		'err_no'   => $err_no,
		'err_mail'   => $err_mail,
		'err_hospital'   => $err_hospital,
		'message'  => $message
	);
   
 }
 echo json_encode($data);
}

?>