<?php
include('../controller/database.php');


$packages = $mysqli->query("SELECT * from cm_packages");
							
							
if(isset($_POST['add-package'])){
	
	$package_pax     = $_POST['package_pax'];
	$package_name    = $_POST['package_name'];
	$package_price   = $_POST['package_price'];
	

	$mysqli->query("INSERT INTO cm_packages (package_name , package_pax,package_price) 
					VALUES ('$package_name','$package_pax','$package_price')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Package Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_packages where package_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Package is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id            	 = $_POST['id'];
	$package_pax     = $_POST['package_pax'];
	$package_name    = $_POST['package_name'];
	$package_price   = $_POST['package_price'];
	
	$mysqli->query("UPDATE cm_packages  SET package_name      = '$package_name' , 
										  package_pax         = '$package_pax',
										  package_price       = '$package_price'
					WHERE package_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Package Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "packages.php";
							});
			</script>';
	
}