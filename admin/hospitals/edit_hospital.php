<?php
include("../../nav/admin_includes.php");

if(isset($_POST["edit_hos_action"])) {

  $message = '';
  $err_hos_name = '';
  $err_cat_no = '';
  $err_tel = '';
  $err_county = '';
  $err_loc = '';
  $fullname = '';
  $email = '';
  $no = '';
  $password = '';
  $cpassword = '';
  
  if(empty($_POST["hospital_name"])) {
   
		$err_hos_name .= '<p class="text-danger">Hospital name is required</p>';
		
		} else {
			
		$hospital_name = clean_text($_POST["hospital_name"]);
			
	}
	  
	if(empty($_POST["hospital_category"])) { 

		$err_cat_no .= '<p class="text-danger">Hostpital category required</p>';

	} else {
		
		$hospital_category = clean_text($_POST["hospital_category"]);
		
	 
	}
	
  if (strlen($_POST["tel_number"]) >= '8') {
		
		if(empty($_POST["tel_number"])){
		   
			$err_tel .= '<p class="text-danger">Tel. number is required</p>';
		  
		}
		else {
				
			$tel_number = clean_text($_POST["tel_number"]);	
		
		}
	} else {
			 
		$err_tel .= '<p class="text-danger">Incorrect phone number!</p>';
		
	}
  
	if(empty($_POST["county"])) {
	  
		$err_county .= '<p class="text-danger">County address is required</p>';
		
		} else {
		  
			$county = clean_text($_POST["county"]);
	   
		
	}
	
	if(empty($_POST["location"])) {
	  
		$err_loc .= '<p class="text-danger">Location is required</p>';
		
		} else {
		  
			$location = clean_text($_POST["location"]);
	   
		
	}
  
  $hospital_id = clean_text($_POST["hospital_id"]);
  
  if($err_hos_name == '' && $err_county == ''  && $err_tel == ''  && $err_cat_no == ''  && $err_loc == '') {
	  
	
   if($_POST["edit_hos_action"] == "Edit Hospital") {

		$latitude = clean_text($_POST["latitude"]);
		$longitude = clean_text($_POST["longitude"]);

		
		$hospital->editHospital($hospital_id,$hospital_name,$hospital_category,$tel_number,$county,$location,$latitude,$longitude);
	
		$message = '<div class="alert alert-warning">Hospital edited successfully</div>';

	   
		$data = array(
			'err_tel'   => $err_tel,
			'err_county'   => $err_county,
			'err_cat_no'   => $err_cat_no,
			'err_loc'   => $err_loc,
			'err_hos_name'   => $err_hos_name,
			'message'  => $message
		);
   }
   
  } else {
	  
   $data = array(
	'err_tel'   => $err_tel,
	'err_county'   => $err_county,
	'err_cat_no'   => $err_cat_no,
	'err_loc'   => $err_loc,
	'err_hos_name'   => $err_hos_name,
	'message'  => $message
   );
   
  }
 echo json_encode($data);
}

?>