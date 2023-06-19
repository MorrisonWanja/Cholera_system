<?php
include("../../nav/admin_includes.php");
$page_title = "Add Hospital";

include("../../nav/admin_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../add-hospital/"> <em>Add Hospital</em></a></li>
			</ol>
<form method="post" id="add_hospital_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Hospital name *</label>
		<input type="text" name="hospital_name" id="hospital_name" class="form-control" required />
		<span id="err_hos_name"></span>
	</div>
	<div class="form-group">
		<label>Catageory *</label>
		<select name="hospital_category" id="hospital_category" class="form-control" required > 
			<option value="">---Please select category--</option>
			<option value="LEVEL 1">LEVEL 1 – Community Facilities</option>
			<option value="LEVEL 2">LEVEL 2 – Health Dispensaries</option>
			<option value="LEVEL 3">LEVEL 3 – Health Centres</option>
			<option value="LEVEL 4">LEVEL 4 – County Hospitals</option>
			<option value="LEVEL 5">LEVEL 5 – County Referral Hospitals</option>
			<option value="LEVEL 6">LEVEL 6 – National Referral Hospitals</option>
		</select>
		<span id="err_cat_no"></span>
	</div>
	<div class="form-group">
		<label>Tel. number *</label>
		<input type="text" name="tel_number" id="tel_number" class="form-control" required />
		<span id="err_tel"></span>
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
		<input type="hidden" name="add_hos_action" id="add_hos_action"/>
		<input type="submit" name="add_hospital" id="add_hospital" class="btn btn-sm btn-success btn-block" required value="Add Hospital"/>
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
			$('#add_hospital_frm')[0].reset();
			$('#add_hospital').val('Add Hospital');
			$('#add_hos_action').val('Add Hospital');
		 
		 $(document).on('submit', '#add_hospital_frm', function(event){
		$('#err_hos_name').html("");
		$('#err_cat_no').html("");
		$('#err_tel').html("");
		$('#err_county').html("");
		$('#err_loc').html("");
				
		// disable button
		$("#add_hospital").prop("disabled", true);
		// add spinner to button
		$("#add_hospital").html(
		"<i class='fa fa-spinner fa-spin '></i> Adding hospital..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"add_hospital.php",
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
			 $("#add_hospital").html("Add Hospital");
			 $("#add_hospital").prop("disabled", false); 
			}
			else {
				$('#err_county').html("");
				$('#err_cat_no').html("");
				$('#err_tel').html("");
				$('#err_county').html("");
				$('#err_loc').html("");
				$('#alert_action').html(data.message);
				$("#add_hospital").html("Hospital added successfully!!");
				$("#add_hospital").prop("disabled", false); 
				$('#add_hospital_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		$(document).ready(function() {
			$('#myTable').DataTable();
		} );
		$("#checkAll").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
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
