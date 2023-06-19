<?php
include("../../nav/patient_includes.php");
$page_title = "Daily Updates";

include("../../nav/patient_head.php");
?>

<body>
<div class="container" >
<h4><?php echo $page_title; ?></h4>
<form method="post" id="submit_data_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Temperature *</label>
		<input type="text" name="temperature" id="temperature" class="form-control" required value=""/>
		<span id="err_temp"></span>
	</div>
	<div>
		<div class="form-group col-sm-4">
			<label>Most common symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Fever"  name="symptoms[]">Fever</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Dry cough" name="symptoms[]">Dry cough</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Tiredness" name="symptoms[]">Tiredness</label>
			</div>
		</div>
		<div class="form-group col-sm-4">
			<label>Less common symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Aches and pains" name="symptoms[]">Aches and pains</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Sore throat" name="symptoms[]">Sore throat</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Diarrhoea" name="symptoms[]">Diarrhoea</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Conjunctivitis" name="symptoms[]">Conjunctivitis</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Headache" name="symptoms[]">Headache</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Loss of taste or smell" name="symptoms[]">Loss of taste or smell</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="A rash on skin, or discolouration of fingers or toes" name="symptoms[]">A rash on skin, or discolouration of fingers or toes</label>
			</div>
		</div>
		
		<div class="form-group col-sm-4">
			<label>Serious symptoms:</label>
			<div class="checkbox">
			  <label><input type="checkbox" value="Difficulty breathing or shortness of breath" name="symptoms[]">Difficulty breathing or shortness of breath</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Chest pain or pressure" name="symptoms[]">Chest pain or pressure</label>
			</div>
			<div class="checkbox success">
			  <label><input type="checkbox" value="Loss of speech or movement" name="symptoms[]">Loss of speech or movement</label>
			</div>
			
		</div>
	</div>
	<div class="form-group col-sm-12">
	  <label for="brief_desciption">Brief description of how you are feeling:</label>
	  <textarea class="form-control" rows="5" id="brief_desciption" name="brief_desciption"></textarea>
	  <span id="err_brief"></span>
	</div>
	
	<div class="form-group">
		<input type="hidden" name="submit_action" id="submit_action"/>
		<input type="submit" name="submit_data" id="submit_data" class="btn btn-sm btn-success btn-block" required value="Submit your data"/>
	</div>
</form>
<h4>Patients' Daily Updates</h4>
<form action="delete.php" method="post" >
<div class="table-responsive">
	<table class="table table-striped dt-responsive nowrap" id="myTable">
		<thead>
			<tr class="success">
				<th>#</th>
				<th>
				<div class="checkbox check-success">
					<label for="checkAll" ><input type=	"checkbox" name="rememberme" id="checkAll" style="margin-top:20px;"></label>
				</div>
				</th>
				<th>Temperature</th>
				<th>Description</th>
				<th>Symptoms</th>
				<th>Patient Name</th>
				<th>Date Update</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$datas = $p_data->selectData();
		$count = 0;
		foreach($datas as $row) {
			$count++;
			extract($row);
		?>
			<tr>
				
				<td>
					<a href="edit.php?data=<?php echo $data_id; ?>" title="delete" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to edit?')"><i class="fa fa-edit"></i></a>
				</td>
				<td>
				<div class="checkbox check-success" style="margin-top:-1px;">
					<label for="checkAll<?php echo $data_id; ?>"><input type="checkbox" name="data[]" value="<?php echo $data_id; ?>" id="checkAll<?php echo $data_id; ?>"></label>
				</div> 
				</td>
				
				<td><?php echo $temperature; ?></td>
				<td><?php echo $description; ?></td>
				<td><?php echo $symptoms; ?></td>
				<td><?php echo $patient_name; ?></td>
				<td><?php echo $date_updated; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>
<input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>	
							<!--<input type="submit" name="action" class="btn btn-sm btn-primary" value="Decline" onclick="return confirm('Are you sure you want to decline?')"/>
							<input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm(' Are you sure you want to delete?')"/>-->
							
							</form>

</div>
</div>
<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>
<script  src="../../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>

<script>
jQuery(document).ready(function ($) {
			$('#submit_data_frm')[0].reset();
			$('#submit_data').val('Submit your data');
			$('#submit_action').val('Submit your data');
		 
		 $(document).on('submit', '#submit_data_frm', function(event){
		$('#err_temp').html("");
		$('#err_brief').html("");
				
		// disable button
		$("#submit_data").prop("disabled", true);
		// add spinner to button
		$("#submit_data").html(
		"<i class='fa fa-spinner fa-spin '></i> Submiting patient..."
		);


		  event.preventDefault();
		  
		  var form_data = $(this).serialize();
		  
		  $.ajax({
		   url:"submit_daily_update.php",
		   method:"POST",
		   data:form_data,
		   dataType:"json",
		   success:function(data) { 
		   
			if(data.err_temp != '' || data.err_brief != '') {
			
			 $('#err_temp').html(data.err_temp);
			 $('#err_brief').html(data.err_brief);
			 $("#submit_data").html("Submit your data");
			 $("#submit_data").prop("disabled", false); 
			}
			else {
				$('#err_temp').html("");
				$('#err_brief').html("");
				$('#alert_action').html(data.message);
				$("#submit_data").html("Submitted successfully!!");
				$("#submit_data").prop("disabled", false); 
				$('#submit_data_frm')[0].reset();
				
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
		
		</script>
</body>
</html>
