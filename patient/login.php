<?php

$page_title = "Patient Logn";

include("../nav/head_1.php");
?>
<style>
@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 60%;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}


.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
    <form method="post" id="frm_login" autocomplete="off">
	<span id="alert_action"></span>
      <input type="email" name="email" id="email" class="form-control" required />
		<span id="err_mail"></span>
      <input type="password" name="password" id="password" class="form-control" required />
		<span id="err_pass"></span>
      <input type="hidden" name="login_action" id="login_action"/>
		<input type="submit" name="login" id="login" class="btn btn-sm btn-success btn-block" required value="Login"/>
     
    </form>
  </div>
</div>


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
		"<i class='fa fa-spinner fa-spin '></i> Login doctor..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"chat/login.php",
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
			if(data.message == '') {
				$('#err_mail').html();
				$('#err_pass').html();
				
				
				$("#login").html("Login successfully!!");
				$("#login").prop("disabled", false); 
				$('#frm_login')[0].reset();
				window.location="../patient/chat/";
			} else {
				$("#login").prop("disabled", false); 
				$('#alert_action').html(data.message);
			}
		   }
		  });  
		 });
		});
		
		
		</script>
</body>
</html>
