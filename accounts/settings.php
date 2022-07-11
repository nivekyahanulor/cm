<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/staff-roles.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Staff Role Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Role</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
     <li class="nav-item" role="presentation">
        <a href="settings.php"><button class="nav-link active">Staff Roles</button></a>
     </li>
     <li class="nav-item" role="presentation">
        <a href="item-category.php"><button class="nav-link">Item Category</button></a>
     </li>
    </ul>
	<br>
    <section class="section">
      <div class="row">
		<div class="col-lg-4">
			<button class="btn btn-primary btn-md"  data-bs-toggle="modal" data-bs-target="#add-roles"> <i class="bi bi-clipboard-plus"></i> ADD ROLES</button>
		</div> <br> <br>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center"> Role Name</th>
                    <th scope="col"  class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_staff_roles->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-roles<?php echo $val->staff_roles_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-roles<?php echo $val->staff_roles_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-roles<?php echo $val->staff_roles_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Roles</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						   <br>
						   <div class="row  g-3">
								
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Role Name: </label>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->name;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->staff_roles_id ;?>" required>
							</div>
						
							</div>
							</div>
						
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="update-roles">Save </button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-roles<?php echo $val->staff_roles_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Role</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Role ?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->staff_roles_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-roles">Delete </button>
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
	
	    <div class="modal fade" id="add-roles" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Roles Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Role Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
						
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-roles">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>