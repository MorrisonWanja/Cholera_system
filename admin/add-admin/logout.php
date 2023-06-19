<?php
session_start();

unset($_SESSION['logedin']);

	
	header("location: ../../");
?>