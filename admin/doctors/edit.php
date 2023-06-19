<?php
include("../../nav/admin_includes.php");
$page_title = "Edit Doctor";
$doctor_id = clean_text($_GET['doctor']);
include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li><a href="../doctors/">Doctors</a></li>
				<li class="current"><a href="edit.php?doctor=<?php echo $doctor_id ; ?>"> <em>Edit Doctor</em></a></li>
			</ol>
<form method="post" id="edit_doctor_frm" autocomplete="off">

<?php


$doctors = $doctor->selectDoctorByID($doctor_id);

foreach($doctors as $row) {
	extract($row);
	$hospital_id1 = $hospital_id;
}
					
					?>
<span id="alert_action"></span>
	<div class="form-group">
		<label>Doctor name *</label>
		<input type="hidden" name="doctor_id" id="doctor_id" class="form-control" required  value="<?php echo $doctor_id; ?>"/>
		<input type="text" name="doctor_name" id="doctor_name" class="form-control" required value="<?php echo $doctor_name; ?>"/>
		<span id="err_doc_name"></span>
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
		<label>Hospital *</label>
		<select id="hospital" name="hospital" class="form-control">
			<option value="">---Please select hospital---</option>
			<?php
			$hospitals = $hospital->selectHospitals();

			foreach($hospitals as $row) {
				extract($row);
			?>
			<option value="<?php echo $hospital_id; ?>" <?php if( $hospital_id == $hospital_id1){ ?> selected <?php } ?>><?php echo $hospital_name; ?></option>
			<?php } ?>
			</select>
					   
		<span id="err_hospital"></span>
	</div>
	<div class="form-group">
		<input type="hidden" name="edit_doc_action" id="edit_doc_action"/>
		<input type="submit" name="edit_doctor" id="edit_doctor" class="btn btn-sm btn-success btn-block" required value="Edit Docctor"/>
	</div>
</form>

<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>

<script>
jQuery(document).ready(function ($) {
			$('#edit_doctor_frm')[0].reset();
			$('#edit_doctor').val('Edit Doctor');
			$('#edit_doc_action').val('Edit Doctor');
		 
		 $(document).on('submit', '#edit_doctor_frm', function(event){
		$('#err_doc_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
		$('#err_hospital').html("");
		$('#err_pass').html("");
		$('#err_cpass').html("");
				
		// disable button
		$("#edit_doctor").prop("disabled", true);
		// add spinner to button
		$("#edit_doctor").html(
		"<i class='fa fa-spinner fa-spin '></i> Editing hospital..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  $.ajax({
		   url:"edit_doctor.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   // || data.err_pass != '' || data.err_cpass != '
			if(data.err_doc_name != '' || data.err_no != '' || data.err_mail != '' || data.err_hospital != '') {
			
			 $('#err_doc_name').html(data.err_doc_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $('#err_hospital').html(data.err_hospital);
			 /*$('#err_pass').html(data.err_pass);
			 $('#err_cpass').html(data.err_cpass);*/
			 $("#edit_doctor").html("Edit Doctor");
			 $("#edit_doctor").prop("disabled", false); 
			}
			else {
				$('#err_hospital').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#err_hospital').html("");
				/*$('#err_pass').html("");
				$('#err_cpass').html("");*/
				$('#alert_action').html(data.message);
				$("#edit_doctor").html("Doctor edited successfully!!");
				$("#edit_doctor").prop("disabled", false); 
				$('#edit_doctor_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		</script>
</body>
</html>
