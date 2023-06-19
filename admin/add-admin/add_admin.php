<?php
include("../../nav/admin_includes.php");

if(isset($_POST["add_admin_action"])) {

  $message = '';
  $err_admin_name = '';
  $err_no = '';
  $err_mail = '';
  $err_pass = '';
  $err_cpass = '';
  
  $admin_name = '';
  $phone_number = '';
  $email = '';
  $password = '';
  $cpassword = '';

  if(empty($_POST["admin_name"])) {
   
		$err_admin_name .= '<p class="text-danger">Doctor name is required</p>';
		
		} else {
			
		$admin_name = clean_text($_POST["admin_name"]);
			
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

	
  if($err_admin_name == '' && $err_no == ''  && $err_mail == '' && $err_pass == ''  && $err_cpass == '') {
	  
	
   if($_POST["add_admin_action"] == "Add Admin") {

			
		$admin->addAdmin($admin_name,$phone_number,$email,$password);
	
		$message = '<div class="alert alert-success">Admin added successfully</div>';

	   
		$data = array(
			'err_admin_name'   => $err_admin_name,
			'err_no'   => $err_no,
			'err_mail'   => $err_mail,
			'err_pass'   => $err_pass,
			'err_cpass'  => $err_cpass,
			'message' => $message
		);
   }
   
  } else {
	  
	$data = array(
		'err_admin_name'   => $err_admin_name,
		'err_no'   => $err_no,
		'err_mail'   => $err_mail,
		'err_pass'   => $err_pass,
		'err_cpass'  => $err_cpass,
		'message' => $message
	);
   
 }
 echo json_encode($data);
}

?>