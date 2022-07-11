<?php

	include('../../controller/database.php');


	$data = $_POST['package'];

	$packages = $mysqli->query("SELECT * from cm_packages where package_id  = '$data'");

	while($val1 = $packages->fetch_object()){
					
					echo $val1->package_pax;
				
	}