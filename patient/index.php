<?php
include("../nav/includes_1.php");
$page_title = "Home";

include("../nav/head_1.php");
?>

<body>
<?php include("aside.php"); ?>
<main class="page-content" >
    <div class="container" >
      
	<form method="post" id="register_doctor_frm" autocomplete="off">
<span id="alert_action"></span>
	<div class="form-group">
		<label>Doctor name *</label>
		<input type="text" name="doctor_name" id="doctor_name" class="form-control" required />
		<span id="err_doc_name"></span>
	</div>
	<div class="form-group">
		<label>Phone number *</label>
		<input type="text" name="phone_number" id="phone_number" class="form-control" required />
		<span id="err_no"></span>
	</div>
	<div class="form-group">
		<label>Email *</label>
		<input type="email" name="email" id="email" class="form-control" required />
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
			<option value="<?php echo $hospital_id; ?>"><?php echo $hospital_name; ?></option>
			<?php } ?>
			</select>
					   
		<span id="err_hospital"></span>
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
		<input type="hidden" name="add_doc_action" id="add_doc_action"/>
		<input type="submit" name="register_doctor" id="register_doctor" class="btn btn-sm btn-success btn-block" required value="Register Doctor"/>
	</div>
</form>
<h4>Hospitals</h4>
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
				<th>Name</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th>Hospital</th>
				<th>Date Registered</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$doctors = $doctor->selectDoctors();
		$count = 0;
		foreach($doctors as $row) {
			$count++;
			extract($row);
		?>
			<tr>
				
				<td>
					<a href="edit.php?doctor=<?php echo $doctor_id; ?>" title="delete" class="btn btn-info btn-sm" onclick="return confirm('Are you sure you want to edit?')"><i class="fa fa-edit"></i></a>
				</td>
				<td>
				<div class="checkbox check-success" style="margin-top:-1px;">
					<label for="checkAll<?php echo $doctor_id; ?>"><input type="checkbox" name="doctor[]" value="<?php echo $doctor_id; ?>" id="checkAll<?php echo $doctor_id; ?>"></label>
				</div> 
				</td>
				
				<td><?php echo $doctor_name; ?></td>
				<td><?php echo $phone_number; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $hospital_name; ?></td>
				<td><?php echo $date_registered; ?></td>
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
<script src='../js/jquery.min.js'></script>
<script src='../js/bootstrap.min.js'></script>
<script  src="../js/script.js"></script>

</body>
</html>
