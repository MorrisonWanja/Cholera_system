<?php
session_start();

unset($_SESSION['patient_logedin']);

	
	header("location: ../");
?>