<?php
include("../nav/includes_1.php");

header('Content-Type: application/json');


	$graphData = array();

	$datas = $p_data->drawGraphByDate();

	foreach ($datas as $row) {    
		
		$graphData[] = $row;
	
	}	
	
echo json_encode($graphData);							
?>