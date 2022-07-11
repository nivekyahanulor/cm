<?php
include('../controller/database.php');

error_reporting(0);

$getid = $_GET['id'];

$cm_event_menu = $mysqli->query("SELECT * from cm_event_menu where event_id='$getid'");

			
							
if(isset($_POST['add-menu'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$beef 	   = $_POST['beef'];
	$pork      = $_POST['pork'];
	$chicken   = $_POST['chicken'];
	$fish      = $_POST['fish'];
	$vegetable = $_POST['vegetable'];
	$pasta     = $_POST['pasta'];
	$dessert   = $_POST['dessert'];
	$drinks    = $_POST['drinks'];
	
	if($beef==""){
			$beef1 = "";
	} else {
			$beef1 = $beef;
	}
	if($pork==""){
			$pork1 = "";
	} else {
			$pork1 = $pork;
	}
	if($chicken==""){
			$chicken1 = "";
	} else {
			$chicken1 = $chicken;
	}
	if($fish==""){
			$fish1 = "";
	} else {
			$fish1 = $fish1;
	}
	
	$mysqli->query("INSERT INTO cm_event_menu (package_id , event_id,beef,pork,chicken,fish,vegetable,pasta,dessert,drinks) 
					VALUES ('$package','$eventid','$beef1','$pork1','$chicken1','$fish1','$vegetable','$pasta','$dessert','$drinks')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Menu Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-menu.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-equipment'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$status    = $_POST['status'];
	$return    = $_POST['return'];
	$rqty      = $_POST['qty'];
	$cminven   = $_POST['cminven'];
	$equipment_name     = $_POST['equipment_name'];
	$event_equipment_id = $_POST['event_equipment_id'];
	
	if($status ==0){} else {

	$mysqli->query("UPDATE cm_event_equipments   SET    is_use   = '1' 
					WHERE event_equipment_id    = '$event_equipment_id'");
					
	$mysqli->query("UPDATE cm_inventory   SET    qty   = qty-'$rqty'
					WHERE name     = '$equipment_name'");
	}
	if($return ==1){
	$mysqli->query("UPDATE cm_event_equipments   SET    is_return   = '1' ,date_returned = NOW()
					WHERE event_equipment_id    = '$event_equipment_id'");
					
	$mysqli->query("UPDATE cm_inventory   SET    qty   = qty+'$rqty'
					WHERE name     = '$equipment_name'");	
	}
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Item Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-equipment.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
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
