<?php
session_start();
include("../../connection/database_connection.php");
include("../../classes/function.php");
include("../../classes/patient.php");

$db = new DBConnection();
$database = $db->getConnection();
$patient = new Patient($database);

if(isset($_POST["login_action"])) {

  $message = '';
  $err_mail = '';
  $err_pass = '';
  
  $email = '';
  $password = '';

  
	if(empty($_POST["email"])) { 

		$err_mail .= '<p class="text-danger">Email required</p>';

	} else {
		
		$email = clean_text($_POST["email"]);
		
	 
	}
	
	  
	if(empty($_POST["password"])) { 

		$err_pass .= '<p class="text-danger">Password required</p>';

	} else {
	  
	   
		   
		$password = clean_text($_POST["password"]);
		
	   
	}


	
if($err_mail == '' && $err_pass == '') {
	  
	
   if($_POST["login_action"] == "Login") {

			
		$count = $patient->loginPatient($email,$password);
		if($count > 0) {
			$_SESSION['patient_logedin'] = $email;
		} else { 
			$message = '<div class="alert alert-danger">Imcorrect password or email</div>';
		}

	   
		$data = array(
			'err_mail'   => $err_mail,
			'err_pass'   => $err_pass,
			'message' => $message
		);
   }
   
 } else {
	  
	$data = array(
			'err_mail'   => $err_mail,
			'err_pass'   => $err_pass,
			'message' => $message
		);
   
 }
 echo json_encode($data);
}

?>