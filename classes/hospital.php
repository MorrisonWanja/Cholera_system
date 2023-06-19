<?php
class Hospital {
	public function __construct($database){
        $this->dbConnect = $database;
    }
	private function getData($sqlQuery) {
		
		$statement = $this->dbConnect->prepare($sqlQuery);
		
		$statement->execute();
	
		$result = $statement->fetchAll();
	
		
		$data= array();
		foreach($result as $row) {
			$data[]=$row;            
		}
		return $data;
	}
	
	private function getRecords($sqlQuery) {
		
		$statement = $this->dbConnect->prepare($sqlQuery);
		
		$statement->execute();
	
		$clients = $statement->rowCount();
		
		return $clients;
	}
	
	public function addHospital($hospital_name,$hospital_category,$tel_number,$county,$location,$latitude,$longitude){
		 
		 $sqlQuery = 'INSERT INTO hospital(hospital_name,hospital_category,tel_number,county,location,latitude,longitude) 
			VALUES("'.$hospital_name.'","'.$hospital_category.'","'.$tel_number.'","'.$county.'","'.$location.'","'.$latitude.'","'.$longitude.'") ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	 
	public function selectHospitals(){

		
		$sqlQuery = "SELECT * FROM hospital";

      	return  $this->getData($sqlQuery);
	}
	
	public function countHospitals(){

		
		$sqlQuery = "SELECT * FROM hospital";

      	return  $this->getRecords($sqlQuery);
	}
	
	public function editHospital($hospital_id,$hospital_name,$hospital_category,$tel_number,$county,$location,$latitude,$longitude){
		 
		 $sqlQuery = 'UPDATE hospital SET hospital_name = "'.$hospital_name.'",hospital_category = "'.$hospital_category.'",tel_number = "'.$tel_number.'",county = "'.$county.'",location = "'.$location.'",latitude = "'.$latitude.'",longitude = "'.$longitude.'" WHERE hospital_id = "'.$hospital_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	public function deleteHospital($hospital_id){
		 
		 $sqlQuery = 'DELETE FROM hospital WHERE hospital_id = "'.$hospital_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	
	public function selectHospitalByID($hospital_id){

		
		$sqlQuery = "SELECT * FROM hospital WHERE hospital_id = '$hospital_id'";

      	return  $this->getData($sqlQuery);
	}
	
	
}
?>