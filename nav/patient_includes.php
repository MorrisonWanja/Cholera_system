<?php
session_start();

include("../../connection/database_connection.php");
include("../../classes/function.php");


include("../../classes/patient.php");
include("../../classes/data.php");
include("../../classes/messages.php");

$db = new DBConnection();
$database = $db->getConnection();

$patient = new Patient($database);
$p_data = new Data($database);
$msg = new Message($database);

if(!empty($_SESSION['patient_logedin'])){
		
		$email = $_SESSION['patient_logedin'];
		
		$patients = $patient->confirmLogin($email);
		
		foreach($patients as $row) {
				  
			$patient_id =  $row['patient_id'];
			$doctor_id =  $row['doctor_id'];
			$patient_name = $row['patient_name'];
			$email = $row['email'];
			
		  
		}
	} else {
		header('location: ../login.php');
	}
?>
