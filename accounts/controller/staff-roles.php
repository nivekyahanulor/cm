<?php
include('../controller/database.php');

$cm_staff_roles = $mysqli->query("SELECT * from cm_staff_roles");


if(isset($_POST['add-roles'])){
	
	$name         = $_POST['name'];


	$mysqli->query("INSERT INTO cm_staff_roles (name) 
					VALUES ('$name')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Roles Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "settings.php";
							});
			</script>';
	
}

if(isset($_POST['update-roles'])){
	
	$name         = $_POST['name'];
	$category     = $_POST['category'];
	$id           = $_POST['id'];

	$mysqli->query("UPDATE cm_staff_roles  SET  name= '$name' WHERE staff_roles_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Roles Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "settings.php";
							});
			</script>';
	
}

if(isset($_POST['delete-roles'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_staff_roles where staff_roles_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Roles is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "settings.php";
							});
			</script>';
	
}