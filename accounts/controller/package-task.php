<?php
include('../controller/database.php');

$id = $_GET['id'];
$packages = $mysqli->query("select * from cm_package_task where package_id='$id'");
							
							
if(isset($_POST['add-task'])){
	
	$task      = $_POST['task'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	

	$mysqli->query("INSERT INTO cm_package_task (task , package_id) 
					VALUES ('$task','$package')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Task Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-task.php?id=' . $package .'&package='. $name .' ";								;
						});
					</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id        = $_POST['id'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	$mysqli->query("DELETE FROM  cm_package_task where pt_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Task is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-task.php?id=' . $package .'&package='. $name .' ";								;
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id        = $_POST['id'];
	$task     = $_POST['task'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	

	$mysqli->query("UPDATE cm_package_task  SET task  = '$task'  
					WHERE pt_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Task Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-task.php?id=' . $package .'&package='. $name .' ";								;
							});
			</script>';
	
}