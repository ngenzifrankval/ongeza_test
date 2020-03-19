<!DOCTYPE html>
<html>
<head>
	<title>Ongeza Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="border: 1px solid black;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
			<?php
				include("connection.php");
				if (isset($_POST['btnupdate1'])) {
					$id=$_POST['id'];
				$query=mysqli_query($conn,"select * from customer where id='$id'");
				$row=mysqli_fetch_array($query);
				}
				
			  ?>
			  <center><legend>Update Customer</legend></center>
			  <form method="POST" action="crudHandler.php" autocomplete="off">
					<div class="form-group">
						<label class="control-label">ID</label>
						<input type="text" value="<?php echo $row[0]; ?>" name="customer_id" class="form-control" readonly="" required="true" >
                    </div>
                    <div class="form-group">
						<label class="control-label">First Name</label>
						<input type="text" value="<?php echo $row[1] ?>" name="first" class="form-control"  required="true" autofocus>
                    </div>
                    <div class="form-group">
						<label class="control-label">Last Name</label>
						<input type="text" name="last"  value="<?php echo $row[2] ?>" class="form-control"  required="true" >
                    </div>
                    <div class="form-group">
						<label class="control-label">Town Name</label>
						<input type="text" name="town" class="form-control"  value="<?php echo $row[3] ?>" required="true" >
                    </div>
                    <div class="form-group">
                    <label class="control-label">Gender</label>
                    <select class="select" name="gender1">
							<?php 
								include('connection.php');
								$result=mysqli_query($conn,"select *from gender");
								while ($data=mysqli_fetch_array($result)) {
									?>
									<option value="<?php echo $data['gender_id'];?>"><?php echo $data['gender_name'];?>
									</option>
								<?php
								}
								?>
					</select>
					</div>
					<div class="form-group">
						<button  class="btn btn-block btn-primary" name="btnupdate">Update Customer</button>
                    </div>
			  </form>
			</div>
		</div>
	</div>

</body>
</html>