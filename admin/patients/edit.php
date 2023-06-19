<?php
include("../../nav/admin_includes.php");
$page_title = "Edit Patient";
$patient_id = clean_text($_GET['patient']);
include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li><a href="../patients/">Patients</a></li>
				<li class="current"><a href="edit.php?patient=<?php echo $patient_id ; ?>"> <em>Edit Patient</em></a></li>
			</ol>
<form method="post" id="edit_patient_frm" autocomplete="off">

<?php
$patient_id = clean_text($_GET['patient']);

$patients = $patient->selectPatientByID($patient_id);

foreach($patients as $row) {
	extract($row);
	$doctor_id1 = $doctor_id;
}
					
					?>
<span id="alert_action"></span>

	<div class="form-group">
		<label>Patient name *</label>
		<input type="hidden" name="patient_id" id="patient_id" class="form-control" required  value="<?php echo $patient_id; ?>"/>
		<input type="text" name="patient_name" id="patient_name" class="form-control" required value="<?php echo $patient_name; ?>"/>
		<span id="err_pat_name"></span>
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
		<label>County *</label>
		<select id="county" name="county" class="form-control">
			<option value="">---Please select county---</option>
		   <option value="Baringo" <?php if($county== 'Baringo'){ ?> selected <?php } ?>>Baringo</option>
		   <option value="Bomet" <?php if($county== 'Bomet'){ ?> selected <?php } ?>>Bomet</option>
		   <option value="Bungoma" <?php if($county== 'Bungoma'){ ?> selected <?php } ?>>Bungoma</option>
		   <option value="Busia" <?php if($county== 'Busia'){ ?> selected <?php } ?>>Busia</option>
		   <option value="Elgeyo-Marakwet" <?php if($county== 'Elgeyo-Marakwet'){ ?> selected <?php } ?>>Elgeyo-Marakwet</option>
		   <option value="Embu" <?php if($county== 'Embu'){ ?> selected <?php } ?>>Embu</option>
		   <option value="Garissa" <?php if($county== 'Garissa'){ ?> selected <?php } ?>>Garissa</option>
		   <option value="Homa Bay" <?php if($county== 'Homa Bay'){ ?> selected <?php } ?>>Homa Bay</option>
		   <option value="Isiolo" <?php if($county== 'Isiolo'){ ?> selected <?php } ?>>Isiolo</option>
		   <option value="Kajiado" <?php if($county== 'Kajiado'){ ?> selected <?php } ?>>Kajiado</option>
		   <option value="Kakamega" <?php if($county== 'Kakamega'){ ?> selected <?php } ?>>Kakamega</option>
		   <option value="Kericho" <?php if($county== 'Kericho'){ ?> selected <?php } ?>>Kericho</option>
		   <option value="Kiambu" <?php if($county== 'Kiambu'){ ?> selected <?php } ?>>Kiambu</option>
		   <option value="Kilifi" <?php if($county== 'Kilifi'){ ?> selected <?php } ?>>Kilifi</option>
		   <option value="Kirinyaga" <?php if($county== 'Kirinyaga'){ ?> selected <?php } ?>>Kirinyaga</option>
		   <option value="Kisii" <?php if($county== 'Kisii'){ ?> selected <?php } ?>>Kisii</option>
		   <option value="Kisumu" <?php if($county== 'Kisumu'){ ?> selected <?php } ?>>Kisumu</option>
		   <option value="Kitui" <?php if($county== 'Kitui'){ ?> selected <?php } ?>>Kitui</option>
		   <option value="Kwale" <?php if($county== 'Kwale'){ ?> selected <?php } ?>>Kwale</option>
		   <option value="Laikipia" <?php if($county== 'Laikipia'){ ?> selected <?php } ?>>Laikipia</option>
		   <option value="Lamu" <?php if($county== 'Lamu'){ ?> selected <?php } ?>>Lamu</option>
		   <option value="Machakos" <?php if($county== 'Machakos'){ ?> selected <?php } ?>>Machakos</option>
		   <option value="Makueni" <?php if($county== 'Makueni'){ ?> selected <?php } ?>>Makueni</option>
		   <option value="Mandera" <?php if($county== 'Mandera'){ ?> selected <?php } ?>>Mandera</option>
		   <option value="Marsabit" <?php if($county== 'Marsabit'){ ?> selected <?php } ?>>Marsabit</option>
		   <option value="Meru" <?php if($county== 'Meru'){ ?> selected <?php } ?>>Meru</option>
		   <option value="Migori" <?php if($county== 'Migori'){ ?> selected <?php } ?>>Migori</option>
		   <option value="Mombasa" <?php if($county== 'Mombasa'){ ?> selected <?php } ?>>Mombasa</option>
		   <option value="Muranga" <?php if($county== 'Muranga'){ ?> selected <?php } ?>>Murang'a</option>
		   <option value="Nairobi" <?php if($county== 'Nairobi'){ ?> selected <?php } ?>>Nairobi </option>
		   <option value="Nakuru" <?php if($county== 'Nakuru'){ ?> selected <?php } ?>>Nakuru</option>
		   <option value="Nandi" <?php if($county== 'Nandi'){ ?> selected <?php } ?>>Nandi</option>
		   <option value="Narok" <?php if($county== 'Narok'){ ?> selected <?php } ?>>Narok</option>
		   <option value="Nyamira" <?php if($county== 'Nyamira'){ ?> selected <?php } ?>>Nyamira</option>
		   <option value="Nyandarua" <?php if($county== 'Nyandarua'){ ?> selected <?php } ?>>Nyandarua</option>
		   <option value="Nyeri" <?php if($county== 'Nyeri'){ ?> selected <?php } ?>>Nyeri</option>
		   <option value="Samburu" <?php if($county== 'Samburu'){ ?> selected <?php } ?>>Samburu</option>
		   <option value="Siaya" <?php if($county== 'Siaya'){ ?> selected <?php } ?>>Siaya</option>
		   <option value="Taita Taveta" <?php if($county== 'Taita Taveta'){ ?> selected <?php } ?>>Taita-Taveta</option>
		   <option value="Tana River" <?php if($county== 'Tana River'){ ?> selected <?php } ?>>Tana River</option>
		   <option value="Tharaka-Nithi" <?php if($county== 'Tharaka-Nithi'){ ?> selected <?php } ?>>Tharaka-Nithi</option>
		   <option value="Trans Nzoia" <?php if($county== 'Trans Nzoia'){ ?> selected <?php } ?>>Trans Nzoia</option>
		   <option value="Turkana" <?php if($county== 'Turkana'){ ?> selected <?php } ?>>Turkana</option>
		   <option value="Uasin Gishu" <?php if($county== 'Uasin Gishu'){ ?> selected <?php } ?>>Uasin Gishu</option>
		   <option value="Vihiga" <?php if($county== 'Vihiga'){ ?> selected <?php } ?>>Vihiga</option>
		   <option value="Wajir" <?php if($county== 'Wajir'){ ?> selected <?php } ?>>Wajir</option>
		   <option value="West Pokot" <?php if($county== 'West Pokot'){ ?> selected <?php } ?>>West Pokot</option>
			</select>
					   
		<span id="err_county"></span>
	</div>
	<div class="form-group">
		<label>Location *</label>
		<input type="text" name="location" id="location" class="form-control" required value="<?php echo $location; ?>"/>
		<input type="hidden" name="latitude" id="latitude" class="form-control" required value="<?php echo $latitude; ?>"/>
		<input type="hidden" name="longitude" id="longitude" class="form-control" required value="<?php echo $longitude; ?>"/>
		<span id="err_loc"></span>
	</div>
	<div class="form-group">
		<label>Doctor *</label>
		<select id="doctor" name="doctor" class="form-control">
			<option value="">---Please select doctor---</option>
			<?php
			$doctors = $doctor->selectDoctorsByLocaction();

			foreach($doctors as $row) {
				extract($row);
			?>
			<option value="<?php echo $doctor_id; ?>" <?php if( $doctor_id == $doctor_id1){ ?> selected <?php } ?>><?php echo $doctor_name; ?></option>
			<?php } ?>
			</select>
					   
		<span id="err_doctor"></span>
	</div>

	<div class="form-group">
		<input type="hidden" name="edit_pat_action" id="edit_pat_action"/>
		<input type="submit" name="edit_patient" id="edit_patient" class="btn btn-sm btn-success btn-block" required value="Edit Patient"/>
	</div>
</form>

<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>
<script  src="../../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script  src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCPBqSTfQAmJphaAuuBNFf9iNAvpEmjuOc&amp;libraries=places'></script>
<script>
jQuery(document).ready(function ($) {
			$('#edit_patient_frm')[0].reset();
			$('#edit_patient').val('Edit Patient');
			$('#edit_pat_action').val('Edit Patient');
		 
		 $(document).on('submit', '#edit_patient_frm', function(event){
		$('#err_pat_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
		$('#err_county').html("");
		$('#err_loc').html("");
		$('#err_doctor').html("");
		$('#err_pass').html("");
		$('#err_cpass').html("");
				
		// disable button
		$("#edit_patient").prop("disabled", true);
		// add spinner to button
		$("#edit_patient").html(
		"<i class='fa fa-spinner fa-spin '></i> Editing patient..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"edit_patient.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_pat_name != '' || data.err_no != '' || data.err_mail != '' || data.err_county != '' || data.err_loc != '' || data.err_doctor != '') {
			
			 $('#err_pat_name').html(data.err_pat_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $('#err_county').html(data.err_county);
			 $('#err_loc').html(data.err_loc);
			 $('#err_doctor').html(data.err_doctor);
			 $('#err_pass').html(data.err_pass);
			 $('#err_cpass').html(data.err_cpass);
			 $("#edit_patient").html("Edit Patient");
			 $("#edit_patient").prop("disabled", false); 
			}
			else {
				$('#err_hospital').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#err_county').html("");
				$('#err_loc').html("");
				$('#err_doctor').html("");
				$('#alert_action').html(data.message);
				$("#edit_patient").html("Patient edited successfully!!");
				$("#edit_patient").prop("disabled", false); 
				$('#edit_patient_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('location'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
				document.getElementById('latitude').value = latitude;
				document.getElementById('longitude').value = longitude;
               
            });
        });
		</script>
</body>
</html>
