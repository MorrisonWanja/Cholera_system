<?php
class Patient {
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
	
	public function addPatient($patient_name,$phone_number,$email,$county,$doctor_id,$location,$latitude,$longitude,$password){
		 
		 $sqlQuery = 'INSERT INTO patient(patient_name,phone_number,email,county,location,latitude,longitude,password,doctor_id) 
			VALUES("'.$patient_name.'","'.$phone_number.'","'.$email.'","'.$county.'","'.$location.'","'.$latitude.'","'.$longitude.'","'.$password.'","'.$doctor_id.'") ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	 
	public function selectPatients(){

		
		$sqlQuery = "SELECT patient.patient_id,patient.patient_name,patient.phone_number,patient.email,doctor.doctor_name,patient.county,patient.location,patient.date_registered FROM patient
		JOIN
		doctor
		ON
		patient.doctor_id = doctor.doctor_id";

      	return  $this->getData($sqlQuery);
	}
	
	public function editPatient($patient_id,$patient_name,$phone_number,$email,$county,$doctor_id,$location,$latitude,$longitude){
		 
		 $sqlQuery = 'UPDATE patient SET patient_name = "'.$patient_name.'",phone_number = "'.$phone_number.'",email = "'.$email.'",county = "'.$county.'",doctor_id = "'.$doctor_id.'",location = "'.$location.'",latitude = "'.$latitude.'",latitude = "'.$latitude.'",longitude = "'.$longitude.'" WHERE patient_id = "'.$patient_id.'" ';
		 //,$password,password = "'.$password.'",
      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	public function deletePatient($patient_id){
		 
		 $sqlQuery = 'DELETE FROM patient WHERE patient_id = "'.$patient_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	
	public function selectPatientByID($patient_id){

		
		$sqlQuery = "SELECT * FROM patient WHERE patient_id = '$patient_id'";

      	return  $this->getData($sqlQuery);
	}
	
	public function loginPatient($email,$password){

		
		$sqlQuery = "SELECT * FROM patient WHERE email = '$email' AND password = '$password'";

      	return  $this->getRecords($sqlQuery);
	}
	public function confirmLogin($email) {
		$sqlQuery = "SELECT * FROM patient WHERE email = '$email'";

      	return  $this->getData($sqlQuery);
	}
	
	public function countPatients(){

		
		$sqlQuery = "SELECT * FROM patient";

      	return  $this->getRecords($sqlQuery);
	}
}
?>