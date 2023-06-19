<?php
include("../../nav/admin_includes.php");
$page_title = "Add Patient";

include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../add-patient/"> <em>Add Patient</em></a></li>
			</ol>
<form method="post" id="register_patient_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Patient name *</label>
		<input type="text" name="patient_name" id="patient_name" class="form-control" required />
		<span id="err_pat_name"></span>
	</div>
	<div class="form-group">
		<label>Phone number *</label>
		<input type="text" name="phone_number" id="phone_number" class="form-control" required />
		<span id="err_no"></span>
	</div>
	<div class="form-group">
		<label>Email *</label>
		<input type="email" name="email" id="email" class="form-control" required/>
		<span id="err_mail"></span>
	</div>
	<div class="form-group">
		<label>County *</label>
		<select id="county" name="county" class="form-control">
			<option value="">---Please select county---</option>
			<option value="Baringo">Baringo</option>
			<option value="Bomet">Bomet</option>
			<option value="Bungoma">Bungoma</option>
			<option value="Busia">Busia</option>
			<option value="Elgeyo-Marakwet">Elgeyo-Marakwet</option>
			<option value="Embu">Embu</option>
			<option value="Garissa">Garissa</option>
			<option value="Homa Bay">Homa Bay</option>
			<option value="Isiolo">Isiolo</option>
			<option value="Kajiado">Kajiado</option>
			<option value="Kakamega">Kakamega</option>
			<option value="Kericho">Kericho</option>
			<option value="Kiambu">Kiambu</option>
			<option value="Kilifi">Kilifi</option>
			<option value="Kirinyaga">Kirinyaga</option>
			<option value="Kisii">Kisii</option>
			<option value="Kisumu">Kisumu</option>
			<option value="Kitui">Kitui</option>
			<option value="Kwale">Kwale</option>
			<option value="Laikipia">Laikipia</option>
			<option value="Lamu">Lamu</option>
			<option value="Machakos">Machakos</option>
			<option value="Makueni">Makueni</option>
			<option value="Mandera">Mandera</option>
			<option value="Marsabit">Marsabit</option>
			<option value="Meru">Meru</option>
			<option value="Migori">Migori</option>
			<option value="Mombasa">Mombasa</option>
			<option value="Muranga">Murang'a</option>
			<option value="Nairobi">Nairobi </option>
			<option value="Nakuru">Nakuru</option>
			<option value="Nandi">Nandi</option>
			<option value="Narok">Narok</option>
			<option value="Nyamira">Nyamira</option>
			<option value="Nyandarua">Nyandarua</option>
			<option value="Nyeri">Nyeri</option>
			<option value="Samburu">Samburu</option>
			<option value="Siaya">Siaya</option>
			<option value="Taita Taveta">Taita-Taveta</option>
			<option value="Tana River">Tana River</option>
			<option value="Tharaka-Nithi">Tharaka-Nithi</option>
			<option value="Trans Nzoia">Trans Nzoia</option>
			<option value="Turkana">Turkana</option>
			<option value="Uasin Gishu">Uasin Gishu</option>
			<option value="Vihiga">Vihiga</option>
			<option value="Wajir">Wajir</option>
			<option value="West Pokot">West Pokot</option>
			</select>
					   
		<span id="err_county"></span>
	</div>
	<div class="form-group">
		<label>Location *</label>
		<input type="text" name="location" id="location" class="form-control" required />
		<input type="hidden" name="latitude" id="latitude" class="form-control" required />
		<input type="hidden" name="longitude" id="longitude" class="form-control" required />
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
			<option value="<?php echo $doctor_id; ?>"><?php echo $doctor_name; ?></option>
			<?php } ?>
			</select>
					   
		<span id="err_doctor"></span>
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
		<input type="hidden" name="add_pat_action" id="add_pat_action"/>
		<input type="submit" name="register_patient" id="register_patient" class="btn btn-sm btn-success btn-block" required value="Register Patient"/>
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
			$('#register_patient_frm')[0].reset();
			$('#register_patient').val('Add Patient');
			$('#add_pat_action').val('Add Patient');
		 
		 $(document).on('submit', '#register_patient_frm', function(event){
		$('#err_pat_name').html("");
		$('#err_no').html("");
		$('#err_mail').html("");
		$('#err_county').html("");
		$('#err_loc').html("");
		$('#err_doctor').html("");
		$('#err_pass').html("");
		$('#err_cpass').html("");
				
		// disable button
		$("#register_patient").prop("disabled", true);
		// add spinner to button
		$("#register_patient").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding patient..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"add_patient.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_pat_name != '' || data.err_no != '' || data.err_mail != '' || data.err_county != '' || data.err_loc != '' || data.err_doctor != '' || data.err_pass != '' || data.err_cpass != '') {
			
			 $('#err_pat_name').html(data.err_pat_name);
			 $('#err_no').html(data.err_no);
			 $('#err_mail').html(data.err_mail);
			 $('#err_county').html(data.err_county);
			 $('#err_loc').html(data.err_loc);
			 $('#err_doctor').html(data.err_doctor);
			 $('#err_pass').html(data.err_pass);
			 $('#err_cpass').html(data.err_cpass);
			 $("#register_patient").html("Add Patient");
			 $("#register_patient").prop("disabled", false); 
			}
			else {
				$('#err_hospital').html("");
				$('#err_no').html("");
				$('#err_mail').html("");
				$('#err_county').html("");
				$('#err_loc').html("");
				$('#err_doctor').html("");
				$('#err_pass').html("");
				$('#err_cpass').html("");
				$('#alert_action').html(data.message);
				$("#register_patient").html("Patient added successfully!!");
				$("#register_patient").prop("disabled", false); 
				$('#register_patient_frm')[0].reset();
				
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
