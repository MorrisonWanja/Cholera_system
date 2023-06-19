<?php
include("../../nav/patient_includes.php");


date_default_timezone_set('Africa/Nairobi');

	//$session = session_id();
	//$status =  '1';//Unread

	
	$patient_id = clean_text($_POST['patient_id']);
	$sender = 'Doctor';

	
	
	$msgs = $msg->readMessages($patient_id);
   
$i = 0;
foreach($msgs as $row){
   
   $sub_data['message1'][$i] = $row['message'];
   $sub_data['sent_by'][$i] = $row['sent_by'];
   $sub_data['date_sent'][$i] =  $row['date_sent'];
   
   $then = $sub_data['date_sent'][$i];

	$then = new DateTime($then);

	$now = new DateTime();
	//echo $now;
	$sinceThen = $then->diff($now);
   
   if($sub_data['sent_by'][$i] == 'Doctor'){
	   
		if($sinceThen->y != 0){

			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">'.$sinceThen->y.'</span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if($sinceThen->m != 0){

			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">'.$sinceThen->m.' months </span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->d != 0){

			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">'.$sinceThen->d.' days</span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->h != 0){

			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">'.$sinceThen->h.' hrs</span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if($sinceThen->i != 0){

			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">'.$sinceThen->i.'min</span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';

		} else {
			
			$data['sent_user'][$i] = '<li><div class="message-data"><span class="message-data-name"> '. $sub_data['sent_by'][$i].'</span><span class="message-data-time">Just now</span></div><div class="message my-message">'.$sub_data['message1'][$i].'</div></li>';
			
		}
	   
   }
   if($sub_data['sent_by'][$i] == 'Patient'){
	   
		if($sinceThen->y != 0){

			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >'.$sinceThen->y.' years</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->m != 0){

			echo $sinceThen->m.' months ';
			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >'.$sinceThen->m.' months</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->d != 0){

			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >'.$sinceThen->d.' days</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->h != 0){

			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >'.$sinceThen->h.' hrs</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}
		else if ($sinceThen->i != 0){

			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >'.$sinceThen->i.'min</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}
		else {

			$data['sent_user'][$i] = '<li class="clearfix"><div class="message-data align-right">  <span class="message-data-time" >Just now</span> &nbsp; &nbsp;  <span class="message-data-name" >'. $sub_data['sent_by'][$i].'</span> <i class="fa fa-circle me"></i>  </div><div class="message other-message float-right">'.$sub_data['message1'][$i].'</div></li>';

		}

   }

  $i++; 
  }
 
 echo json_encode($data);

?>