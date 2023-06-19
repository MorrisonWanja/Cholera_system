<?php
//error_reporting(E_ERROR | E_PARSE);

class DBConnection{
	private $dbConnect = false;

		public function getConnection(){
			
			try {
				$conn = new PDO('mysql:host=localhost;dbname=morrisondb','root', '');
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbConnect = $conn;
				return $this->dbConnect;
			} catch(Exception $e) {
				return false;
			}
		}
		


}

?>