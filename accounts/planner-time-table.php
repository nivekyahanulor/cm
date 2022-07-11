<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/event-time-table.php');?>
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
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  active" >TIME TABLE</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >BEO </button></a></li>
              </ul>
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-task"> <i class="bi bi-plus-square"></i> Add Time Table </button></h5>

              <!-- Table with stripped rows -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Task</th>
                    <th scope="col"  class="text-center">Time</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_event_time_table->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->time;?></td>
                    <td class="text-center"><?php echo $val->task;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-task<?php echo $val->time_table_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-task<?php echo $val->time_table_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-task<?php echo $val->time_table_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Time Table</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						     <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							  <input type="hidden" class="form-control" name="time_table_id" value="<?php echo $val->time_table_id;?>" required>
							
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <input type="time" class="form-control" name="time" value="<?php echo $val->time;?>" required>
							</div><br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Task : </label>
							  <input type="input" class="form-control" name="task" value="<?php echo $val->task;?>" required>
							</div>
							
							
						
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="update-time-table"> Update </button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-task<?php echo $val->time_table_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Data</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Data?
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							  <input type="hidden" class="form-control" name="time_table_id" value="<?php echo $val->time_table_id;?>" required>
							
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
                      <h5 class="modal-title">Add Time table </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							  <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <input type="time" class="form-control" name="time" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Task : </label>
							  <input type="input" class="form-control" name="task" required>
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-time-table">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>