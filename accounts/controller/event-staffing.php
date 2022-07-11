<?php
include('../controller/database.php');
error_reporting(0);

$getid = $_GET['id'];
$cm_staffing_server = $mysqli->query("SELECT * from cm_staffing where event_id='$getid' and category =1");
$cm_staffing_busboy = $mysqli->query("SELECT * from cm_staffing where event_id='$getid' and category =2");
$cm_staffing_dishwasher = $mysqli->query("SELECT * from cm_staffing where event_id='$getid' and category =3");
							
							
if(isset($_POST['add-server'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$name 	   = $_POST['name'];
	
	$mysqli->query("INSERT INTO cm_staffing (event_id , statff_name,category) 
					VALUES ('$eventid','$name','1')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Server Staff Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-attendance-server'])){
	
	$eventid     = $_POST['eventid'];
	$package     = $_POST['package'];
	$event       = $_POST['event'];
	$staffing_id = $_POST['staffing_id'];
	$attendance  = $_POST['attendance'];
	$name 	     = $_POST['name'];
	
	
	$mysqli->query("UPDATE cm_staffing SET is_present   = '$attendance'
					WHERE staffing_id = '$staffing_id'");
	
	if($attendance ==1){
	$mysqli->query("UPDATE cm_staff SET status   = '1'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	} else {
	$mysqli->query("UPDATE cm_staff SET status   = '0'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	}
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Server Staff Attendance Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

if(isset($_POST['delete-staff-server'])){
	
	$eventid        = $_POST['eventid'];
	$package        = $_POST['package'];
	$event          = $_POST['event'];
	$staffing_id  = $_POST['staffing_id'];
	
	$mysqli->query("DELETE FROM  cm_staffing where staffing_id ='$staffing_id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Server Staff  Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}


if(isset($_POST['add-busboy'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$name 	   = $_POST['name'];
	
	$mysqli->query("INSERT INTO cm_staffing (event_id , statff_name,category) 
					VALUES ('$eventid','$name','2')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Busboy Staff Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-attendance-busboy'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$staffing_id 	   = $_POST['staffing_id'];
	$attendance 	   = $_POST['attendance'];
	$name 	     = $_POST['name'];
	
	
	$mysqli->query("UPDATE cm_staffing SET is_present   = '$attendance'
					WHERE staffing_id = '$staffing_id'");
	
	if($attendance ==1){
	$mysqli->query("UPDATE cm_staff SET status   = '1'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	} else {
	$mysqli->query("UPDATE cm_staff SET status   = '0'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	}
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Busboy Staff Attendance Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

if(isset($_POST['delete-staff-busboy'])){
	
	$eventid        = $_POST['eventid'];
	$package        = $_POST['package'];
	$event          = $_POST['event'];
	$staffing_id  = $_POST['staffing_id'];
	
	$mysqli->query("DELETE FROM  cm_staffing where staffing_id ='$staffing_id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Busboy Staff  Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

if(isset($_POST['add-diswasher'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$name 	   = $_POST['name'];
	
	$mysqli->query("INSERT INTO cm_staffing (event_id , statff_name,category) 
					VALUES ('$eventid','$name','3')");

  	        echo 	'<script>
						Swal.fire({
							title: "Success! ",
							text: "Diswasher Staff Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
						});
					</script>';
	
}


if(isset($_POST['update-attendance-diswasher'])){
	
	$eventid   = $_POST['eventid'];
	$package   = $_POST['package'];
	$event     = $_POST['event'];
	$staffing_id 	   = $_POST['staffing_id'];
	$attendance 	   = $_POST['attendance'];
	$name 	     = $_POST['name'];
	
	
	$mysqli->query("UPDATE cm_staffing SET is_present   = '$attendance'
					WHERE staffing_id = '$staffing_id'");
	
	if($attendance ==1){
	$mysqli->query("UPDATE cm_staff SET status   = '1'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	} else {
	$mysqli->query("UPDATE cm_staff SET status   = '0'
					WHERE CONCAT(firstname , ' ' , lastname) = '$name'");	
	}
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Diswasher Staff Attendance Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

if(isset($_POST['delete-staff-diswasher'])){
	
	$eventid        = $_POST['eventid'];
	$package        = $_POST['package'];
	$event          = $_POST['event'];
	$staffing_id  = $_POST['staffing_id'];
	
	$mysqli->query("DELETE FROM  cm_staffing where staffing_id ='$staffing_id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Diswasher Staff  Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner-staffing.php?id=' . $eventid .'&event='. $event .'&package='.$package.' ";								;
							});
			</script>';
	
}

