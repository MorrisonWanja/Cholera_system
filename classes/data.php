<?php
class Data {
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
	
	public function submitData($temperature,$description,$symptoms,$patient_id,$date_updated,$time_updated){
		 
		 $sqlQuery = 'INSERT INTO patient_data(temperature,description,symptoms,patient_id,date_updated,time_updated) 
			VALUES("'.$temperature.'","'.$description.'","'.$symptoms.'","'.$patient_id.'","'.$date_updated.'","'.$time_updated.'") ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	 
	public function selectData(){

		
		$sqlQuery = "SELECT patient_data.data_id,patient_data.temperature,patient_data.description,patient_data.patient_id,patient_data.symptoms,patient.patient_name,patient_data.date_updated FROM patient
		JOIN
		patient_data
		ON
		patient_data.patient_id = patient.patient_id";

      	return  $this->getData($sqlQuery);
	}
	
	public function editData($data_id,$temperature,$description,$symptoms){
		 
		 $sqlQuery = 'UPDATE patient_data SET temperature = "'.$temperature.'",description = "'.$description.'",symptoms = "'.$symptoms.'" WHERE data_id = "'.$data_id.'" ';
		 //,$password,password = "'.$password.'",
      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	public function deleteData($data_id){
		 
		 $sqlQuery = 'DELETE FROM patient_data WHERE data_id = "'.$data_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	
	public function selectDataByID($data_id){

		
		$sqlQuery = "SELECT * FROM patient_data WHERE data_id = '$data_id'";

      	return  $this->getData($sqlQuery);
	}
	
	public function drawGraph(){
		  
			$sqlQuery = "SELECT temperature,
				COUNT(temperature) AS response
				FROM
				patient_data
				GROUP BY temperature";
			
		return  $this->getData($sqlQuery);	
	}
	
	public function drawGraphByDate(){
		  
			$sqlQuery = "SELECT date_updated,
				COUNT(date_updated) AS response
				FROM
				patient_data
				GROUP BY date_updated
				ORDER BY date_updated ASC
				LIMIT 30";
			
		return  $this->getData($sqlQuery);	
	}
	
	public function countUpdates($date){

		
		$sqlQuery = "SELECT * FROM patient_data WHERE date_updated = '".$date."'";

      	return  $this->getRecords($sqlQuery);
	}
}
?>