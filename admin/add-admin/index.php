<?php
include("../../nav/admin_includes.php");
$page_title = "Add Admin";

include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../add-admin/"> <em>Add Admin</em></a></li>
			</ol>
<form method="post" id="add_admin_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Admin name *</label>
		<input type="text" name="admin_name" id="admin_name" class="form-control" required />
		<span id="err_admin_name"></span>
	</div>
	<div class="form-group">
		<label>Phone number *</label>
		<input type="text" name="phone_number" id="phone_number" class="form-control" required />
		<span id="err_no"></span>
	</div>
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
		<label>Confirm Passsword *</label>
		<input type="password" name="cpassword" id="cpassword" class="form-control" required  />
		<span id="err_cpass"></span>
	</div>
	<div class="form-group">
		<input type="hidden" name="add_admin_action" id="add_admin_action"/>
		<input type="submit" name="add_admin" id="add_admin" class="btn btn-sm btn-success btn-block" required value="Add Admin"/>
	</div>
</form>

</div>

  </main>
  <!-- page-content" -->
</div>

<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>

<script>
jQuery(document).ready(function ($) {
			$('#add_admin_frm')[0].reset();
			$('#add_admin').val('Add Admin');
			$('#add_admin_action').val('Add Admin');
		 
		 $(document).on('submit', '#add_admin_frm', function(event){
		$('#err_admin_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
		$('#err_pass').html("");
		$('#err_cpass').html("");
				
		// disable button
		$("#add_admin").prop("disabled", true);
		// add spinner to button
		$("#add_admin").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding admin..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"add_admin.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_admin_name != '' || data.err_no != '' || data.err_mail != '' || data.err_pass != '' || data.err_cpass != '') {
			
			 $('#err_admin_name').html(data.err_admin_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $('#err_pass').html(data.err_pass);
			 $('#err_cpass').html(data.err_cpass);
			 $("#add_admin").html("Add Admin");
			 $("#add_admin").prop("disabled", false); 
			}
			else {
				$('#err_admin_name').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#err_pass').html("");
				$('#err_cpass').html("");
				$('#alert_action').html(data.message);
				$("#add_admin").html("Admin added successfully!!");
				$("#add_admin").prop("disabled", false); 
				$('#add_admin_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		
		
		</script>
</body>
</html>
