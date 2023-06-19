<?php
include("../../nav/admin_includes.php");
$page_title = "Edit Hospital";
$hospital_id = clean_text($_GET['hospital']);
include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li><a href="../hospitals/">Hospitals</a></li>
				<li class="current"><a href="edit.php?hospital=<?php echo $hospital_id ; ?>"> <em>Edit Hospital</em></a></li>
			</ol>
<form method="post" id="edit_hospital_frm" autocomplete="off">
<?php


$hospitals = $hospital->selectHospitalByID($hospital_id);

foreach($hospitals as $row) {
	extract($row);
}
					
					?>
<span id="alert_action"></span>
	<div class="form-group">
		<label>Hospital name *</label>
		<input type="hidden" name="hospital_id" id="hospital_id" class="form-control" required  value="<?php echo $hospital_id; ?>"/>
		<input type="text" name="hospital_name" id="hospital_name" class="form-control" required  value="<?php echo $hospital_name; ?>"/>
		<span id="err_hos_name"></span>
	</div>
	<div class="form-group">
		<label>Catageory *</label>
		<select name="hospital_category" id="hospital_category" class="form-control" required > 
			<option value="">---Please select category--</option>
			<option value="LEVEL 1"<?php if( $hospital_category == 'LEVEL 1'){ ?> selected <?php } ?>>LEVEL 1 – Community Facilities</option>
			<option value="LEVEL 2"<?php if( $hospital_category == 'LEVEL 2'){ ?> selected <?php } ?>>LEVEL 2 – Health Dispensaries</option>
			<option value="LEVEL 3"<?php if( $hospital_category == 'LEVEL 3'){ ?> selected <?php } ?>>LEVEL 3 – Health Centres</option>
			<option value="LEVEL 4"<?php if( $hospital_category == 'LEVEL 4'){ ?> selected <?php } ?>>LEVEL 4 – County Hospitals</option>
			<option value="LEVEL 5"<?php if( $hospital_category == 'LEVEL 5'){ ?> selected <?php } ?>>LEVEL 5 – County Referral Hospitals</option>
			<option value="LEVEL 6"<?php if( $hospital_category == 'LEVEL 6'){ ?> selected <?php } ?>>LEVEL 6 – National Referral Hospitals</option>
		</select>
		<span id="err_cat_no"></span>
	</div>
	<div class="form-group">
		<label>Tel. number *</label>
		<input type="text" name="tel_number" id="tel_number" class="form-control" required value="<?php echo $tel_number; ?>"/>
		<span id="err_tel"></span>
	</div>
	<div class="form-group">
		<label>County *</label>
		<select name="county" id="county" class="form-control" required  value="<?php echo $county; ?>"/>
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
		<input type="text" name="location" id="location" class="form-control" required  value="<?php echo $location; ?>"/>
		<input type="hidden" name="latitude" id="latitude" class="form-control" required value="<?php echo $latitude; ?>"/>
		<input type="hidden" name="longitude" id="longitude" class="form-control" required value="<?php echo $longitude; ?>"/>
		<span id="err_loc"></span>
	</div>
	<div class="form-group">
		<input type="hidden" name="edit_hos_action" id="edit_hos_action"/>
		<input type="submit" name="edit_hospital" id="edit_hospital" class="btn btn-sm btn-success btn-block" required value="Edit Hospital"/>
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
			$('#edit_hospital_frm')[0].reset();
			$('#edit_hospital').val('Edit Hospital');
			$('#edit_hos_action').val('Edit Hospital');
		 
		 $(document).on('submit', '#edit_hospital_frm', function(event){
		$('#err_hos_name').html("");
		$('#err_cat_no').html("");
		$('#err_tel').html("");
		$('#err_county').html("");
		$('#err_loc').html("");
				
		// disable button
		$("#edit_hospital").prop("disabled", true);
		// Edit spinner to button
		$("#edit_hospital").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding hospital..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"edit_hospital.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_hos_name != '' || data.err_cat_no != '' || data.err_tel != '' || data.err_county != '' || data.err_loc != '') {
			
			 $('#err_hos_name').html(data.err_hos_name);
			 $('#err_cat_no').html(data.err_cat_no);
			 $('#err_tel').html(data.err_tel);
			 $('#err_county').html(data.err_county);
			 $('#err_loc').html(data.err_loc);
			 $("#edit_hospital").html("Edit Hospital");
			 $("#edit_hospital").prop("disabled", false); 
			}
			else {
				$('#err_county').html("");
				$('#err_cat_no').html("");
				$('#err_tel').html("");
				$('#err_county').html("");
				$('#err_loc').html("");
				$('#alert_action').html(data.message);
				$("#edit_hospital").html("Hospital added successfully!!");
				$("#edit_hospital").prop("disabled", false); 
				$('#edit_hospital_frm')[0].reset();
				
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
