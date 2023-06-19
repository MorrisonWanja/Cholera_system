<?php
include("../../nav/patient_includes.php");
$page_title = "Edit Daily Update";

include("../../nav/patient_head.php");
?>

<body>
<div class="container">
<h4>Edit Daily Update</h4>
<?php
$data_id = clean_text($_GET['data']);

$datas = $p_data->selectDataByID($data_id);

foreach($datas as $row) {
	extract($row);
	//$data_id1 = $data_id;
}
					
					?>
<form method="post" id="edit_data_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Temperature *</label>
		<input type="text" name="temperature" id="temperature" class="form-control" required value="<?php echo $temperature; ?>"/>
		<input type="hidden" name="data_id" id="data_id" class="form-control" required value="<?php echo $data_id; ?>"/>
		<span id="err_temp"></span>
	</div>
	<div>
		<div class="form-group col-sm-4">
			<label>Most common symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Fever"  name="symptoms[]" <?php if(strpos($symptoms,'Fever') !== false){ ?> checked <?php } ?>>Fever</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Dry cough" name="symptoms[]" <?php if(strpos($symptoms,'Dry cough') !== false){ ?> checked <?php } ?>>Dry cough</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Tiredness" name="symptoms[]" <?php if(strpos($symptoms,'Tiredness') !== false){ ?> checked <?php } ?>>Tiredness</label>
			</div>
		</div>
		<div class="form-group col-sm-4">
			<label>Less common symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Aches and pains" name="symptoms[]" <?php if(strpos($symptoms,'Aches and pains') !== false){ ?> checked <?php } ?>>Aches and pains</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Sore throat" name="symptoms[]" <?php if(strpos($symptoms,'Sore throat') !== false){ ?> checked <?php } ?>>Sore throat</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Diarrhoea" name="symptoms[]" <?php if(strpos($symptoms,'Diarrhoea') !== false){ ?> checked <?php } ?>>Diarrhoea</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Conjunctivitis" name="symptoms[]" <?php if(strpos($symptoms,'Conjunctivitis') !== false){ ?> checked <?php } ?>>Conjunctivitis</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Headache" name="symptoms[]" <?php if(strpos($symptoms,'Headache') !== false){ ?> checked <?php } ?>>Headache</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Loss of taste or smell" name="symptoms[]" <?php if(strpos($symptoms,'Loss of taste or smell') !== false){ ?> checked <?php } ?>>Loss of taste or smell</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="A rash on skin, or discolouration of fingers or toes" name="symptoms[]" <?php if(strpos($symptoms,'A rash on skin, or discolouration of fingers or toes') !== false){ ?> checked <?php } ?>>A rash on skin, or discolouration of fingers or toes</label>
			</div>
		</div>
		
		<div class="form-group col-sm-4">
			<label>Serious symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Difficulty breathing or shortness of breath" name="symptoms[]" <?php if(strpos($symptoms,'Difficulty breathing or shortness of breath') !== false){ ?> checked <?php } ?>>Difficulty breathing or shortness of breath</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Chest pain or pressure" name="symptoms[]" <?php if(strpos($symptoms,'Chest pain or pressure') !== false){ ?> checked <?php } ?>>Chest pain or pressure</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Loss of speech or movement" name="symptoms[]" <?php if(strpos($symptoms,'Loss of speech or movement') !== false){ ?> checked <?php } ?>>Loss of speech or movement</label>
			</div>
			
		</div>
	</div>
	<div class="form-group col-sm-12">
	  <label for="brief_desciption">Brief description of how you are feeling:</label>
	  <textarea class="form-control" rows="5" id="brief_desciption" name="brief_desciption"><?php echo $description; ?></textarea>
	  <span id="err_brief"></span>
	</div>
	
	<div class="form-group">
		<input type="hidden" name="edit_action" id="edit_action"/>
		<input type="submit" name="edit_data" id="edit_data" class="btn btn-sm btn-success btn-block" required value="Edit your data"/>
	</div>
</form>

<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script  src="../js/script.js"></script>
<script  src="../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>

<script>
jQuery(document).ready(function ($) {
			$('#edit_data_frm')[0].reset();
			$('#edit_data').val('Edit your data');
			$('#edit_action').val('Edit your data');
		 
		 $(document).on('submit', '#edit_data_frm', function(event){
		$('#err_temp').html("");
		$('#err_brief').html("");
				
		// disable button
		$("#edit_data").prop("disabled", true);
		// add spinner to button
		$("#edit_data").html(
		"<i class='fa fa-spinner fa-spin '></i> Submiting patient..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  alert(form_data);
		  $.ajax({
		   url:"edit_daily_update.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_temp != '' || data.err_brief != '') {
			
			 $('#err_temp').html(data.err_temp);
			 $('#err_brief').html(data.err_brief);
			 $("#edit_data").html("Edit your data");
			 $("#edit_data").prop("disabled", false); 
			}
			else {
				$('#err_temp').html("");
				$('#err_brief').html("");
				$('#alert_action').html(data.message);
				$("#edit_data").html("Edited successfully!!");
				$("#edit_data").prop("disabled", false); 
				$('#edit_data_frm')[0].reset();
				
			}
		   }
		  });  
		 });
		});
		</script>
</body>
</html>
