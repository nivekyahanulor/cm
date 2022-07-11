<?php
include('../controller/database.php');

$cm_staff = $mysqli->query("SELECT * from cm_staff");


if(isset($_POST['add-staff'])){
	
	$fname    = $_POST['fname'];
	$lname    = $_POST['lname'];
	$contact  = $_POST['contact'];
	$role     = $_POST['role'];
	$address  = $_POST['address'];
	$gender   = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['password'];


	$mysqli->query("INSERT INTO cm_staff (firstname , lastname ,contact,role,address,gender,username,password) 
					VALUES ('$fname','$lname','$contact','$role','$address','$gender','$username','$password')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Staff Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "staff.php";
							});
			</script>';
	
}

if(isset($_POST['update-staff'])){
	
	$fname    = $_POST['fname'];
	$lname    = $_POST['lname'];
	$contact  = $_POST['contact'];
	$role     = $_POST['role'];
	$gender   = $_POST['gender'];
	$address  = $_POST['address'];
	$id       = $_POST['id'];

	$mysqli->query("UPDATE cm_staff  SET  firstname    = '$fname' , 
										  lastname     = '$lname',
										  contact      = '$contact',
										  address      = '$address',
										  gender       = '$gender',
										  role         = '$role'
					WHERE staff_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Staff Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "staff.php";
							});
			</script>';
	
}

if(isset($_POST['delete-staff'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_staff where staff_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Staff is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "staff.php";
							});
			</script>';
	
}