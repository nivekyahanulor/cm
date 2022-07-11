<?php
include('../controller/database.php');

$getid = $_GET['id'];
$cm_event_task = $mysqli->query("SELECT * from cm_event_task where event_id='$getid'");
							
							
if(isset($_POST['add-task'])){
	
	$taskname   = $_POST['taskname'];
	$date       = $_POST['date'];
	$time       = $_POST['time'];
	$staff      = $_POST['staff'];
	$eventid    = $_POST['eventid'];
	$eventname  = $_POST['eventname'];
	

	$mysqli->query("INSERT INTO cm_event_task (event_id , task_name,date,time,staff,status,task_type) 
					VALUES ('$eventid','$taskname','$date','$time','$staff','Pending','Pre-Event')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Item Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-data.php?id=' . $eventid .'&event='. $eventname .' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-task'])){
	
	$id         = $_POST['id'];
	$taskname   = $_POST['taskname'];
	$date       = $_POST['date'];
	$time       = $_POST['time'];
	$staff      = $_POST['staff'];
	$eventid    = $_POST['eventid'];
	$eventname  = $_POST['eventname'];
	$tasktype   = $_POST['tasktype'];
	$status     = $_POST['status'];
	

	$mysqli->query("UPDATE cm_event_task  SET    task_name   = '$taskname' , 
												 date        = '$date',
												 time        = '$time',
												 staff       = '$staff',
												 status      = '$status',
												 task_type   = '$tasktype'
					WHERE task_id   = '$id'");
				
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Item Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-data.php?id=' . $eventid .'&event='. $eventname .' ";								;
							});
			</script>';
	
}

if(isset($_POST['delete-task'])){
	
	$id        = $_POST['id'];
	$eventid    = $_POST['eventid'];
	$eventname  = $_POST['eventname'];
	$mysqli->query("DELETE FROM  cm_event_task where task_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Task is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-data.php?id=' . $eventid .'&event='. $eventname .' ";								;
							});
			</script>';
	
}
