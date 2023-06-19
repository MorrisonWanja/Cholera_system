<?php
   include("../../nav/doctor_includes.php");
   $page_title = "Chat";
   
   include("../../nav/doctor_head.php");
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
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li><a href="../messages/">New Messages</a></li>
				<li class="current"><a href="../messages/"> <em>Chat</em></a></li>
			</ol>
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
                        <input type="hidden" name="sender" id="sender" value="Doctor"/>
                        <input type="hidden" name="patient_id" id="patient_id" value="<?php echo clean_text($_GET['patient']); ?>"/>
                        <input type="hidden" name="doctor_id" id="doctor_id" value="<?php echo $doctor_id; ?>"/>
                        <textarea name="message_to_send" id="message_to_send" placeholder ="Type your message" rows="3"class="form-control"></textarea>
                        <input type="hidden" name="send_action" id="send_action"/>
                        <input type="hidden" name="action" id="action" value="Send">
                     </form>
                  </div>
               </div>
            </div>
     </div>

  </main>
  <!-- page-content" -->
</div>   
	<script src='../../js/jquery.min.js'></script>
	<script src='../../js/bootstrap.min.js'></script>
	<script  src="../../js/script.js"></script>
	<script  src="../../js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
   <script>
   

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
			//document.getElementById("unread_messages").innerHTML = status;
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

	document.getElementById("sent_user").style.display = "none";
	document.getElementById("chat_footer").style.display = "none";

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
//alert(data.sent_user);
			if (data.sent_user == "") {
				document.getElementById("sent_user").style.display = "none";
				document.getElementById("chat_footer").style.display = "none";
			} else {

				document.getElementById("sent_user").style.display = "block";
				document.getElementById("chat_footer").style.display = "block";
			}
			$('#sent_user').html(data.sent_user);
			var objDiv = document.getElementById("message_scrol");
			objDiv.scrollTop = objDiv.scrollHeight;
			updateMessages()
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