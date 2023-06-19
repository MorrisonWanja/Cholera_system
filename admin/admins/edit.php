<?php
include("../../nav/admin_includes.php");
$page_title = "Edit Admin";
$admin_id = clean_text($_GET['admin']);
include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li><a href="../admins/">Admins</a></li>
				<li class="current"><a href="edit.php?admin=<?php echo $admin_id ; ?>"> <em>Edit Admin</em></a></li>
			</ol>
<form method="post" id="edit_admin_frm" autocomplete="off">

<?php


$admins = $admin->selectAdminByID($admin_id);

foreach($admins as $row) {
	extract($row);
}
					
					?>
<span id="alert_action"></span>
	<div class="form-group">
		<label>Doctor name *</label>
		<input type="hidden" name="admin_id" id="admin_id" class="form-control" required  value="<?php echo $admin_id; ?>"/>
		<input type="text" name="admin_name" id="admin_name" class="form-control" required value="<?php echo $admin_name; ?>"/>
		<span id="err_admin_name"></span>
	</div>
	<div class="form-group">
		<label>Phone number *</label>
		<input type="text" name="phone_number" id="phone_number" class="form-control" required value="<?php echo $phone_number; ?>"/>
		<span id="err_no"></span>
	</div>
	<div class="form-group">
		<label>Email *</label>
		<input type="email" name="email" id="email" class="form-control" required value="<?php echo $email; ?>"/>
		<span id="err_mail"></span>
	</div>
	
	<div class="form-group">
		<input type="hidden" name="edit_admin_action" id="edit_admin_action"/>
		<input type="submit" name="edit_admin" id="edit_admin" class="btn btn-sm btn-success btn-block" required value="Edit Admin"/>
	</div>
</form>

<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>

<script>
jQuery(document).ready(function ($) {
			$('#edit_admin_frm')[0].reset();
			$('#edit_admin').val('Edit Admin');
			$('#edit_admin_action').val('Edit Admin');
		 
		 $(document).on('submit', '#edit_admin_frm', function(event){
		$('#err_admin_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
				
		// disable button
		$("#edit_admin").prop("disabled", true);
		// add spinner to button
		$("#edit_admin").html(
		"<i class='fa fa-spinner fa-spin '></i> Editing admin..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"edit_admin.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   alert('form_data');
			if(data.err_admin_name != '' || data.err_no != '' || data.err_mail != '') {
			
			 $('#err_admin_name').html(data.err_admin_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $("#edit_admin").html("Edit Admin");
			 $("#edit_admin").prop("disabled", false); 
			}
			else {
				$('#err_admin_name').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#alert_action').html(data.message);
				$("#edit_admin").html("Admin edited successfully!!");
				$("#edit_admin").prop("disabled", false); 
				$('#edit_admin_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		</script>
</body>
</html>
