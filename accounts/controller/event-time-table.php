<?php
include('../controller/database.php');
error_reporting(0);

$getid = $_GET['id'];
$cm_event_time_table = $mysqli->query("SELECT * from cm_event_time_table where event_id='$getid'");
							
							
if(isset($_POST['add-time-table'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$time 	   = $_POST['time'];
	$task      = $_POST['task'];
	
	$mysqli->query("INSERT INTO cm_event_time_table (package_id , event_id,time,task) 
					VALUES ('$package','$eventid','$time','$task')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Time Table Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-time-table.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-time-table'])){
	
	$eventid        = $_POST['eventid'];
	$package        = $_POST['package'];
	$event          = $_POST['event'];
	$time 	        = $_POST['time'];
	$task           = $_POST['task'];
	$time_table_id  = $_POST['time_table_id'];
	
	
	$mysqli->query("UPDATE cm_event_time_table SET time   = '$time' , task = '$task'
					WHERE time_table_id = '$time_table_id'");
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Time Table Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-time-table.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

if(isset($_POST['delete-task'])){
	
	$eventid        = $_POST['eventid'];
	$package        = $_POST['package'];
	$event          = $_POST['event'];
	$time 	        = $_POST['time'];
	$task           = $_POST['task'];
	$time_table_id  = $_POST['time_table_id'];
	
	$mysqli->query("DELETE FROM  cm_event_time_table where time_table_id ='$time_table_id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Time Table Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-time-table.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}
