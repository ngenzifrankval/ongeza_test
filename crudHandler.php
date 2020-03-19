<?php
	include("connection.php");
	$first=$_POST['first_name'];
	$last=$_POST['last_name'];
	$town=$_POST['town_name'];
	$gender=$_POST['selectgender'];
	//$customer_id=$_POST['customer_id'];

	if (isset($_POST['btnsave'])) {
		$query="insert into customer(first_name,last_name,town_name,gender_id) values('$first','$last','$town',$gender);";
		$sql=mysqli_query($conn,$query);
		header("location:index.php");
	}
	else{
		header("location:index.php");
	}
	if (isset($_POST['btndelete'])) {
		$id=$_POST['id'];
		$sql="delete from customer where id='$id'";
		mysqli_query($conn,$sql);
		header("location:index.php");

	}
	else{
		header("location:index.php");
	}
	if (isset($_POST['btnupdate'])) {
		$first=$_POST['first'];
		$last=$_POST['last'];
		$town=$_POST['town'];
		$gender1=$_POST['gender1'];
		echo $customer_id=$_POST['customer_id'];

		//  echo $first."<br>";
		// echo $last."<br>";
		// echo $town."<br>";
		//  echo $customer_id."<br>";
		// echo $gender."<br>";
		$sql="update customer,gender set customer.first_name='$first',customer.last_name='$last',customer.town_name='$town',customer.gender_id='$gender1'  where customer.gender_id=gender.gender_id and customer.id='$customer_id'";
		mysqli_query($conn,$sql);
		header("location:index.php");
	}


?>