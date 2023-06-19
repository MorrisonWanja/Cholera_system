<?php
session_start();

unset($_SESSION['doctor_logedin']);

	
	header("location: ../");
?>