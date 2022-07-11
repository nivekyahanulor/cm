<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/event-staffing.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      
   
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
		  <div class="card-header">
		  <h5><?php echo $_GET['event'];?> Event </h5>
		  </div>
		   <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
				<li class="nav-item flex-fill" role="presentation"> <a href="planner-data.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 " >TASK</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-equipment.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100" >EQUIPMENT</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-menu.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >MENU</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >TIME TABLE</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  active" >BEO </button></a></li>
              </ul>
			  
			<br>
			<center><input type="button" class="btn btn-info" value="Print BEO" onclick="PrintElem('#mydiv')" /><center>
			<br>

			<div id="mydiv">
			<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
			<link href="../assets/css/style.css" rel="stylesheet">
            <div class="card-body"><br>
			<div class="row justify-content-center">
			
			 <div class="col-lg-12">
			  <div class="card">
				<div class="card-header">
				<h5><?php echo $_GET['event'];?> Event </h5><br>
				</div>
				<div class="card-body">
				<table class="table">
				 <?php $eventid = $_GET['id'];
				 $cm_events = $mysqli->query("SELECT * from cm_events where event_id ='$eventid' "); 
				 while($val = $cm_events->fetch_object()){ ?>
					<tr> 
						<td> <b>EVENT NAME: </b></td>
						<td> <?php echo $val->event_name;?></td>
						<td> <b>CLIENT NAME:</b> </td>
						<td> <?php echo $val->client_name;?></td>
					</tr>
					<tr> 
						<td> <b>VENUE: </b></td>
						<td> <?php echo $val->event_venue;?></td>
						<td> <b>CONTACT NUMBER:</b></td>
						<td> <?php echo $val->contact_number;?></td>
					</tr>
					<tr> 
						<td> <b>DATE:</b> </td>
						<td> <?php echo $val->event_date;?></td>
						<td> <b>PAYMENT TYPE:</b> </td>
						<td> <?php echo $val->payment_type;?></td>
					</tr>
					<tr> 
						<td> <b>TIME :</b> </td>
						<td> <?php echo $val->event_time;?></td>
						<td> <b>PACKAGE :</b> </td>
						<td> <?php if($val->event_package==1) { echo "Bronze";} else if($val->event_package==2){ echo "Silver";} else if($val->event_package==3){ echo 'Gold';} else if($val->event_package==4){ echo 'Platinum';}?> Package</td>
					</tr>
					<tr> 
						<td> <b>EVENT TYPE :</b> </td>
						<td> <?php echo $val->event_type;?></td>
						<td> <b>NO. OF GUEST  : </b></td>
						<td> <?php echo $val->guest;?></td>
					</tr>
				<?php } ?>
				</table>
				<br>
				<div class="row">
				 

				 <div class="col-lg-4">
				    <h4>TIME TABLE</h4>
				 	<table class="table table-bordered">
					<th> Time </th>
					<th> Task </th>
					 <?php $eventid = $_GET['id'];
					 $cm_event_time_table = $mysqli->query("SELECT * from cm_event_time_table where event_id ='$eventid' "); 
					 while($val1 = $cm_event_time_table->fetch_object()){ ?>
					<tr> 
						<td> <?php echo $val1->time;?> </td>
						<td> <?php echo $val1->task;?></td>
					</tr>
					
					 <?php } ?>
					</table>
					<hr>
					 <h4>MENU SELECTION </h4>
				 	<table class="table table-bordered">
					
					 <?php $eventid = $_GET['id'];
					 $cm_event_time_table = $mysqli->query("SELECT * from cm_event_menu where event_id ='$eventid' "); 
					 while($val1 = $cm_event_time_table->fetch_object()){ ?>
					<tr> 
						<td>BEEF</td>
						<td> <?php echo $val1->beef;?></td>
					</tr>
					<tr> 
						<td>PORK</td>
						<td> <?php echo $val1->pork;?></td>
					</tr>
					<tr> 
						<td>CHICKEN</td>
						<td> <?php echo $val1->chicker;?></td>
					</tr>
					<tr> 
						<td>FISH</td>
						<td> <?php echo $val1->fish;?></td>
					</tr>
					<tr> 
						<td>VEGETABLE</td>
						<td> <?php echo $val1->vegetable;?></td>
					</tr>
						<tr> 
						<td>PASTA</td>
						<td> <?php echo $val1->pasta;?></td>
					</tr>
					<tr> 
						<td>DESSERT</td>
						<td> <?php echo $val1->dessert;?></td>
					</tr>
					<tr> 
						<td>DRINKS</td>
						<td> <?php echo $val1->drinks;?></td>
					</tr>
					
					 <?php } ?>
					</table>
				 </div>
				 <div class="col-lg-8">
				  <h4>STAFFING </h4>
				<div class="row">
				 <div class="col-lg-4 ">
				  <div class="card">
					<div class="card-header">
					<center><b>SERVERS</b> <br>
					</div>
					<div class="card-body">
					<br>
					<table class="table table-bordered">
					<thead>
					  <tr>
						<th scope="col"  class="text-center">Name</th>
					  </tr>
					</thead>
					<tbody>
					<?php while($val = $cm_staffing_server->fetch_object()){ ?>
					
					  <tr>
						<td class="text-center"><?php echo $val->statff_name;?></td>
					   
					  </tr>
					
					<?php } ?>
					</tbody>
				  </table>
					</div>
					
				  </div>
				  </div>
				  
				   <div class="col-lg-4 ">
				  <div class="card">
					<div class="card-header">
					<center><b>BUSBOYS</b> <br>
					</div>
					<div class="card-body">
					<br>
					<table class="table table-bordered">
					<thead>
					  <tr>
						<th scope="col"  class="text-center">Name</th>
					  </tr>
					</thead>
					<tbody>
					<?php while($val = $cm_staffing_busboy->fetch_object()){ ?>
					
					  <tr>
						<td class="text-center"><?php echo $val->statff_name;?></td>
					   
					  </tr>
						
					<?php } ?>
					</tbody>
				  </table>
					</div>
					
				  </div>
				  </div>
				  
				   <div class="col-lg-4 ">
				  <div class="card">
					<div class="card-header">
					<center><b>DISWASHERS</b> <br>
					</div>
					<div class="card-body">
					<br>
					<table class="table table-bordered">
					<thead>
					  <tr>
						<th scope="col"  class="text-center">Name</th>
					  </tr>
					</thead>
					<tbody>
					<?php while($val = $cm_staffing_dishwasher->fetch_object()){ ?>
					
					  <tr>
						<td class="text-center"><?php echo $val->statff_name;?></td>
					   
					  </tr>
					  
					<?php } ?>
					</tbody>
				  </table>
					</div>
					
				  </div>
				  </div>
				  </div>
				  
					 </div>
					</div>
					<br>
					</div>
				  </div>
				  </div>
			
            </div>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>
	
		
		
	 
  </main><!-- End #main -->

<?php include('footer.php');?>