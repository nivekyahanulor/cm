<?php
include('../controller/database.php');

$cm_item_category = $mysqli->query("SELECT * from cm_item_category");


if(isset($_POST['add-category'])){
	
	$name         = $_POST['name'];


	$mysqli->query("INSERT INTO cm_item_category (name) 
					VALUES ('$name')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Category Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "item-category.php";
							});
			</script>';
	
}

if(isset($_POST['update-category'])){
	
	$name         = $_POST['name'];
	$id           = $_POST['id'];

	$mysqli->query("UPDATE cm_item_category  SET  name= '$name' WHERE item_category_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Category Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "item-category.php";
							});
			</script>';
	
}

if(isset($_POST['delete-category'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_item_category where item_category_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Category is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "item-category.php";
							});
			</script>';
	
}