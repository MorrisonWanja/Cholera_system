<?php
include("../../nav/admin_includes.php");
$page_title = "Add Doctor";

include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../add-doctor/"> <em>Add Doctor</em></a></li>
			</ol>
<form method="post" id="register_doctor_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Doctor name *</label>
		<input type="text" name="doctor_name" id="doctor_name" class="form-control" required />
		<span id="err_doc_name"></span>
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
		<label>Hospital *</label>
		<select id="hospital" name="hospital" class="form-control">
			<option value="">---Please select hospital---</option>
			<?php
			$hospitals = $hospital->selectHospitals();

			foreach($hospitals as $row) {
				extract($row);
			?>
			<option value="<?php echo $hospital_id; ?>"><?php echo $hospital_name; ?></option>
			<?php } ?>
			</select>
					   
		<span id="err_hospital"></span>
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
		<input type="hidden" name="add_doc_action" id="add_doc_action"/>
		<input type="submit" name="register_doctor" id="register_doctor" class="btn btn-sm btn-success btn-block" required value="Register Doctor"/>
	</div>
</form>

</div>

  </main>
  <!-- page-content" -->
</div>

<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>

<script  src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCPBqSTfQAmJphaAuuBNFf9iNAvpEmjuOc&amp;libraries=places'></script>
<script>
jQuery(document).ready(function ($) {
			$('#register_doctor_frm')[0].reset();
			$('#register_doctor').val('Add Doctor');
			$('#add_doc_action').val('Add Doctor');
		 
		 $(document).on('submit', '#register_doctor_frm', function(event){
		$('#err_doc_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
		$('#err_hospital').html("");
		$('#err_pass').html("");
		$('#err_cpass').html("");
				
		// disable button
		$("#register_doctor").prop("disabled", true);
		// add spinner to button
		$("#register_doctor").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding hospital..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"add_doctor.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_doc_name != '' || data.err_no != '' || data.err_mail != '' || data.err_hospital != '' || data.err_pass != '' || data.err_cpass != '') {
			
			 $('#err_doc_name').html(data.err_doc_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $('#err_hospital').html(data.err_hospital);
			 $('#err_pass').html(data.err_pass);
			 $('#err_cpass').html(data.err_cpass);
			 $("#register_doctor").html("Add Doctor");
			 $("#register_doctor").prop("disabled", false); 
			}
			else {
				$('#err_hospital').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#err_hospital').html("");
				$('#err_pass').html("");
				$('#err_cpass').html("");
				$('#alert_action').html(data.message);
				$("#register_doctor").html("Doctor added successfully!!");
				$("#register_doctor").prop("disabled", false); 
				$('#register_doctor_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		
		
		</script>
</body>
</html>
