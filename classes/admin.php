<?php
class admin {
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
	
	public function addAdmin($admin_name,$phone_number,$email,$password){
		 
		 $sqlQuery = 'INSERT INTO admin(admin_name,phone_number,email,password) 
			VALUES("'.$admin_name.'","'.$phone_number.'","'.$email.'","'.$password.'") ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	 
	public function selectAdmins(){

		
		$sqlQuery = "SELECT * FROM admin";

      	return  $this->getData($sqlQuery);
	}
	
	public function editAdmin($admin_id,$admin_name,$phone_number,$email){
		 
		 $sqlQuery = 'UPDATE admin SET admin_name = "'.$admin_name.'",phone_number = "'.$phone_number.'",email = "'.$email.'" WHERE admin_id = "'.$admin_id.'" ';
		 //,$password,password = "'.$password.'",
      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	 
	public function deleteAdmin($admin_id){
		 
		 $sqlQuery = 'DELETE FROM admin WHERE admin_id = "'.$admin_id.'" ';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
		 
	 }
	
	public function selectAdminByID($admin_id){

		
		$sqlQuery = "SELECT * FROM admin WHERE admin_id = '$admin_id'";

      	return  $this->getData($sqlQuery);
	}
	
	public function loginAdmin($email,$password){

		
		$sqlQuery = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

      	return  $this->getRecords($sqlQuery);
	}
	public function confirmLogin($email) {
		$sqlQuery = "SELECT * FROM admin WHERE email = '$email'";

      	return  $this->getData($sqlQuery);
	}
	
	
	
}
?>