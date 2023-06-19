<?php

$page_title = "Doctor Logn";

include("../nav/head_1.php");
?>

<body>

<main class="page-content" style="">
    <div class="container" >

<form method="post" id="frm_login" autocomplete="off">
<span id="alert_action"></span>
	
	<div class="form-group">
		<label>Email *</label>
		<input type="email" name="email" id="email" class="form-control" required />
		<span id="err_mail"></span>
	</div>
	
	<div class="form-group">
		<label>Passsword *</label>
		<input type="password" name="password" id="password" class="form-control" required />
		<span id="err_pass"></span>
	</div>
	
	<div class="form-group">
		<input type="hidden" name="login_action" id="login_action"/>
		<input type="submit" name="login" id="login" class="btn btn-sm btn-success btn-block" required value="Login"/>
	</div>
</form>

</div>

  </main>
  <!-- page-content" -->
</div>

<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>

<script>
jQuery(document).ready(function ($) {
			$('#frm_login')[0].reset();
			$('#login').val('Login');
			$('#login_action').val('Login');
		 
		 $(document).on('submit', '#frm_login', function(event){
			 
		$('#err_mail').html("");
		$('#err_pass').html("");
				
		// disable button
		$("#login").prop("disabled", true);
		// add spinner to button
		$("#login").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding admin..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"add-patient/login.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_mail != '' || data.err_pass != '') {
			
			 
			 $('#err_mail').html(data.err_mail);
			 $('#err_pass').html(data.err_pass);
			 
			 $("#login").html("Login");
			 $("#login").prop("disabled", false); 
			}
			else {
				$('#err_mail').html();
				$('#err_pass').html();
			 
				$('#alert_action').html(data.message);
				
				$("#login").html("Login successfully!!");
				$("#login").prop("disabled", false); 
				$('#frm_login')[0].reset();
				window.location="../doctor/";
			}
		   }
		  });  
		 });
		});
		
		
		</script>
</body>
</html>
