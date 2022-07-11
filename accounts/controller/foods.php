<?php
include('../controller/database.php');

$cm_foods = $mysqli->query("SELECT * from cm_foods");


if(isset($_POST['add-food'])){
	
	$name         = $_POST['name'];
	$category     = $_POST['category'];


	$mysqli->query("INSERT INTO cm_foods (name ,category) 
					VALUES ('$name','$category')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Food Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "foods.php";
							});
			</script>';
	
}

if(isset($_POST['update-food'])){
	
	$name         = $_POST['name'];
	$category     = $_POST['category'];
	$id           = $_POST['id'];

	$mysqli->query("UPDATE cm_foods  SET  name     = '$name' , 
										  category = '$category'
					WHERE food_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Food Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "foods.php";
							});
			</script>';
	
}

if(isset($_POST['delete-food'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_foods where food_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Food is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "foods.php";
							});
			</script>';
	
}