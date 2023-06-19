<?php
include("../../nav/admin_includes.php");

if(isset($_POST["add_pat_action"])) {

  $message = '';
  $err_pat_name = '';
  $err_no = '';
  $err_mail = '';
  $err_county = '';
  $err_loc = '';
  $err_doctor = '';
  $err_pass = '';
  $err_cpass = '';
  
  $patient_name = '';
  $phone_number = '';
  $email = '';
  $county = '';
  $location  = '';
  $doctor_id  = '';
  $password = '';
  $cpassword = '';

  if(empty($_POST["patient_name"])) {
   
		$err_pat_name .= '<p class="text-danger">Patient name is required</p>';
		
		} else {
			
		$patient_name = clean_text($_POST["patient_name"]);
			
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
	
	if(empty($_POST["county"])) {
	  
		$err_county .= '<p class="text-danger">County is required</p>';
		
		} else {
		  
			$county = clean_text($_POST["county"]);
	   
		
	}
	
	if(empty($_POST["location"])) {
	  
		$err_loc .= '<p class="text-danger">Location is required</p>';
		
		} else {
		  
			$location = clean_text($_POST["location"]);
	   
		
	}
	
	if(empty($_POST["doctor"])) {
	  
		$err_doctor .= '<p class="text-danger">Doctor is required</p>';
		
		} else {
		  
			$doctor_id = clean_text($_POST["doctor"]);
	   
		
	}
  
	if(empty($_POST["doctor"])) {
	  
		$err_doctor .= '<p class="text-danger">Doctor is required</p>';
		
		} else {
		  
			$doctor_id = clean_text($_POST["doctor"]);
	   
		
	}
	if($_POST["password"] == $_POST["cpassword"]) {
	  
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
	   
	}

	
  if($err_pat_name == '' && $err_no == ''  && $err_mail == ''  && $err_county == ''  && $err_loc == ''  && $err_doctor == ''  && $err_pass == ''  && $err_cpass == '') {
	  
	
   if($_POST["add_pat_action"] == "Add Patient") {

$latitude = clean_text($_POST["latitude"]);
$longitude = clean_text($_POST["longitude"]);	
	
		$patient->addPatient($patient_name,$phone_number,$email,$county,$doctor_id,$location,$latitude,$longitude,$password);
	
		$message = '<div class="alert alert-success">Patient added successfully</div>';

	   
		$data = array(
			'err_pat_name'   => $err_pat_name,
			'err_no'   => $err_no,
			'err_mail'   => $err_mail,
			'err_county'   => $err_county,
			'err_loc'   => $err_loc,
			'err_doctor'   => $err_doctor,
			'err_pass'   => $err_pass,
			'err_cpass'  => $err_cpass,
			'message' => $message
		);
   }
   
  } else {
	  
   $data = array(
			'err_pat_name'   => $err_pat_name,
			'err_no'   => $err_no,
			'err_mail'   => $err_mail,
			'err_county'   => $err_county,
			'err_loc'   => $err_loc,
			'err_doctor'   => $err_doctor,
			'err_pass'   => $err_pass,
			'err_cpass'  => $err_cpass,
			'message' => $message
	);
   
 }
 echo json_encode($data);
}

?>