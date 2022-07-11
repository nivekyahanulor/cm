<?php
include('../controller/database.php');


$packages = $mysqli->query("SELECT a.qty,a.package_item_id,a.item_id,b.name from cm_package_items a left join cm_inventory b on b.item_id = a.item_id");
							
							
if(isset($_POST['add-package'])){
	
	$item      = $_POST['item'];
	$quantity  = $_POST['quantity'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	

	$mysqli->query("INSERT INTO cm_package_items (item_id , package,qty) 
					VALUES ('$item','$package','$quantity')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Item Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-inventory.php?id=' . $package .'&package='. $name .' ";								;
						});
					</script>';
	
}

if(isset($_POST['delete-item'])){
	
	$id        = $_POST['id'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	$mysqli->query("DELETE FROM  cm_package_items where package_item_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Item is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-inventory.php?id=' . $package .'&package='. $name .' ";								;
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id        = $_POST['id'];
	$item     = $_POST['item'];
	$quantity  = $_POST['quantity'];
	$package   = $_POST['package'];
	$name      = $_POST['package_name'];
	

	$mysqli->query("UPDATE cm_package_items  SET item_id  = '$item' , 
												 package  = '$package',
												 qty      = '$quantity'
					WHERE package_item_id  = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Item Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "package-inventory.php?id=' . $package .'&package='. $name .' ";								;
							});
			</script>';
	
}