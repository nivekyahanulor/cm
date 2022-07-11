<?php include('header.php');?>
<?php include('nav.php');?>
<?php include('controller/event-menu.php');?>
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
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-equipment.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100 " >EQUIPMENT</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-menu.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  active" >MENU</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-time-table.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >TIME TABLE</button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-staffing.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >STAFFING </button></a></li>
                <li class="nav-item flex-fill" role="presentation"> <a href="planner-beo.php?id=<?php echo $_GET['id'];?>&event=<?php echo $_GET['event'];?>&package=<?php echo $_GET['package'];?> "> <button class="nav-link w-100  " >BEO </button></a></li>
              </ul>
            <div class="card-body"><br>
			<div class="row justify-content-center">
			 <div class="col-lg-8 ">
			  <div class="card">
				<div class="card-header">
				<strong>
					<?php
					
						if($_GET['package'] == 1){
								echo 'Bronze Package';
						}if($_GET['package'] == 2){
								echo 'Silver Package';
						}if($_GET['package'] == 3){
								echo 'Gold Package';
						}if($_GET['package'] == 4){
								echo 'Platinum Package';
						}
						
					?>
				</strong>
				</div>
				<div class="card-body">
				<br>
				<form class="row g-3" method="post">
				<div class="row mb-3">
				<?php 
				$row_cnt = $cm_event_menu->num_rows;
				if($row_cnt !=0){
				while($valres = $cm_event_menu->fetch_object()){ ?>
				
				<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
				<input type="hidden" class="form-control" name="package" id="package" value="<?php echo $_GET['package'];?>" required>
				<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
                  <label for="inputText" class="col-sm-2 col-form-label">Beef</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="beef" id="beef" required>
					<option value=""> - Select Beef - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Beef'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->beef == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else {
					?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pork</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pork" id="pork"  required>
					<option value=""> - Select Pork - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Pork'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->pork == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Chicken</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="chicken" id="chicken"  required>
					<option value=""> - Select Chicken - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Chicken'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->chicken == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Fish</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="fish" id="fish"  required>
					<option value=""> - Select Fish - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Fish'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->fish == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Vegetable</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="vegetable" required>
					<option value=""> - Select Vegetable - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Vegetable'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->vegetable == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				<?php if($_GET['package'] !=1){?>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pasta</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pasta" required>
					<option value=""> - Select Pasta - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Pasta'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->pasta == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				<?php } ?>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Dessert</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="dessert" required>
					<option value=""> - Select Dessert - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Dessert'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->dessert == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drinks</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="drinks" required>
					<option value=""> - Select Drinks - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Drinks'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->drinks == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php }} ?>
					</select>
                  </div>
                </div>
					 <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-menu">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
				</form>
				</div>
				
			  </div>
			  </div>
            </div>
            </div>
          </div>
		<?php }} else {?>
		
				<input type="hidden" class="form-control" name="eventid" value="<?php echo $_GET['id'];?>" required>
				<input type="hidden" class="form-control" name="package" id="package" value="<?php echo $_GET['package'];?>" required>
				<input type="hidden" class="form-control" name="event" value="<?php echo $_GET['event'];?>" required>
                  <label for="inputText" class="col-sm-2 col-form-label">Beef</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="beef" id="beef" required>
					<option value=""> - Select Beef - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Beef'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->beef == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else {
					?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pork</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pork" id="pork"  required>
					<option value=""> - Select Pork - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Pork'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->pork == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Chicken</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="chicken" id="chicken"  required>
					<option value=""> - Select Chicken - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Chicken'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->chicken == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Fish</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="fish" id="fish"  required>
					<option value=""> - Select Fish - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Fish'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->fish == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Vegetable</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="vegetable" required>
					<option value=""> - Select Vegetable - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Vegetable'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->vegetable == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				<?php if($_GET['package'] !=1){?>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Pasta</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="pasta" required>
					<option value=""> - Select Pasta - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Pasta'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->pasta == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } } ?>
					</select>
                  </div>
                </div>
				<?php } ?>
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Dessert</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="dessert" required>
					<option value=""> - Select Dessert - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Dessert'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->dessert == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php } }?>
					</select>
                  </div>
                </div>
				
				<div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Drinks</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="drinks" required>
					<option value=""> - Select Drinks - </option>
					<?php 
					$cm_inventory = $mysqli->query("SELECT * from cm_foods where category = 'Drinks'");
					while($val1 = $cm_inventory->fetch_object()){ 
					if($valres->drinks == $val1->name){
					?>
					<option value="<?php echo $val1->name;?>" selected> <?php echo $val1->name;?> </option>
					<?php } else { ?>
					<option value="<?php echo $val1->name;?>"> <?php echo $val1->name;?> </option>
					<?php }} ?>
					</select>
                  </div>
                </div>
					 <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="add-menu">Save </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
				</form>
				</div>
				
			  </div>
			  </div>
            </div>
            </div>
          </div>
		
		
		<?php } ?>
        </div>
      </div>
    </section>
	
	 
  </main><!-- End #main -->

<?php include('footer.php');?>