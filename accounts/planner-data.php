<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/event-task.php');?>
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
		   <ul class="nav nav-tabs d-flex" id="myTabjustified" role="">
				<li class="nav-item flex-fill" role=""> <a href="planner-data.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 active" >TASK</button></a></li>
                <li class="nav-item flex-fill" role=""> <a href="planner-equipment.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 " >EQUIPMENT</button></a></li>
                <?php if($_SESSION['role'] ==1){?>
				<li class="nav-item flex-fill" role=""> <a href="planner-menu.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >MENU</button></a></li>
                <li class="nav-item flex-fill" role=""> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >TIME TABLE</button></a></li>
                <?php } ?>
				<li class="nav-item flex-fill" role=""> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role=""> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >BEO </button></a></li>
              </ul>
            <div class="card-body">
			<?php if($_SESSION['role'] ==1){?>
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-task"> <i class="bi bi-plus-square"></i> Add Task </button></h5>
			<?php } ?>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Task</th>
                    <th scope="col"  class="text-center">Date</th>
                    <th scope="col"  class="text-center">Time</th>
                    <th scope="col"  class="text-center">Staff</th>
                    <th scope="col"  class="text-center">Type</th>
                    <th scope="col"  class="text-center">Status</th>
					<?php if($_SESSION['role'] ==1){?>
                    <th scope="col"  class="text-center">Action</th>
					<?php } ?>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_event_task->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->task_name;?></td>
                    <td class="text-center"><?php echo $val->date;?></td>
                    <td class="text-center"><?php echo $val->time;?></td>
                    <td class="text-center"><?php echo $val->staff;?></td>
                    <td class="text-center"><?php echo $val->task_type;?></td>
                    <td class="text-center"><?php echo $val->status;?></td>
					<?php if($_SESSION['role'] ==1){?>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-task<?php echo $val->task_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-task<?php echo $val->task_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
					<?php } ?>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-task<?php echo $val->task_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Task Name: </label>
							  <input type="text" class="form-control" name="taskname" value="<?php echo $val->task_name;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->task_id;?>" required>
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="eventname" value="<?php echo $_GET['event'];?>" required>
							</div>
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Date : </label>
							  <input type="date" class="form-control" name="date" value="<?php echo $val->date;?>" required>
							</div>
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <input type="time" class="form-control" name="time" value="<?php echo $val->time;?>" required>
							</div>
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Staff : </label>
							  <select class="form-control" name="staff" required>
								<option value=""> - Select Staff - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_staff where role='Head Staff'");
									while($val1 = $cm_foods_category->fetch_object()){ 
									if($val->staff ==  $val1->firstname . ' '. $val1->lastname){
								?>
								<option value="<?php echo $val1->firstname . ' '. $val1->lastname;?>" selected> <?php echo $val1->firstname . ' '. $val1->lastname;?> </option>
								<?php } else { ?>
								<option value="<?php echo $val1->firstname . ' '. $val1->lastname;?>"> <?php echo $val1->firstname . ' '. $val1->lastname;?> </option>
								<?php } } ?>
							  </select>
							</div>
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Type : </label>
							  <select  class="form-control" name="tasktype" required>
							  <option value=""> - Select type - </option>
								<?php 
									$cm_task_type = $mysqli->query("SELECT * from cm_task_type");
									while($val2 = $cm_task_type->fetch_object()){ 
									if($val->task_type ==  $val2->name){
								?>
								<option value="<?php echo $val2->name;?>" selected> <?php echo $val2->name;?> </option>
								<?php } else { ?>
								<option value="<?php echo $val2->name;?>" > <?php echo $val2->name;?> </option>
								<?php } } ?>
							  </select>
							</div>
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Status : </label>
							   <select  class="form-control" name="status" required>
							   <?php if($val->status=='Pending'){?>
								<option value="Pending" selected> Pending </option>
								<option value="Finished"> Finished </option>
							   <?php } else { ?>
							    <option value="Pending"> Pending </option>
								<option value="Finished" selected > Finished </option>
							   <?php } ?>
							  </select>
							</div>
						
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-task">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-task<?php echo $val->task_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Task</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Task?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->task_id;?>" required>
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="eventname" value="<?php echo $_GET['event'];?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-task">Delete </button>
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
                      <h5 class="modal-title">Task Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Task Name: </label>
							  <input type="text" class="form-control" name="taskname" required>
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="eventname" value="<?php echo $_GET['event'];?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Date : </label>
							  <input type="date" class="form-control" name="date" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <input type="time" class="form-control" name="time" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Staff : </label>
							  <select class="form-control" name="staff" required>
								<option value=""> - Select Staff - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_staff where role='Head Staff'");
									while($val1 = $cm_foods_category->fetch_object()){ 
								?>
								<option value="<?php echo $val1->firstname . ' '. $val1->lastname;?>"> <?php echo $val1->firstname . ' '. $val1->lastname;?> </option>
								<?php } ?>
							  </select>
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-task">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>