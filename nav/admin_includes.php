<?php
session_start();

include("../../connection/database_connection.php");
include("../../classes/function.php");


	
include("../../classes/hospital.php");
include("../../classes/doctor.php");
include("../../classes/patient.php");
include("../../classes/data.php");
include("../../classes/admin.php");

$db = new DBConnection();
$database = $db->getConnection();

$hospital = new Hospital($database);
$doctor = new Doctor($database);
$patient = new Patient($database);
$p_data = new Data($database);
$admin = new Admin($database);

if(!empty($_SESSION['logedin'])){
		
		$email = $_SESSION['logedin'];
		
		$admins = $admin->confirmLogin($email);
		
		foreach($admins as $row) {
				  
			$admin_id =  $row['admin_id'];
			
			$admin_name = $row['admin_name'];
			$email = $row['email'];
			
		  
		}
	} else {
		header('location: ../login.php');
	}
?>
