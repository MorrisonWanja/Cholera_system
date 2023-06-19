<?php
session_start();

include("../../connection/database_connection.php");
include("../../classes/function.php");


	
include("../../classes/hospital.php");
include("../../classes/doctor.php");
include("../../classes/patient.php");
include("../../classes/data.php");
include("../../classes/admin.php");
include("../../classes/messages.php");

$db = new DBConnection();
$database = $db->getConnection();

$hospital = new Hospital($database);
$doctor = new Doctor($database);
$patient = new Patient($database);
$p_data = new Data($database);
$msg = new Message($database);

if(!empty($_SESSION['doctor_logedin'])){
		
		$email = $_SESSION['doctor_logedin'];
		
		$doctors = $doctor->confirmLogin($email);
		
		foreach($doctors as $row) {
				  
			$doctor_id =  $row['doctor_id'];
			
			$doctor_name = $row['doctor_name'];
			$email = $row['email'];
			
		  
		}
	} else {
		header('location: ../login.php');
	}
?>
