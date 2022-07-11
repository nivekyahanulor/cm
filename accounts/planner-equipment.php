<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/event-equipment.php');?>
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
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-equipment.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 active" >EQUIPMENT</button></a></li>
                <?php if($_SESSION['role'] ==1){?>
				<li class="nav-item flex-fill" role="presentation"> <a href="planner-menu.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >MENU</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >TIME TABLE</button></a></li>
				<?php } ?>
  			    <li class="nav-item flex-fill" role="presentation"> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >BEO </button></a></li>
              </ul>
            <div class="card-body">
			<?php if($_SESSION['role'] ==1){?>
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-task"> <i class="bi bi-plus-square"></i> Add Equipment </button></h5>
			<?php } ?>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Equipment</th>
                    <th scope="col"  class="text-center">Required Quantity</th>
                    <th scope="col"  class="text-center">Current Quantity</th>
                    <th scope="col"  class="text-center">Remarks</th>
                    <th scope="col"  class="text-center">Status</th>
                    <th scope="col"  class="text-center">Returned</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_event_task->fetch_object()){ 
					  $equip =$val->equipment_name;
					?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->equipment_name;?></td>
                    <td class="text-center"><?php echo $val->qty;?></td>
                    <td class="text-center">
						<?php 
							$cm_inventory = $mysqli->query("SELECT * from cm_inventory where name ='$equip'");
							 while($val3 = $cm_inventory->fetch_object()){ 
								 $cminven = $val3->qty;
								 echo $minus   = $cminven - $val->qty;
							 }
						?>
 
					
					</td>
                    <td class="text-center">
					<?php 
					if($val->is_return ==0) {
					if($val->is_use ==1){ echo "Sufficient (In-Use)";} else {?>
						<?php if($cminven >= $val->qty ){ echo "Sufficient"; } else { echo "<font color=red> Insufficient" . "(" .  $minus .")</font>"; } ?>
					<?php } }  ?>
					</td>
                    <td class="text-center">
					<?php 
					if($val->is_return ==1){ echo '----';} else {
					if($val->is_use ==0) { echo "Idle";} else { echo "In-Use";}}?>
					</td>
                    <td class="text-center"><?php if($val->is_return ==0) { echo "---";} else { echo "Returned";}?></td>
                    <td class="text-center">
							<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-task<?php echo $val->event_equipment_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<?php if($val->is_use ==0) { ?>
							<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-task<?php echo $val->event_equipment_id;?>"> <i class="bi bi-trash"></i> </button>
						<?php } ?>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-task<?php echo $val->event_equipment_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						    <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							<input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							<input type="hidden" class="form-control" name="qty" value="<?php echo $val->qty;?>" required>
							<input type="hidden" class="form-control" name="cminven" value="<?php echo $cminven;?>" required>
							<input type="hidden" class="form-control" name="equipment_name" value="<?php echo $val->equipment_name;?>" required>
							<input type="hidden" class="form-control" name="event_equipment_id" value="<?php echo $val->event_equipment_id;?>" required>
						   <br>
						   <?php if($val->is_return ==1){?>
							EQUIPMENT RETURNED
							<br>
							RETURN DATE : <?php echo $val->date_returned;?><br>
							
						   <?php } else { if($val->is_use !=1){?>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Status : </label>
							  <select class="form-control" name="status" required>
								<option value="0"> Idle </option>
								<option value="1"> In-Use </option>
							  </select>
							</div>
						   <?php } ?>
						  <?php if($val->is_use ==1){?>
						  <div class="col-12">
							  <label for="inputNanme4" class="form-label">Return : </label>
							  <select class="form-control" name="return" required>
								<option value="0"> ---- </option>
								<option value="1"> Returned </option>
							  </select>
							</div>
						   <?php }} ?>
						   <br>
							
						
							<div class="modal-footer">
							 <?php if($val->is_return ==1){} else{?>
							<?php if($val->is_use ==1){?>
								<button type="submit" class="btn btn-primary" name="update-equipment"> Update </button>
							<?php } else { ?>
							<?php  if($cminven > $val->qty ){ ?>
								<button type="submit" class="btn btn-primary" name="update-equipment"> Update </button>
							<?php } else { ?>
								<button type="button" class="btn btn-danger">Insufficient (<?php echo $minus;?>)</button>
							<?php } }}?>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->event_equipment_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Equipment</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Equipment ?
								<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
								<input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
								<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
								<input type="hidden" class="form-control" name="qty" value="<?php echo $val->qty;?>" required>
								<input type="hidden" class="form-control" name="cminven" value="<?php echo $cminven;?>" required>
								<input type="hidden" class="form-control" name="equipment_name" value="<?php echo $val->equipment_name;?>" required>
								<input type="hidden" class="form-control" name="event_equipment_id" value="<?php echo $val->event_equipment_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-item">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
	    <div class="modal fade" id="add-task" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Equipment </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Equipment : </label>
							  <select class="form-control" name="equipment" required>
								<option value=""> - Select Equipment - </option>
								<?php 
									$cm_inventory = $mysqli->query("SELECT * from cm_inventory");
									while($val1 = $cm_inventory->fetch_object()){ 
								?>
								<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
								<?php } ?>
							  </select>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity : </label>
							  <input type="text" class="form-control" name="qty" required>
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-equipment">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>