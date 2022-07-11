<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/events.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>EVENTS CALENDAR</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Calendar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
	  <?php if($_SESSION['role'] ==1){?>
	    <div class="col-lg-4">
			 <button class="btn btn-primary btn-md"  data-bs-toggle="modal" data-bs-target="#add-event"> <i class="bi bi-calendar-plus"></i> ADD EVENT</button>
		</div>
	  <?php } ?>
		<br>
        <div class="row">
      
        <div class="col-lg-8">
		
          <div class="row">
		  
            <!-- Sales Card -->
            <div class="col-12">
              <div class="card info-card sales-card">
                <div class="card-body">
					<br>
					<div id="calendar"></div>
                </div>

              </div>
            </div><!-- End Sales Card -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
          

            <div class="card-body">
              <h5 class="card-title">Event Details</h5>

              <div class="activity">
				<div class="row mb-3">
				<label for="inputEmail3" class="col-sm-4 col-form-label">Event Name:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="event_name" id="event_name" readonly>
				</div>
				</div>
				
				<div class="row mb-3">
				<label for="inputEmail3" class="col-sm-4 col-form-label">Venue:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" name="event_venue" id="event_venue" readonly>
				</div>
				</div>
				<div class="row mb-3">
				<label for="inputPassword3" class="col-sm-4 col-form-label">Date:</label>
				 <div class="col-sm-8">
					<input type="date" class="form-control" name="event_date" id="event_date" min="<?php echo date('Y-m-d');?>"readonly>
				</div>
				</div>
				<div class="row mb-3">
				<label for="inputPassword3" class="col-sm-4 col-form-label">Time:</label>
					<div class="col-sm-8">
					<input type="time" class="form-control" name="event_time" id="event_time" readonly>
				</div>
				</div>
				<!---
				<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Event Type:</label>
						  <div class="col-sm-8">
							 <select class="form-control" name="event_type" id="event_types" required>
									<option value=""> - Select Event Type - </option>
									<?php
										$cm_event_type = $mysqli->query("SELECT * from cm_event_type");
											while($val11 = $cm_event_type->fetch_object()){
												echo "<option value=". $val11->type_id   .">" .  $val11->name . "</option>";
											}
									?>
							 </select>
						  </div>
				</div>
				<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Package:</label>
						  <div class="col-sm-8">
							 <select class="form-control" name="event_package" id="event_packages" required>
									<option value=""> - Select Package - </option>
									<?php
										$cm_packages = $mysqli->query("SELECT * from cm_packages");
											while($val1 = $cm_packages->fetch_object()){
												echo "<option value=". $val1->package_id  .">" .  $val1->package_name . "</option>";
											}
									?>
							 </select>
				</div>
              </div>
			  <!---->
			  <div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Notes:</label>
						  <div class="col-sm-8">
							<textarea  class="form-control" name="notes" id="notes"readonly></textarea>
						  </div>
			  </div>
			  <div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">No. of Guest:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="guest" id="guests" readonly >
						  </div>
			  </div>

            </div>
			
          </div>
          </div><!-- End Recent Activity -->

		  <div class="card">
          

            <div class="card-body">
              <h5 class="card-title">Client Details</h5>

              <div class="activity">

				<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Name:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="client_name" id="client_name" readonly>
						  </div>
				</div>
				<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Contact:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="contact_number" id="contact_number" readonly>
						  </div>
				</div>	

              </div>

            </div>
			
          </div><!-- End Recent Activity -->


        <div class="card">
          

            <div class="card-body">
              <h5 class="card-title">Payment Details</h5>

              <div class="activity">

             	<div class="row mb-3">
					<label for="inputPassword3" class="col-sm-4 col-form-label">Type:</label>
					<div class="col-sm-8">
							<input type="text" class="form-control" name="payment_type" id="payment_type" readonly>
					</div>
				</div>
				<div class="row mb-3">
					<label for="inputPassword3" class="col-sm-4 col-form-label">Status:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="payment_status" id="payment_status" readonly>
					</div>
				</div>

              </div>

            </div>
			
			
			
          </div>
			<div class="row">
			 <div class="modal-footer">
              <div id="view-plan"></div>
            </div>
			</div>
			
        </div>

      </div>
    </section>
     <div class="modal fade" id="add-event" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">ADD EVENT</h5>
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
							<input type="text" class="form-control" name="event_name">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputEmail3" class="col-sm-4 col-form-label">Venue:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="event_venue">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Date:</label>
						  <div class="col-sm-8">
							<input type="date" class="form-control" name="event_date"  min="<?php echo date('Y-m-d');?>">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Time:</label>
						  <div class="col-sm-8">
							<input type="time" class="form-control" name="event_time">
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
												echo "<option value=". $val11->type_id   .">" .  $val11->name . "</option>";
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
												echo "<option value=". $val1->package_id  .">" .  $val1->package_name . "</option>";
											}
									?>
							 </select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Notes:</label>
						  <div class="col-sm-8">
							<textarea  class="form-control" name="notes"></textarea>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">No. of Guest:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="guest" id="guest" readonly>
						  </div>
						</div>
					  </div>
					  <div class="col-sm-6">
					  <b> CLIENT DETAILS : </b> <hr>

						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Name:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="client_name">
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Contact:</label>
						  <div class="col-sm-8">
							<input type="text" class="form-control" name="contact_number">
						  </div>
						</div>
					  <b> PAYMENT DETAILS : </b> <hr>

						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Type:</label>
						  <div class="col-sm-8">
							<select type="text" class="form-control" name="payment_type">
								<option value=""> - Select Type - </option>
								<option value="CASH"> CASH </option>
								<option value="GCASH"> GCASH </option>
								<option value="BANK"> BANK </option>
							</select>
						  </div>
						</div>
						<div class="row mb-3">
						  <label for="inputPassword3" class="col-sm-4 col-form-label">Status:</label>
						  <div class="col-sm-8">
							<select type="text" class="form-control" name="payment_status">
								<option value=""> - Select Status - </option>
								<option value="50% Payment"> 50% Payment </option>
								<option value="100% Full Payment"> 100% Full Payment </option>
							</select>
						  </div>
						</div>
					  </div>
					  </div>
					</div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-events">SUBMIT </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    </div>
					</form>
                  </div>
                </div>
              </div><!-- End Vertically centered Modal-->

            </div>
  </main><!-- End #main -->
<?php include('footer.php');?>