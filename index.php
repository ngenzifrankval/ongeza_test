<!DOCTYPE html>
<html>
<head>
	<title>Ongeza Test</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script type="text/javascript">
		function validate(){
			var first_name=document.getElementById("first_name");
			if (first_name.value.trim().length<3) {
				window.alert("first name must be at least 3 characters");
				first_name.style.border="3px solid red";
				return false;
			};
		}
	</script>
</head>
<body>
	<div class="container" style="border: 1px solid black;">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-md-12 col-xs-12">
				<form action="crudHandler.php" onsubmit="return validate();" method="POST" autocomplete="off">
					<center><h3>ONGEZA TEST</h3></center>
					<center><b><i><legend><h4>customer registration form</h4></legend></i></b></center>
					<div class="form-group">
						<label class="control-label">First Name</label>
						<input type="text" name="first_name" class="form-control" id="first_name" required="true" autofocus>
                    </div>
                    <div class="form-group">
						<label class="control-label">Last Name</label>
						<input type="text" name="last_name" class="form-control" required="true">
                    </div>
                    <div class="form-group">
						<label class="control-label">town Name</label>
						<input type="text" name="town_name" class="form-control" required="true">
                    </div>
                    <div class="form-group">
						<label class="control-label">Gender</label>
						<select name="selectgender">
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
						<button type="submit" class="btn btn-block btn-primary" name="btnsave" onclick="validate();">Save</button>
                    </div>	
				</form>
			</div>
		</div>
	</div>
	<div class="container" style="border: 1px solid black;">
		<?php
			$sql='select c.id,c.first_name,c.last_name,c.town_name,g.gender_name from Customer as c,gender as g where c.gender_id=g.gender_id';
			$query=mysqli_query($conn,$sql);
			include("connection.php");
			echo "<table class='table table-striped'>
				<thead class='thead-dark'>
					<tr>
						<th>Customer ID</th>
						<th>First name</th>
						<th>Last name</th>
						<th>town name</th>
						<th>Gender name</th>
					</tr>
				<thead>
			";
			while ($data=mysqli_fetch_array($query)) {
				echo "
					<tr class responsive>
						<td>$data[0]</td>
						<td>$data[1]</td>
						<td>$data[2]</td>
						<td>$data[3]</td>
						<td>$data[4]</td>
						<td>
						<form action='updatecustomer.php' method='POST'>
							<input type='hidden' name='id' value='$data[0]'/>
	        					<button class='btn badge-pill'  name='btnupdate1'>Update
	        					</button>
	      					</td>
      					</form>
      					<form action='crudHandler.php' method='POST'>
	      					<td>
	        					<input type='hidden' name='id' value='$data[0]'/>
	        					<button class='btn btn-danger badge-pill'  name='btndelete'>Delete
	        					</button>
	      					</td>
      					</form>
					</tr>
				";
			}
			echo "</table>";
		?>
	</div>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
</body>
</html>