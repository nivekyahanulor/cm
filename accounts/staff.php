<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/staff.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Staff Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Staff</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
		<div class="col-lg-4">
			<button class="btn btn-primary btn-md"  data-bs-toggle="modal" data-bs-target="#add-staff"> <i class="bi bi-person-plus-fill"></i> ADD STAFF</button>
		</div> <br> <br>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center"> Name</th>
                    <th scope="col"  class="text-center"> Contact</th>
                    <th scope="col"  class="text-center"> Role</th>
                    <th scope="col"  class="text-center"> Status</th>
                    <th scope="col"  class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staff->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->firstname .' '. $val->lastname;?></td>
                    <td class="text-center"><?php echo $val->contact;?></td>
                    <td class="text-center"><?php echo $val->role;?></td>
                    <td class="text-center"><?php if($val->status==0){ echo  'Idle'; } else { echo 'On-Task';}?></td>
                    <td class="text-center">
						<a href="staff-data.php?name=<?php echo $val->firstname .' '. $val->lastname;?>"><button class="btn btn-success" > <i class="bi bi-clipboard-check"></i> </button></a>
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-staff<?php echo $val->staff_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-staff<?php echo $val->staff_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-staff<?php echo $val->staff_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Staff</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						   <div class="row  g-3">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">First Name: </label>
							  <input type="text" class="form-control" name="fname" value="<?php echo $val->firstname;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->staff_id;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Last Name: </label>
							  <input type="text" class="form-control" name="lname" value="<?php echo $val->lastname;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Contact: </label>
							  <input type="text" class="form-control" name="contact" value="<?php echo $val->contact;?>" required>
							</div>
							
							<div class="col-12">
								<label for="inputNanme4" class="form-label">Gender: </label>
								<select class="form-control" name="gender" required>
										<?php if($val->gender == 'Male'){?>
										<option value="Male" selected> Male </option>
										<option value="Female"> Female</option>
										<?php } else if($val->gender == 'Female'){?>
										<option value="Male" > Male </option>
										<option value="Female" selected> Female</option>
										<?php }?>
								</select>
							</div>
									
							<div class="col-12">
								<label for="inputNanme4" class="form-label">Address: </label>
								<textarea type="text" class="form-control" name="address" required><?php echo $val->address;?></textarea>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Role: </label>
							  <select class="form-control" name="role" required>
							  <?php if( $val->role == 'Head Staff'){?>
								<option value="Head Staff" selected> Head Staff </option>
								<option value="Server"> Server  </option>
								<option value="Busboy"> Busboy  </option>
								<option value="Diswasher"> Diswasher </option>
							  <?php } else if( $val->role == 'Server'){?>
							    <option value="Head Staff" > Head Staff </option>
								<option value="Server" selected> Server  </option>
								<option value="Busboy"> Busboy  </option>
								<option value="Diswasher"> Diswasher </option>
							  <?php } else if( $val->role == 'Busboy'){?>
							    <option value="Head Staff" > Head Staff </option>
								<option value="Server" > Server  </option>
								<option value="Busboy" selected> Busboy  </option>
								<option value="Diswasher"> Diswasher </option>
							  <?php } else if( $val->role == 'Diswasher'){?>
							    <option value="Head Staff" > Head Staff </option>
								<option value="Server" > Server  </option>
								<option value="Busboy" > Busboy  </option>
								<option value="Diswasher" selected> Diswasher </option>
							  <?php } ?>
							  </select>
							</div>
							</div>
						
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="update-staff">Save </button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-staff<?php echo $val->staff_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Staff</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Staff ?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->staff_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-staff">Delete </button>
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
	
	    <div class="modal fade" id="add-staff" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Staff Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							<div class="row">
								<div class="col-6">
								<br>
								PERSONAL INFORMATION <hr>
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">First Name: </label>
									  <input type="text" class="form-control" name="fname" required>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Last Name: </label>
									  <input type="text" class="form-control" name="lname" required>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Contact: </label>
									  <input type="text" class="form-control" name="contact" required>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Role: </label>
									   <select class="form-control" name="role" required>
										<option value=""> - Select Role - </option>
										<?php 
											$cm_inventory = $mysqli->query("SELECT * from cm_staff_roles");
											while($val1 = $cm_inventory->fetch_object()){ 
										?>
										<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
										<?php } ?>
									  </select>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Gender: </label>
									   <select class="form-control" name="gender" required>
										<option value=""> - Select Gender - </option>
										<option value="Male"> Male </option>
										<option value="Female"> Female</option>
									  </select>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Address: </label>
									  <textarea type="text" class="form-control" name="address" required></textarea>
									</div>
								</div>
								<div class="col-6">
								<br>
								ACCOUNT INFORMATION <hr>
								<div class="col-12">
									  <label for="inputNanme4" class="form-label">User Name: </label>
									  <input type="text" class="form-control" name="username" required>
									</div>
									
									<div class="col-12">
									  <label for="inputNanme4" class="form-label">Password: </label>
									  <input type="password" class="form-control" name="password" required>
									</div>
									
								</div>
							</div>
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-staff">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>