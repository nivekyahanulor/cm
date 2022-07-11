<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/package-inventory.php');?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1><?php echo $_GET['package'];?> Package Inventory</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Package Inventory</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
		    <ul class="nav nav-tabs d-flex" id="myTabjustified" role="">
                <li class="nav-item flex-fill" role=""> <a href="package-inventory.php?id=<?php echo $_GET['id'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 active" >EQUIPMENT</button></a></li>
				<li class="nav-item flex-fill" role=""> <a href="package-task.php?id=<?php echo $_GET['id'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 " >TASK</button></a></li>
              </ul>
            <div class="card-body">
              <h5 class="card-title"><button class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target="#add-package"> <i class="bi bi-plus-square"></i> Add Item </button></h5>

              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center">Item Name</th>
                    <th scope="col"  class="text-center">Quantity</th>
                    <th scope="col"  class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $packages->fetch_object()){ ?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->qty;?></td>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-item<?php echo $val->package_item_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-item<?php echo $val->package_item_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-item<?php echo $val->package_item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Update Package Item</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						   <form class="row g-3" method="post">
						   <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item: </label>
							  <select class="form-control" name="item" required>
								<option value=""> - Select Item - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_inventory");
									while($val1 = $cm_foods_category->fetch_object()){ 
									if($val->item_id == $val1->item_id){
								?>
								<option value="<?php echo $val1->item_id ;?>" selected> <?php echo $val1->name;?> </option>
								<?php } else { ?>
								<option value="<?php echo $val1->item_id ;?>"> <?php echo $val1->name;?> </option>
								<?php } }?>
							  </select>
							</div>
							 <br>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity : </label>
							  <input type="text" class="form-control" name="quantity" value="<?php echo $val->qty;?>" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package_name" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_item_id;?>" required>
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
					
					 <div class="modal fade" id="delete-item<?php echo $val->package_item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Item</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Item Data?
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package_name" value="<?php echo $_GET['package'];?>" required>
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->package_item_id;?>" required>
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
                      <h5 class="modal-title">Inventory Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Item: </label>
							  <select class="form-control" name="item" required>
								<option value=""> - Select Item - </option>
								<?php 
									$cm_foods_category = $mysqli->query("SELECT * from cm_inventory");
									while($val1 = $cm_foods_category->fetch_object()){ 
								?>
								<option value="<?php echo $val1->item_id ;?>"> <?php echo $val1->name;?> </option>
								<?php } ?>
							  </select>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity : </label>
							  <input type="text" class="form-control" name="quantity" required>
							  <input type="hidden" class="form-control" name="package" value="<?php echo $_GET['id'];?>" required>
							  <input type="hidden" class="form-control" name="package_name" value="<?php echo $_GET['package'];?>" required>
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