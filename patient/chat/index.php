<?php
   include("../../nav/patient_includes.php");
   $page_title = "Chat";
   
   include("../../nav/patient_head.php");
   ?>
<style>
   @import url(https://fonts.googleapis.com/icon?family=Material+Icons);
@import url("https://fonts.googleapis.com/css?family=Raleway");
.chat .chat-history {
	padding: 30px 30px 20px;
	border-bottom: 2px solid white;
	overflow-y: scroll;
	height: 60vh;
	background: #F5F8FA;
}

.chat-image {
	position: absolute;
	width: 24px;
	height: 24px;
	left: 14px;
	top: 8px;
}

.chat .chat-header {
	padding: 5px;
	border-bottom: 2px solid white;
	background: #043da0;
	border-radius: 10px 10px 0px 0px;
	cursor: pointer;
}

.chat .chat-header img {
	float: left;
}

.chat .chat-header .chat-about {
	float: left;
	padding-left: 10px;
	margin-top: 6px;
}

.chat .chat-header .chat-with {
	font-weight: bold;
	font-size: 16px;
}

.chat .chat-header .chat-num-messages {
	color: #92959E;
}

.chat .chat-header .fa-times {
	float: right;
	color: #ffff;
	font-size: 20px;
	margin-top: 12px;
}

.chat .chat-history .message-data {
	margin-bottom: 15px;
}

.chat .chat-history .message-data-time {
	color: #a8aab1;
	padding-left: 6px;
}

.chat .chat-history .message {
	color: white;
	padding: 5px 5px;
	line-height: 26px;
	font-size: 16px;
	border-radius: 7px;
	margin-bottom: 10px;
	width: 90%;
	position: relative;
}

.chat .chat-history .message:after {
	bottom: 100%;
	left: 7%;
	border: solid transparent;
	content: " ";
	height: 0;
	width: 0;
	position: absolute;
	pointer-events: none;
	border-bottom-color: #043da0;
	border-width: 10px;
	margin-left: -10px;
}

.chat .chat-history .my-message {
	background: #043da0;
}

.chat .chat-history .other-message {
	background: #ffa500;
	
}

.chat .chat-history .other-message:after {
	border-bottom-color: #ffa500;
	left: 93%;
}

.chat .chat-message {
	padding: 10px 10px 10px 10px;
}

.chat .chat-message textarea {
	overflow: hidden;
	border-bottom-color: #ffa500;
	font: 14px/22px "Lato", Arial, sans-serif;
	border-radius: 5px;
	resize: none;
	margin: 5px auto;
	padding: 10px;
	height: 80px;
}

.chat .chat-message .fa-file-o,
.chat .chat-message .fa-file-image-o {
	font-size: 16px;
	color: gray;
	cursor: pointer;
}

.chat .chat-message button {
	float: right;
	color: #ffa500;
	font-size: 16px;
	text-transform: uppercase;
	border: none;
	cursor: pointer;
	font-weight: bold;
	background: #F2F5F8;
}

.chat .chat-message button:hover {
	color: #75b1e8;
}


/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

</style>
<body>
   <div class="container" style="margin-top:30px;">
   <div id="exTab1" class="container">
      <ul  class="nav nav-tabs">
         <li class="active">
            <a  href="#daily-update" data-toggle="tab" style="color:#000;">Daily Update</a>
         </li>
         <li><a href="#message-doctor" data-toggle="tab" onclick="updateMessages()" style="color:#000;"><i class="fa fa-envelope"></i> Message Doctor <?php
            $sender = 'Doctor';
            
            $msg_status =  0;//Unread
            
            $messages = $msg->checkUnread($patient_id,$msg_status,$sender);
            ?><span class="badge badge-danger badge-sm badge-pill" id="unread_messages"><?php echo $messages; ?></span></a>
         </li>
		 <li>
            <a  href="#my-update" data-toggle="tab" style="color:#000;">My Daily Update</a>
         </li>
		 <li>
            <a  href="../logout.php"  style="color:#000;"> <i class="fa fa-power-off"></i> Logout</a>
         </li>
      </ul>
      <div class="tab-content clearfix">
         <div class="tab-pane active" id="daily-update">
            <form method="post" id="submit_data_frm" autocomplete="off" style="margin-top:20px;background:#F5F8FA;padding:20px;">
               <span id="alert_action"></span>
               <div class="form-group">
                  <label>Temperature *</label>
                  <input type="text" name="temperature" id="temperature" class="form-control" required value=""/>
                  <span id="err_temp"></span>
               </div>
               <div>
                  <div class="form-group col-sm-4">
                     <label>Most common symptoms:</label>
                     <div class="checkbox">
                        <label><input type="checkbox" value="Fever"  name="symptoms[]">Fever</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Dry cough" name="symptoms[]">Dry cough</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Tiredness" name="symptoms[]">Tiredness</label>
                     </div>
                  </div>
                  <div class="form-group col-sm-4">
                     <label>Less common symptoms:</label>
                     <div class="checkbox">
                        <label><input type="checkbox" value="Aches and pains" name="symptoms[]">Aches and pains</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Sore throat" name="symptoms[]">Sore throat</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Diarrhoea" name="symptoms[]">Diarrhoea</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Conjunctivitis" name="symptoms[]">Conjunctivitis</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Headache" name="symptoms[]">Headache</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Loss of taste or smell" name="symptoms[]">Loss of taste or smell</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="A rash on skin, or discolouration of fingers or toes" name="symptoms[]">A rash on skin, or discolouration of fingers or toes</label>
                     </div>
                  </div>
                  <div class="form-group col-sm-4">
                     <label>Serious symptoms:</label>
                     <div class="checkbox">
                        <label><input type="checkbox" value="Difficulty breathing or shortness of breath" name="symptoms[]">Difficulty breathing or shortness of breath</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Chest pain or pressure" name="symptoms[]">Chest pain or pressure</label>
                     </div>
                     <div class="checkbox success">
                        <label><input type="checkbox" value="Loss of speech or movement" name="symptoms[]">Loss of speech or movement</label>
                     </div>
                  </div>
               </div>
               <div class="form-group col-sm-12">
                  <label for="brief_desciption">Brief description of how you are feeling:</label>
                  <textarea class="form-control" rows="4" id="brief_desciption" name="brief_desciption"></textarea>
                  <span id="err_brief"></span>
               </div>
               <div class="form-group">
                  <input type="hidden" name="submit_action" id="submit_action"/>
                  <input type="submit" name="submit_data" id="submit_data" class="btn btn-sm btn-success btn-block" required value="Submit your data"/>
               </div>
            </form>
         </div>
         <div class="tab-pane" id="message-doctor">
            <div class="chat-popup" id="myForm">
               <div class="chat">
                  <div class="chat-header clearfix">
                     <img src="../../img/avatar.png" alt="avatar" />
                  </div>
                  <div class="chat-history" id="message_scrol">
                     <ul id="sent_user" style="list-style-type:none;">
                     </ul>
                  </div>
                  <div class="chat-message" id="chat_footer">
                     <form method="post" id="frm_send_msg">
                        <input type="hidden" name="sender" id="sender" value="Patient"/>
                        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo $patient_id; ?>"/>
                        <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_id; ?>"/>
                        <textarea name="message_to_send" id="message_to_send" placeholder ="Type your message" rows="3"class="form-control"></textarea>
                        <input type="hidden" name="send_action" id="send_action"/>
                        <input type="hidden" name="action" id="action" value="Send">
                     </form>
                  </div>
               </div>
            </div>
         </div>
		 
		 <div class="tab-pane" id="my-update">
			<form action="delete.php" method="post" style="margin-top:20px;background:#F5F8FA;padding:20px;">
			   <div class="table-responsive">
				  <table class="table table-striped dt-responsive nowrap" id="myTable">
					 <thead>
						<tr class="success">
						   <th>#</th>
						   <th>Temperature</th>
						   <th>Description</th>
						   <th>Symptoms</th>
						   <th>Date Update</th>
						</tr>
					 </thead>
					 <tbody>
						<?php
						   $datas = $p_data->selectData();
						   $count = 0;
						   foreach($datas as $row) {
							$count++;
							extract($row);
						   ?>
						<tr>
						   <td>
							  <a href="edit.php?data=<?php echo $data_id; ?>" title="delete" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to edit?')"><i class="fa fa-edit"></i></a>
						   </td>
						   <td><?php echo $temperature; ?></td>
						   <td><?php echo $description; ?></td>
						   <td><?php echo $symptoms; ?></td>
						   <td><?php echo $date_updated; ?></td>
						</tr>
						<?php } ?>
					 </tbody>
				  </table>
			   </div>
			   <!--<input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>	
			   <input type="submit" name="action" class="btn btn-sm btn-primary" value="Decline" onclick="return confirm('Are you sure you want to decline?')"/>
				  <input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm(' Are you sure you want to delete?')"/>-->
			</form>

		 </div>
		 
      </div>
   </div>
	<script src='../../js/jquery.min.js'></script>
	<script src='../../js/bootstrap.min.js'></script>
	<script  src="../../js/script.js"></script>
	<script  src="../../js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
   <script>
      jQuery(document).ready(function ($) {
	$('#submit_data_frm')[0].reset();
	$('#submit_data').val('Submit your data');
	$('#submit_action').val('Submit your data');

	$(document).on('submit', '#submit_data_frm', function (event) {
		$('#err_temp').html("");
		$('#err_brief').html("");

		// disable button
		$("#submit_data").prop("disabled", true);
		// add spinner to button
		$("#submit_data").html(
			"<i class='fa fa-spinner fa-spin '></i> Submiting patient..."
		);


		event.preventDefault();

		var form_data = $(this).serialize();

		$.ajax({
			url: "submit_daily_update.php",
			method: "POST",
			data: form_data,
			dataType: "json",
			success: function (data) {

				if (data.err_temp != '' || data.err_brief != '') {

					$('#err_temp').html(data.err_temp);
					$('#err_brief').html(data.err_brief);
					$("#submit_data").html("Submit your data");
					$("#submit_data").prop("disabled", false);
				} else {
					$('#err_temp').html("");
					$('#err_brief').html("");
					$('#alert_action').html(data.message);
					$("#submit_data").html("Submitted successfully!!");
					$("#submit_data").prop("disabled", false);
					$('#submit_data_frm')[0].reset();

				}
			}
		});
	});
});

function PlaySound(soundObj) {
	var sound = document.getElementById(soundObj);
	sound.Play();
}

window.onload = getMessages;
setInterval(function () {
	getMessages();
	checkUnread();
}, 5000);

function checkUnread() {


	var patient_id = $('[name="patient_id"]').val();

	$.ajax({
		url: "check_unread.php",
		data: {
			patient_id: patient_id
		},
		method: "POST",
		dataType: "json",
		success: function (data) {
			status = parseInt(data.status);
			document.getElementById("unread_messages").innerHTML = status;
			if (status > 0) {
				var audio = new Audio('msg_received.mp3');
				audio.play();
			}


		}
	});
}

function updateMessages() {

	document.getElementById("myForm").style.display = "block";

	var patient_id = $('[name="patient_id"]').val();
	var doctor_id = $('[name="doctor_id"]').val();

	$.ajax({
		url: "update_read.php",
		data: {
			patient_id: patient_id,
			doctor_id: doctor_id
		},
		method: "POST",
		dataType: "json",
		success: function (data) {
			
			document.getElementById("unread_messages").innerHTML = 0;

		}
	});
}


$(document).ready(function () {

	$('#message_to_send').keydown(function () {

		var message = $("textarea").val();

		if (event.keyCode == 13) {

			$('#frm_send_msg').submit();

			$("textarea").val('');
			return false;
		}
	});

});


$(document).ready(function () {



	$('#action').val('Send');
	$('#send_action').val('Send');

	$(document).on('submit', '#frm_send_msg', function (event) {

		event.preventDefault();

		var form_data = $(this).serialize();

		$.ajax({
			url: "send_message.php",
			method: "POST",
			data: form_data,
			dataType: "json",
			success: function (data) {

				$('#frm_send_msg')[0].reset();
				getMessages(data)

			}
		});
	});
});


function getMessages(data) {
	var patient_id = $('[name="patient_id"]').val();
	
	$.ajax({
		url: "messages.php",
		type: "POST",
		dataType: "json",
		data: {
			patient_id: patient_id
		},
		success: function (data) {


			
			$('#sent_user').html(data.sent_user);
			var objDiv = document.getElementById("message_scrol");
			objDiv.scrollTop = objDiv.scrollHeight;
			//load(data)

		}
	});

}
$(document).ready(function() {
	$('#myTable').DataTable();
} );
$("#checkAll").change(function () {
	$("input:checkbox").prop('checked', $(this).prop("checked"));
});
	</script>
</body>
</html>