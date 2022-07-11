<?php
include('../controller/database.php');

$getid = $_GET['id'];
$cm_event_task = $mysqli->query("SELECT * from cm_event_equipments where event_id='$getid'");
							
							
if(isset($_POST['add-equipment'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$equipment = $_POST['equipment'];
	$qty       = $_POST['qty'];
	
	$mysqli->query("INSERT INTO cm_event_equipments (package_id , event_id,equipment_name,qty) 
					VALUES ('$package','$eventid','$equipment','$qty')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Item Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-equipment.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
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
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	
	$mysqli->query("DELETE FROM  cm_event_equipments where event_equipment_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Equipment is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-equipment.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}
