<?php
include("../../nav/admin_includes.php");

if(isset($_POST["edit_admin_action"])) {

  $message = '';
  $err_admin_name = '';
  $err_no = '';
  $err_mail = '';
 
  
  $admin_name = '';
  $phone_number = '';
  $email = '';

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
  

	
  if($err_admin_name == '' && $err_no == ''  && $err_mail == '') {
	  
	
   if($_POST["edit_admin_action"] == "Edit Admin") {
		
		$admin_id = clean_text($_POST["admin_id"]);
			
		$admin->editAdmin($admin_id,$admin_name,$phone_number,$email);
	
		$message = '<div class="alert alert-success">Admin edited successfully</div>';

	   
		$data = array(
			'err_admin_name'   => $err_admin_name,
			'err_no'   => $err_no,
			'err_mail'   => $err_mail,
			'message' => $message
		);
   }
   
  } else {
	  
	$data = array(
		'err_admin_name'   => $err_admin_name,
		'err_no'   => $err_no,
		'err_mail'   => $err_mail,
		'message' => $message
	);
   
 }
 echo json_encode($data);
}
?>