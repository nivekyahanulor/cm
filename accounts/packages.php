<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/packages.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Packages Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Packages</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-package"> <i class="bi bi-plus-square"></i> Add Package </button></h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Package Name</th>
                    <th scope="col"  class="text-center">Package Pax</th>
                    <th scope="col"  class="text-center">Package Price</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $packages->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->package_name;?></td>
                    <td class="text-center"><?php echo $val->package_pax;?></td>
                    <td class="text-center"><?php echo number_format($val->package_price,2);?></td>
                    <td class="text-center">
						<a href="package-inventory.php?id=<?php echo $val->package_id ;?>&package=<?php echo $val->package_name ;?>"><button class="btn btn-success" > <i class="bi bi-clipboard-check"></i> </button></a>
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->package_id ;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->package_id ;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->package_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Name: </label>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_id;?>" required>
							  <input type="text" class="form-control" name="package_name" value="<?php echo $val->package_name;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Pax: </label>
							  <input type="text" class="form-control" name="package_pax" value="<?php echo $val->package_pax;?>" required>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Price: </label>
							  <input type="text" class="form-control" name="package_price" value="<?php echo $val->package_price;?>"  required>
							</div>
								<div class="modal-footer">
								  <button type="submit" class="btn btn-primary" name="update-item">Save </button>
								  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								</div>
								</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-item<?php echo $val->package_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Package</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Package?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_id;?>" required>
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
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Package Price: </label>
							  <input type="text" class="form-control" name="package_price" required>
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