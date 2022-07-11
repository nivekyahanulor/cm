<?php
include('../controller/database.php');

$cm_inventory = $mysqli->query("SELECT * from cm_inventory");


if(isset($_POST['add-inventory'])){
	
	$name         = $_POST['name'];
	$description  = $_POST['description'];
	$qty          = $_POST['qty'];
	$category     = $_POST['category'];
	$supplier     = $_POST['supplier'];


	$mysqli->query("INSERT INTO cm_inventory (name , description ,qty,category,supplier) 
					VALUES ('$name','$description','$qty','$category','$supplier')");

  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Inventory Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}

if(isset($_POST['update-inventory'])){
	
	$name         = $_POST['name'];
	$description  = $_POST['description'];
	$qty          = $_POST['qty'];
	$category     = $_POST['category'];
	$supplier     = $_POST['supplier'];
	$id           = $_POST['id'];

	$mysqli->query("UPDATE cm_inventory  SET  name    = '$name' , 
										  description     = '$description',
										  qty      = '$qty',
										  category         = '$category',
										  supplier         = '$supplier'
					WHERE item_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Inventory Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}

if(isset($_POST['delete-inventory'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_inventory where item_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Inventory is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}