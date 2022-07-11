<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/events.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Event Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Event</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Event Name</th>
                    <th scope="col"  class="text-center">Date</th>
                    <th scope="col"  class="text-center">Time</th>
                    <th scope="col"  class="text-center">Contact</th>
                    <th scope="col"  class="text-center">Event Status</th>
                    <th scope="col"  class="text-center">Payment Status</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_events->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->event_name;?></td>
                    <td class="text-center"><?php echo $val->event_date;?></td>
                    <td class="text-center"><?php echo $val->event_time;?></td>
                    <td class="text-center"><?php echo $val->contact_number;?></td>
                    <td class="text-center"><?php echo $val->event_status;?></td>
                    <td class="text-center"><?php echo $val->payment_status;?></td>
                    <td class="text-center">
						<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-event<?php echo $val->event_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<a href="planner-data.php?id=<?php echo $val->event_id;?>&event=<?php echo $val->event_name;?>&package=<?php echo $val->event_package ;?>"><button class="btn btn-success" > <i class="bi bi-clipboard-check"></i> </button></a>
						 <?php if($_SESSION['role'] ==1){?>
							<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->event_id;?>"> <i class="bi bi-trash"></i> </button>
						 <?php } ?>
					</td>
                  </tr>
				  
				  
			  <div class="modal fade" id="add-event<?php echo $val->event_id;?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">EDIT EVENT</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
					<div class="row">
					  <div class="col-sm-6">
					  <b> EVENT DETAILS : </b> <hr>
					  <form method="POST">
						<div class="row mb-3">
						  <label for="inputEmail3" class="col-sm-4 col-form-label">Event Name:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="event_name" value="<?php echo $val->event_name;?>">
							<input type="hidden" class="form-control" name="event_id" value="<?php echo $val->event_id;?>">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputEmail3" class="col-sm-4 col-form-label">Venue:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="event_venue" value="<?php echo $val->event_venue;?>">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Date:</label>
						  <div class="col-sm-8">
							<input type="date" class="form-control" name="event_date" value="<?php echo $val->event_date;?>" >
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Time:</label>
						  <div class="col-sm-8">
							<input type="time" class="form-control" name="event_time" value="<?php echo $val->event_time;?>">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Event Type:</label>
						  <div class="col-sm-8">
							 <select class="form-control" name="event_type" required>
									<option value=""> - Select Event Type - </option>
									<?php
										$cm_event_type = $mysqli->query("SELECT * from cm_event_type");
											while($val11 = $cm_event_type->fetch_object()){
												if($val->event_type==$val11->type_id){
												echo "<option value=". $val11->type_id   ." selected>" .  $val11->name . "</option>";
												} else {
												echo "<option value=". $val11->type_id   .">" .  $val11->name . "</option>";
												}
											}
									?>
							 </select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Package:</label>
						  <div class="col-sm-8">
							 <select class="form-control" name="event_package" id="event_package" required>
									<option value=""> - Select Package - </option>
									<?php
										$cm_packages = $mysqli->query("SELECT * from cm_packages");
											while($val1 = $cm_packages->fetch_object()){
												if($val->event_package==$val1->package_id){
												echo "<option value=". $val1->package_id  ." selected>" .  $val1->package_name . "</option>";
												} else {
												echo "<option value=". $val1->package_id  .">" .  $val1->package_name . "</option>";
												}
											}
									?>
							 </select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Notes:</label>
						  <div class="col-sm-8">
							<textarea  class="form-control" name="notes"><?php echo $val->notes;?></textarea>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">No. of Guest:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="guest" id="guest" value="<?php echo $val->guest;?>" readonly>
						  </div>
						</div>
					  </div>
					  <div class="col-sm-6">
					  <b> CLIENT DETAILS : </b> <hr>

						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Name:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="client_name" value="<?php echo $val->client_name;?>">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Contact:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="contact_number" value="<?php echo $val->contact_number;?>">
						  </div>
						</div>
					  <b> PAYMENT DETAILS : </b> <hr>

						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Type:</label>
						  <div class="col-sm-8">
							<select type="text" class="form-control" name="payment_type">
								<?php if($val->payment_type=='CASH'){?>
								<option value="CASH" selected> CASH </option>
								<option value="GCASH"> GCASH </option>
								<option value="BANK"> BANK </option>
								<?php } else if($val->payment_type=='GCASH'){?>
								<option value="CASH" > CASH </option>
								<option value="GCASH" selected> GCASH </option>
								<option value="BANK"> BANK </option>
								<?php } else if($val->payment_type=='BANK'){?>
								<option value="CASH" > CASH </option>
								<option value="GCASH" > GCASH </option>
								<option value="BANK" selected> BANK </option>
								<?php } ?>
							</select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Payment Status:</label>
						  <div class="col-sm-8">
							<select type="text" class="form-control" name="payment_status">
								<?php if($val->payment_status == '50% Payment'){?>
									<option value="50% Payment" selected> 50% Payment </option>
									<option value="100% Full Payment"> 100% Full Payment </option>
								<?php } else  if($val->payment_status == '100% Full Payment'){?>
									<option value="50% Payment" > 50% Payment </option>
									<option value="100% Full Payment" selected> 100% Full Payment </option>
								<?php } ?>
							</select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Event Status:</label>
						  <div class="col-sm-8">
							<select type="text" class="form-control" name="event_status">
								<?php if($val->event_status == 'Pending'){?>
									<option value="Pending" selected> Pending </option>
									<option value="On-Going"> On-Going </option>
									<option value="Finished"> Finished </option>
								<?php } else if($val->event_status == 'On-Going'){?>
									<option value="Pending"> Pending </option>
									<option value="On-Going" selected> On-Going </option>
									<option value="Finished"> Finished </option>
								<?php } else if($val->event_status == 'Finished'){?>
									<option value="Pending"> Pending </option>
									<option value="On-Going" > On-Going </option>
									<option value="Finished" selected> Finished </option>
								<?php } else {?>
									<option value="Pending"> Pending </option>
									<option value="On-Going" > On-Going </option>
									<option value="Finished" > Finished </option>
								<?php } ?>
							</select>
						  </div>
						</div>
					  </div>
					  </div>
					</div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="update-events">UPDATE </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
					</form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

            </div>
					 <div class="modal fade" id="delete-item<?php echo $val->event_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Event</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Event?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->event_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-event">Delete </button>
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
	
	    <div class="modal fade" id="add-package" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Package Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Name: </label>
							  <input type="text" class="form-control" name="package_name" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Pax: </label>
							  <input type="text" class="form-control" name="package_pax" required>
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-package">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>