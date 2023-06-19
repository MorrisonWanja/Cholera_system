<?php
class Message {
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
	
		$messages = $statement->rowCount();
		
		return $messages;
	}
	
	
	public function readMessages($patient_id){

		
		$sqlQuery = "SELECT * FROM chat WHERE patient_id = '".$patient_id."' ORDER BY date_sent ASC ";

      	return  $this->getData($sqlQuery);
	}
	

	
	public function sendMessage($patient_id,$doctor_id,$message,$msg_status,$sender){

		
		$sqlQuery = "INSERT INTO chat(patient_id,doctor_id,message,msg_status,sent_by) VALUES ('".$patient_id."','".$doctor_id."','".$message."','".$msg_status."','".$sender."')";

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
	}
	
	
	
	public function updateMessage($msg_status,$doctor_id,$patient_id,$sender){

		
		$sqlQuery = 'UPDATE chat SET msg_status = "'.$msg_status.'" WHERE patient_id = "'.$patient_id.'" AND doctor_id = "'.$doctor_id.'" AND sent_by = "'.$sender.'"';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
	}
	
	public function checkUnread($patient_id,$status,$sender){

		
		$sqlQuery = "SELECT msg_status FROM chat WHERE patient_id = '".$patient_id."' AND msg_status = '$status' AND sent_by = '".$sender."'";

      	return  $this->getRecords($sqlQuery);
	}
	
	public function countUnread($doctor_id,$status,$sender){

		
		$sqlQuery = "SELECT msg_status FROM chat WHERE doctor_id = '".$doctor_id."' AND msg_status = '$status' AND sent_by = '".$sender."'";

      	return  $this->getRecords($sqlQuery);
	}
	
	public function selectMessages($doctor_id,$status,$sender){

		
		$sqlQuery = "SELECT chat.chat_id,chat.message,chat.msg_status,chat.sent_by,chat.date_sent,chat.date_sent,patient.patient_name,patient.patient_id,doctor.doctor_name FROM chat
		JOIN
		patient
		ON
		patient.patient_id = chat.patient_id
		JOIN
		doctor
		ON
		chat.doctor_id = doctor.doctor_id
		WHERE chat.doctor_id = '".$doctor_id."' AND chat.msg_status = '$status' AND chat.sent_by = '".$sender."'
		GROUP BY chat.patient_id";

      	return  $this->getData($sqlQuery);
	}
	
	public function newMessage($patient_id, $sender, $msg_status){

		
		$sqlQuery = "SELECT * FROM chat WHERE patient_id = '".$patient_id."' AND msg_status = '$msg_status' AND sent_by = '".$sender."'";

      	return  $this->getRecords($sqlQuery);
	}
	
	public function readMessage($patient_id, $sender, $msg_status){

		
		$sqlQuery = "SELECT * FROM chat WHERE patient_id = '".$patient_id."' AND msg_status = '$msg_status' AND sent_by = '".$sender."'";

      	return  $this->getRecords($sqlQuery);
	}
	
	public function deleteMessage($chat_id){

		
		$sqlQuery = 'DELETE FROM chat WHERE chat_id = "'.$chat_id.'"';

      	$statement = $this->dbConnect->prepare($sqlQuery);
		
			$statement->execute();
	}
}
?>