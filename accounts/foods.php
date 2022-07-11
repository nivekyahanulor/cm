<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/foods.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Food Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Food</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
		<div class="col-lg-4">
			<button class="btn btn-primary btn-md"  data-bs-toggle="modal" data-bs-target="#add-food"> <i class="bi bi-clipboard-plus"></i> ADD FOOD</button>
		</div> <br> <br>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center"> Food Name</th>
                    <th scope="col"  class="text-center"> Category</th>
                    <th scope="col"  class="text-center"> Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_foods->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->category;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-food<?php echo $val->food_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-food<?php echo $val->food_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-food<?php echo $val->food_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						   <div class="row  g-3">
								<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" value="<?php echo $val->name;?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->food_id;?>" required>
							</div>
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Category: </label>
							  <select class="form-control" name="category" required>
								<option value=""> - Select Category - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_foods_category");
									while($val1 = $cm_foods_category->fetch_object()){ 
									if($val->category ==$val1->name){
								?>
								<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
								<?php } else { ?>
								<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
								<?php } } ?>
							  </select>
							</div>
							</div>
						
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="update-food">Save </button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-food<?php echo $val->food_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Food</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Food ?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->food_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-food">Delete </button>
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
	
	    <div class="modal fade" id="add-food" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Food Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
						
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Category: </label>
							  <select class="form-control" name="category" required>
								<option value=""> - Select Category - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_foods_category");
									while($val1 = $cm_foods_category->fetch_object()){ 
								?>
								<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
								<?php } ?>
							  </select>
							</div>
							
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-food">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>