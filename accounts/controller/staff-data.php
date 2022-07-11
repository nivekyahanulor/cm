<?php
include('../controller/database.php');

$name        = $_GET['name'];
$cm_staffing = $mysqli->query(" SELECT a.*, b.* , c.role from cm_staffing a 
								LEFT JOIN cm_events b on a.event_id = b.event_id
								LEFT JOIN cm_staff c on a.statff_name = CONCAT(c.firstname , ' ' , c.lastname)
								where a.statff_name='$name'");
