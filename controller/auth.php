<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,$_POST['password']);

	$sql      = "SELECT * FROM cm_user WHERE username='$username' AND BINARY password='$password'";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['firstname'].' '. $row['lastname'];
		$_SESSION['id']    = $row['user_id'];
		$_SESSION['role']  = 1;
		$_SESSION['user']  ='Administrator';
		header("location:../accounts/index.php");
	} else { 
		$sql1      = "SELECT * FROM cm_staff WHERE username='$username' AND BINARY password='$password'";
		$result1   = mysqli_query($mysqli, $sql1);

		$row1      = mysqli_fetch_assoc($result1);
		$rows1	   = mysqli_num_rows($result1);
		if($rows1==1){
			$_SESSION['name']  = $row1['firstname'].' '. $row1['lastname'];
			$_SESSION['id']    = $row1['staff_id'];
			$_SESSION['role']  = 2;
			$_SESSION['user']  = $row1['role'];
			header("location:../accounts/index.php");
		} else { 
			header("location:../index.php?error");
		}
	}
