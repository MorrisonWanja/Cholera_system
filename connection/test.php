<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "morrisondb";

// create the connection
$conn = mysqli_connect($serverName,$username,$password,$dbname);

if(mysqli_connect_errno()){
	echo "Failed to connect!";
	exit();
}
echo "Connected Successfuly!";

?>