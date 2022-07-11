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
                <?php if($_SESSION['role'] ==1){?>
				<li class="nav-item flex-fill" role="presentation"> <a href="planner-menu.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >MENU</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >TIME TABLE</button></a></li>
                <?php } ?>
				<li class="nav-item flex-fill" role="presentation"> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  active" >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >BEO </button></a></li>
              </ul>
            <div class="card-body"><br>
			<div class="row justify-content-center">
			
			 <div class="col-lg-4 ">
			  <div class="card">
				<div class="card-header">
				<center><b>SERVERS</b> <br>
				<?php if($_SESSION['role'] ==1){?>
				<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-server"> ADD </button></center>
				<?php } ?>
				</div>
				<div class="card-body">
				<br>
				<table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Attendance</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staffing_server->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->statff_name;?></td>
                    <td class="text-center"><?php if($val->is_present==1){ echo 'Present';} else if($val->is_present==2){echo 'Absent';}else { echo '--';}?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Staff Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						      <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $val->statff_name;?>" required>
							
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <select class="form-control" name="attendance" required>
								<?php if($val->is_present==1){?>
								<option value="1" selected> Present </option>
								<option value="2"> Absent </option>
								<?php } else if($val->is_present ==2){?>
								<option value="1" > Present </option>
								<option value="2" selected> Absent </option>
								<?php } else {?>
								<option value="" selected> - Select Attendance - </option>
								<option value="1" > Present </option>
								<option value="2" > Absent </option>	
								<?php } ?>
							  </select>
							</div><br>
							
							
						
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="update-attendance-server"> Update </button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-staff-server">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
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
				<?php if($_SESSION['role'] ==1){?>
				<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-busboy"> ADD </button></center>
				<?php } ?>
				</div>
				<div class="card-body">
				<br>
				<table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Attendance</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staffing_busboy->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->statff_name;?></td>
                    <td class="text-center"><?php if($val->is_present==1){ echo 'Present';} else if($val->is_present==2){echo 'Absent';}else { echo '--';}?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Staff Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						      <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $val->statff_name;?>" required>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <select class="form-control" name="attendance" required>
								<?php if($val->is_present==1){?>
								<option value="1" selected> Present </option>
								<option value="2"> Absent </option>
								<?php } else if($val->is_present ==2){?>
								<option value="1" > Present </option>
								<option value="2" selected> Absent </option>
								<?php } else {?>
								<option value="" selected> - Select Attendance - </option>
								<option value="1" > Present </option>
								<option value="2" > Absent </option>	
								<?php } ?>
							  </select>
							</div><br>
							
							
						
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="update-attendance-busboy"> Update </button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-staff-busboy">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
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
				<?php if($_SESSION['role'] ==1){?>
				<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#add-dishwashers"> ADD </button></center>
				<?php } ?>
				</div>
				<div class="card-body">
				<br>
				<table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Name</th>
                    <th scope="col"  class="text-center">Attendance</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staffing_dishwasher->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->statff_name;?></td>
                    <td class="text-center"><?php if($val->is_present==1){ echo 'Present';} else if($val->is_present==2){echo 'Absent';}else { echo '--';}?></td>
                    <td class="text-center">
						<button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#delete-staff-server<?php echo $val->staffing_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
					 <div class="modal fade" id="edit-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Staff Status</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						      <input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							  <input type="hidden" class="form-control" name="name" value="<?php echo $val->statff_name;?>" required>
							<br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Time : </label>
							  <select class="form-control" name="attendance" required>
								<?php if($val->is_present==1){?>
								<option value="1" selected> Present </option>
								<option value="2"> Absent </option>
								<?php } else if($val->is_present ==2){?>
								<option value="1" > Present </option>
								<option value="2" selected> Absent </option>
								<?php } else {?>
								<option value="" selected> - Select Attendance - </option>
								<option value="1" > Present </option>
								<option value="2" > Absent </option>	
								<?php } ?>
							  </select>
							</div><br>
							
							
						
							<div class="modal-footer">
							<button type="submit" class="btn btn-primary" name="update-attendance-diswasher"> Update </button>
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
						</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-staff-server<?php echo $val->staffing_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="staffing_id" value="<?php echo $val->staffing_id;?>" required>
							
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-staff-diswasher">Delete </button>
						  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
						</form>
					  </div>
					</div>
					</div>
                <?php } ?>
                </tbody>
              </table>
				</div>
				
			  </div>
			  </div>
			  
			  
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	
	    <div class="modal fade" id="add-server" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Server Staff</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							<input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Staff Name: </label>
							   <select class="form-control" name="name" required>
								<option value=""> - Select Staff - </option>
								<?php 
									$cm_inventory = $mysqli->query("SELECT * from cm_staff where role='Server' and status=0");
									while($val1 = $cm_inventory->fetch_object()){ 
								?>
								<option value="<?php echo $val1->firstname.' '. $val1->lastname;?>"> <?php echo $val1->firstname.' '. $val1->lastname;?> </option>
								<?php } ?>
							  </select>
							</div>
							
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-server">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		 <div class="modal fade" id="add-busboy" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Busboy Staff</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							<input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Staff Name: </label>
							   <select class="form-control" name="name" required>
								<option value=""> - Select Staff - </option>
								<?php 
									$cm_inventory = $mysqli->query("SELECT * from cm_staff where role='Busboy' and status=0");
									while($val1 = $cm_inventory->fetch_object()){ 
								?>
								<option value="<?php echo $val1->firstname.' '. $val1->lastname;?>"> <?php echo $val1->firstname.' '. $val1->lastname;?> </option>
								<?php } ?>
							  </select>
							</div>
							
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-busboy">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		 <div class="modal fade" id="add-dishwashers" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Dishwashers Staff</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
							<input type="hidden" class="form-control" name="package" value="<?php echo $_GET['package'];?>" required>
							<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Staff Name: </label>
							   <select class="form-control" name="name" required>
								<option value=""> - Select Staff - </option>
								<?php 
									$cm_inventory = $mysqli->query("SELECT * from cm_staff where role='Diswasher' and status=0");
									while($val1 = $cm_inventory->fetch_object()){ 
								?>
								<option value="<?php echo $val1->firstname.' '. $val1->lastname;?>"> <?php echo $val1->firstname.' '. $val1->lastname;?> </option>
								<?php } ?>
							  </select>
							</div>
							
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-diswasher">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
	 
  </main><!-- End #main -->

<?php include('footer.php');?>