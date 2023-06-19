<?php
include("../../nav/doctor_includes.php");
$page_title = "New Messages";

include("../../nav/doctor_head.php");
?>

<body>
<?php include("../aside.php"); ?>
<main class="page-content" >
    <div class="container" >
	<ol class="cd-breadcrumb custom-separator">
				<li><a href="../">Home</a></li>
				<li class="current"><a href="../messages/"> <em>New Messages</em></a></li>
			</ol>

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
				<th></th>
				<th>Patient Name</th>
				<th>Message</th>
				<th>Date Sent</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$status = 0;
		
		$msgs = $msg->selectMessages($doctor_id,$status,$sender);
		$count = 0;
		foreach($msgs as $row) {
			$count++;
			extract($row);
		?>
			<tr>
				
				<td>
					<a href="edit.php?chat=<?php echo $chat_id; ?>" title="delete" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to edit?')"><i class="fa fa-edit"></i></a>
				</td>
				<td>
				<div class="checkbox check-success" style="margin-top:-1px;">
					<label for="checkAll<?php echo $chat_id; ?>"><input type="checkbox" name="chat[]" value="<?php echo $chat_id; ?>" id="checkAll<?php echo $chat_id; ?>"></label>
				</div> 
				</td>
				<td>
					<a href="../chat/?patient=<?php echo $patient_id; ?>" title="delete" class="btn btn-success btn-sm" ><i class="fa fa-reply"></i> Reply</a>
				</td>
				<td><?php echo $patient_name; ?></td>
				<td><?php echo $message; ?></td>
				<td><?php echo $date_sent; ?></td>
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

  </main>
  <!-- page-content" -->
</div>
<script src='../../js/jquery.min.js'></script>
<script src='../../js/bootstrap.min.js'></script>
<script  src="../../js/script.js"></script>
<script  src="../../js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script>

		$(document).ready(function() {
			$('#myTable').DataTable();
		} );
		$("#checkAll").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
		});
		
		</script>
</body>
</html>
