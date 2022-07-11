<?php
include('../controller/database.php');

$cm_events = $mysqli->query("SELECT * from cm_events");


if(isset($_POST['add-events'])){
	
	$event_name     = $_POST['event_name'];
	$event_venue    = $_POST['event_venue'];
	$event_date     = $_POST['event_date'];
	$event_time     = $_POST['event_time'];
	$event_type     = $_POST['event_type'];
	$event_package 	= $_POST['event_package'];
	$notes    		= $_POST['notes'];
	$guest    		= $_POST['guest'];
	$client_name    = $_POST['client_name'];
	$contact_number = $_POST['contact_number'];
	$payment_type   = $_POST['payment_type'];
	$payment_status = $_POST['payment_status'];

	$mysqli->query("INSERT INTO cm_events (event_name , event_venue ,event_date,event_time,event_type,event_package,notes,guest,client_name,contact_number,payment_type,payment_status,event_status) 
					VALUES ('$event_name','$event_venue','$event_date','$event_time','$event_type','$event_package','$notes','$guest','$client_name','$contact_number','$payment_type','$payment_status','Pending')");
	 
	$lastid = $mysqli->insert_id;
	
	$items = $mysqli->query("select * from cm_package_task where package_id='$event_package'");	
	while($val1 = $items->fetch_object()){ 
	$task = $val1->task;
	$mysqli->query("INSERT INTO cm_event_task (event_id , task_name,task_type) 
					VALUES ('$lastid','$task','Pre-Event')");
	}
	
	
	
	
	$item = $mysqli->query("SELECT a.qty,a.package_item_id,a.item_id,b.name from cm_package_items a left join cm_inventory b on b.item_id = a.item_id where a.package='$event_package'");
	while($val = $item->fetch_object()){ 
	$itemname = $val->name;
	$qty = $val->qty;
	
	$mysqli->query("INSERT INTO cm_event_equipments (package_id , event_id ,equipment_name,qty) 
					VALUES ('$event_package','$lastid','$itemname','$qty')");
	}
	
  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Event Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "index.php";
							});
			</script>';
	
}

if(isset($_POST['update-events'])){
	
	$event_name     = $_POST['event_name'];
	$event_venue    = $_POST['event_venue'];
	$event_date     = $_POST['event_date'];
	$event_time     = $_POST['event_time'];
	$event_type     = $_POST['event_type'];
	$event_package 	= $_POST['event_package'];
	$notes    		= $_POST['notes'];
	$guest    		= $_POST['guest'];
	$client_name    = $_POST['client_name'];
	$contact_number = $_POST['contact_number'];
	$payment_type   = $_POST['payment_type'];
	$payment_status = $_POST['payment_status'];
	$event_status   = $_POST['event_status'];
	$event_id       = $_POST['event_id'];
	
	if($event_status == 'Finished'){
		
		$get_staff = $mysqli->query("SELECT * from cm_staffing where event_id = '$event_id'");
		while($val1 = $get_staff->fetch_object()){
				$staff = $val1->statff_name;
				$mysqli->query("UPDATE cm_staff set status = 0 where  CONCAT(firstname , ' ' , lastname) = '$staff'");
		}
		$mysqli->query("UPDATE cm_events SET event_name = '$event_name' , 
										 event_venue = '$event_venue',
										 event_date = '$event_date',
										 event_time = '$event_time',
										 event_type = '$event_type',
										 event_package = '$event_package',
										 notes = '$notes',
										 guest = '$guest',
										 client_name = '$client_name',
										 contact_number = '$contact_number',
										 payment_type = '$payment_type',
										 event_status = '$event_status',
										 payment_status  = '$payment_status'
					where event_id = '$event_id'");
	} else {
	$mysqli->query("UPDATE cm_events SET event_name = '$event_name' , 
										 event_venue = '$event_venue',
										 event_date = '$event_date',
										 event_time = '$event_time',
										 event_type = '$event_type',
										 event_package = '$event_package',
										 notes = '$notes',
										 guest = '$guest',
										 client_name = '$client_name',
										 contact_number = '$contact_number',
										 payment_type = '$payment_type',
										 event_status = '$event_status',
										 payment_status  = '$payment_status'
					where event_id = '$event_id'");
	 
	}
	
  	        echo '<script>
					Swal.fire({
							title: "Success! ",
							text: "Event Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner.php";
							});
			</script>';
	
}

if(isset($_POST['delete-event'])){
	
	$id       = $_POST['id'];

	$mysqli->query("DELETE FROM  cm_events where event_id ='$id' ");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Event Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "planner.php";
							});
			</script>';
	
}

if(isset($_POST['update-item'])){
	
	$id            		 = $_POST['id'];
	$item_code           = $_POST['item_code'];
	$item_name           = $_POST['item_name'];
	$item_price          = $_POST['item_price'];
	$item_qty            = $_POST['item_qty'];
	$item_unit           = $_POST['item_unit'];
	$item_critical_level = $_POST['item_critical_level'];
	$item_supplier_id    = $_POST['item_supplier_id'];
	$item_category_id    = $_POST['item_category_id'];

	$mysqli->query("UPDATE pos_items  SET item_code           = '$item_code' , 
										  item_name           = '$item_name',
										  item_price          = '$item_price',
										  item_qty            = '$item_qty',
										  item_unit           = '$item_unit',
										  item_critical_level = '$item_critical_level',
										  item_supplier_id    = '$item_supplier_id',
										  item_category_id    = '$item_category_id'
					WHERE item_id = '$id'");

		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Item Details is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "inventory.php";
							});
			</script>';
	
}