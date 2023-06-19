<?php
include("../../nav/doctor_includes.php");
$page_title = "Daily Updates";

include("../../nav/doctor_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../dailly-updates/"> <em>Daily Updates</em></a></li>
			</ol>
<form action="delete.php" method="post" >
<div class="table-responsive">
	<table class="table table-striped dt-responsive nowrap" id="myTable">
		<thead>
			<tr class="success">
				<th>#</th>
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
					<a href="chat.php?patient=<?php echo $patient_id; ?>" title="delete" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to edit?')">Chat <i class="fa fa-envelope"></i></a>
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
<!--<input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Are you sure you want to delete?')"/>	-->
							<!--<input type="submit" name="action" class="btn btn-sm btn-primary" value="Decline" onclick="return confirm('Are you sure you want to decline?')"/>
							<input type="submit" name="action" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm(' Are you sure you want to delete?')"/>-->
							
							</form>
</div>

  </main>
  <!-- page-content" -->
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
