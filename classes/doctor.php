<?php
class Doctor {
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
	
	public function addDoctor($doctor_name,$phone_number,$email,$hospital,$password){
		 
		 $sqlQuery = 'INSERT INTO doctor(doctor_name,phone_number,email,password,hospital_id) 
			VALUES("'.$doctor_name.'","'.$phone_number.'","'.$email.'","'.$password.'","'.$hospital.'") ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	 
	public function selectDoctors(){

		
		$sqlQuery = "SELECT doctor.doctor_id,doctor.doctor_name,doctor.phone_number,doctor.email,hospital.hospital_name,doctor.date_registered FROM doctor
		JOIN
		hospital
		ON
		doctor.hospital_id = hospital.hospital_id";

      	return  $this->getData($sqlQuery);
	}
	
	public function editDoctor($doctor_id,$doctor_name,$phone_number,$email,$hospital_id){
		 
		 $sqlQuery = 'UPDATE doctor SET doctor_name = "'.$doctor_name.'",phone_number = "'.$phone_number.'",email = "'.$email.'",hospital_id = "'.$hospital_id.'" WHERE doctor_id = "'.$doctor_id.'" ';
		 //,$password,password = "'.$password.'",
      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	public function deleteDoctor($doctor_id){
		 
		 $sqlQuery = 'DELETE FROM doctor WHERE doctor_id = "'.$doctor_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	
	public function selectDoctorByID($doctor_id){

		
		$sqlQuery = "SELECT * FROM doctor WHERE doctor_id = '$doctor_id'";

      	return  $this->getData($sqlQuery);
	}
	
	public function selectDoctorsByLocaction(){

		
		$sqlQuery = "SELECT doctor.doctor_id,doctor.doctor_name,doctor.phone_number,doctor.email,hospital.hospital_name,doctor.date_registered FROM doctor
		JOIN
		hospital
		ON
		doctor.hospital_id = hospital.hospital_id";

      	return  $this->getData($sqlQuery);
	}
	
	public function loginDoctor($email,$password){

		
		$sqlQuery = "SELECT * FROM doctor WHERE email = '$email' AND password = '$password'";

      	return  $this->getRecords($sqlQuery);
	}
	public function confirmLogin($email) {
		$sqlQuery = "SELECT * FROM doctor WHERE email = '$email'";

      	return  $this->getData($sqlQuery);
	}
	
	public function countDoctors(){

		
		$sqlQuery = "SELECT * FROM doctor";

      	return  $this->getRecords($sqlQuery);
	}
	
}
?>