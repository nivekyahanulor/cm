<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/inventory.php'); error_reporting(0);?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Inventory Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Inventory</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
	  <?php if($_SESSION['role'] ==1){?>
		<div class="col-lg-4">
			<button class="btn btn-primary btn-md"  data-bs-toggle="modal" data-bs-target="#add-inventory"> <i class="bi bi-clipboard-plus"></i> ADD INVENTORY</button>
		</div> <br> <br>
	  <?php } ?>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
			
              <!-- Table with stripped rows -->
              <table class="table" id="table_id">
                <thead>
                  <tr>
                    <th scope="col"  class="text-center"> Item Name</th>
                    <th scope="col"  class="text-center"> Description</th>
                    <th scope="col"  class="text-center"> Quantity</th>
                    <th scope="col"  class="text-center"> Quantity In Use</th>
                    <th scope="col"  class="text-center"> Category</th>
                    <th scope="col"  class="text-center"> Supplier</th>
					<?php if($_SESSION['role'] ==1){?>
                    <th scope="col"  class="text-center"> Action</th>
					<?php } ?>
                  </tr>
                </thead>
                <tbody>
				<?php while($val = $cm_inventory->fetch_object()){ 
					$equip = $val->name;
				?>
				
				  <tr>
                    <td class="text-center"><?php echo $val->name;?></td>
                    <td class="text-center"><?php echo $val->description;?></td>
                    <td class="text-center"><?php echo $val->qty;?></td>
                    <td class="text-center">
						<?php 
							$cm_inventory1 = $mysqli->query("SELECT sum(qty)qty from cm_event_equipments where equipment_name ='$equip' and is_return=0 group by equipment_name ");
							 while($val3 = $cm_inventory1->fetch_object()){ 
								echo $cminven = $val3->qty;
							 }
						?>
					</td>
                    <td class="text-center"><?php echo $val->category;?></td>
                    <td class="text-center"><?php echo $val->supplier;?></td>
					<?php if($_SESSION['role'] ==1){?>
                    <td class="text-center">
						<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-inventory<?php echo $val->item_id;?>"> <i class="bi bi-pencil-square"></i> </button>
						<button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#delete-inventory<?php echo $val->item_id;?>"> <i class="bi bi-trash"></i> </button>
					</td>
					<?php } ?>
                  </tr>
				  
				  
					 <div class="modal fade" id="edit-inventory<?php echo $val->item_id;?>" tabindex="-1">
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
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <input type="text" class="form-control" name="description" value="<?php echo $val->description;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity: </label>
							  <input type="text" class="form-control" name="qty" value="<?php echo $val->qty;?>" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Category: </label>
							  <select class="form-control" name="category" required>
							  <?php if($val->category == 'Table'){?>
								<option value="Table" selected> Table </option>
								<option value="Cloth"> Cloth  </option>
								<option value="Artificials"> Artificials  </option>
								<option value="Chair"> Chair </option>
								<option value="Frames"> Frames </option>
							  <?php } else if($val->category == 'Cloth'){?>
								<option value="Table"> Table </option>
								<option value="Cloth" selected> Cloth  </option>
								<option value="Artificials"> Artificials  </option>
								<option value="Chair"> Chair </option>
								<option value="Frames"> Frames </option>
							  <?php } else if($val->category == 'Artificials'){?>
								<option value="Table"> Table </option>
								<option value="Cloth" > Cloth  </option>
								<option value="Artificials" selected> Artificials  </option>
								<option value="Chair"> Chair </option>
								<option value="Frames"> Frames </option>
							  <?php } else if($val->category == 'Chair'){?>
								<option value="Table"> Table </option>
								<option value="Cloth" > Cloth  </option>
								<option value="Artificials" > Artificials  </option>
								<option value="Chair" selected> Chair </option>
								<option value="Frames"> Frames </option>
							  <?php } else if($val->category == 'Frames'){?>
								<option value="Table"> Table </option>
								<option value="Cloth" > Cloth  </option>
								<option value="Artificials" > Artificials  </option>
								<option value="Chair" > Chair </option>
								<option value="Frames" selected> Frames </option>
							  <?php } ?>
							  </select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Supplier: </label>
							  <input type="text" class="form-control" name="supplier" value="<?php echo $val->supplier;?>" required>
							</div>
							</div>
						
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" name="update-inventory">Save </button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
							</form>
						</div>
						</div>
						</div>
					</div>
					
					 <div class="modal fade" id="delete-inventory<?php echo $val->item_id;?>" tabindex="-1">
					 <div class="modal-dialog modal-dialog-centered">
					  <div class="modal-content">
						<div class="modal-header">
						  <h5 class="modal-title">Delete Inventory</h5>
						  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
						 <form class="row g-3" method="post">
							<div class="col-12">
							 <br>
							  Are your sure to delete this Inventory ?
							  <input type="hidden" class="form-control" name="id" value="<?php echo $val->item_id;?>" required>
							</div>
						</div>
						<div class="modal-footer">
						  <button type="submit" class="btn btn-warning" name="delete-inventory">Delete </button>
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
	
	    <div class="modal fade" id="add-inventory" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered modal-md">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Inventory Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     <form class="row g-3" method="post">
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label"> Name: </label>
							  <input type="text" class="form-control" name="name" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Description: </label>
							  <input type="text" class="form-control" name="description" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Quantity: </label>
							  <input type="text" class="form-control" name="qty" required>
							</div>
							
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Category: </label>
							  <select class="form-control" name="category" required>
								<option value=""> - Select Category - </option>
								<option value="Table"> Table </option>
								<option value="Cloth"> Cloth  </option>
								<option value="Artificials"> Artificials  </option>
								<option value="Chair"> Chair </option>
								<option value="Frames"> Frames </option>
							  </select>
							</div>
							<div class="col-12">
							  <label for="inputNanme4" class="form-label">Supplier: </label>
							  <input type="text" class="form-control" name="supplier" required>
							</div>
		
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-inventory">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
					</form>
                  </div>
                </div>
        </div>
        </div>
		
		
  </main><!-- End #main -->

<?php include('footer.php');?>