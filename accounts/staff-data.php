<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/staff-data.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Staff Data -  <?php echo $_GET['name'];?></h1>
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
	
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center"> Event Name</th>
                    <th scope="col"  class="text-center"> Date </th>
                    <th scope="col"  class="text-center"> Time </th>
                    <th scope="col"  class="text-center"> Role </th>
                    <th scope="col"  class="text-center"> Event Status</th>
                    <th scope="col"  class="text-center"> Attendance</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staffing->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->event_name;?></td>
                    <td class="text-center"><?php echo $val->event_date;?></td>
                    <td class="text-center"><?php echo $val->event_time;?></td>
                    <td class="text-center"><?php echo $val->role;?></td>
                    <td class="text-center"><?php echo $val->event_status;?></td>
                    <td class="text-center"><?php if($val->is_present==0){ echo  'Absent'; } else { echo 'Present';}?></td>
                
                  </tr>
				  
				  
                <?php } ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
	
  </main><!-- End #main -->

<?php include('footer.php');?>