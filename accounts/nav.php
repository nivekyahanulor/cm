
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color:#e87cd0">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block"><center>CREATIVE MOMENTS <small> CATERING SERVICES </small></center></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

   
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['user'];?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['name'];?></h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

          
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background-color:#ffe0fc;">

    <ul class="sidebar-nav" id="sidebar-nav">
					<?php
                    error_reporting(0);

                    $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
                    $uri_segments = explode('/', $uri_path);

                    $page =  $uri_segments[3];

                    if ($page == 'index.php') {
                        $index = 'active';
                        $planner = 'collapsed';
                        $staff = 'collapsed';
                        $inventory = 'collapsed';
                        $foods = 'collapsed';
                        $packages = 'collapsed';
                        $settings = 'collapsed';
                    } else if ($page == 'planner.php' || $page == 'planner-data.php' || $page == 'planner-equipment.php' || $page == 'planner-menu.php' || $page == 'planner-time-table.php' || $page == 'planner-staffing.php' || $page == 'planner-beo.php' ) {
                        $index = 'collapsed';
                        $planner = 'active';
                        $staff = 'collapsed';
                        $inventory = 'collapsed';
                        $foods = 'collapsed';
                        $packages = 'collapsed';
                        $settings = 'collapsed';
                    } else if ($page == 'staff.php' || $page == 'staff-data.php') {
                        $staff = 'active';
                        $planner = 'collapsed';
                        $index = 'collapsed';
                        $inventory = 'collapsed';
                        $foods = 'collapsed';
                        $packages = 'collapsed';
                        $settings = 'collapsed';
                    } else if ($page == 'inventory.php') {
                        $inventory = 'active';
						$staff = 'collapsed';
                        $planner = 'collapsed';
                        $index = 'collapsed';
                        $foods = 'collapsed';
                        $packages = 'collapsed';
                        $settings = 'collapsed';
                    }  else if ($page == 'foods.php') {
                        $foods = 'active';
						$inventory = 'collapsed';
						$staff = 'collapsed';
                        $planner = 'collapsed';
                        $index = 'collapsed';
                        $packages = 'collapsed';
                        $settings = 'collapsed';
                    } else if ($page == 'packages.php' || $page =='package-inventory.php') {
                        $packages = 'active';
                        $foods = 'collapsed';
						$inventory = 'collapsed';
						$staff = 'collapsed';
                        $planner = 'collapsed';
                        $index = 'collapsed';
                        $settings = 'collapsed';
                    }  else if ($page == 'settings.php') {
                        $settings = 'active';
                        $packages = 'collapsed';
                        $foods = 'collapsed';
						$inventory = 'collapsed';
						$staff = 'collapsed';
                        $planner = 'collapsed';
                        $index = 'collapsed';
                    } 


                    ?>
      <li class="nav-item">
        <a class="nav-link <?php echo $index;?>" href="index.php">
          <i class="bi bi-calendar2-event"></i>
          <span> CALENDAR </span>
        </a>
      </li>
	
	  <li class="nav-item">
        <a class="nav-link <?php echo $planner;?>" href="planner.php">
          <i class="bi bi-list-check"></i>
          <span> PLANNER </span>
        </a>
      </li>

	  <li class="nav-item">
        <a class="nav-link <?php echo $staff;?>" href="staff.php">
          <i class="bi bi-person-square"></i>
          <span> STAFF </span>
        </a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link <?php echo $inventory;?>" href="inventory.php">
          <i class="bi bi-server"></i>
          <span> INVENTORY </span>
        </a>
      </li>
	  
	  <li class="nav-item">
        <a class="nav-link <?php echo $foods;?>" href="foods.php">
          <i class="bi bi-suit-heart"></i>
          <span> FOODS </span>
        </a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link <?php echo $packages;?>" href="packages.php">
          <i class="bi bi-bookmark-heart"></i>
          <span> PACKAGES </span>
        </a>
      </li>
	  <?php if($_SESSION['role'] ==1){?>
	  <li class="nav-item">
        <a class="nav-link  <?php echo $settings;?>" href="settings.php">
          <i class="bi bi-gear"></i>
          <span> SETTINGS </span>
        </a>
      </li>
      <?php } ?>
		<li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-graph-up"></i>
          <span> REPORTS </span>
        </a>
      </li>
	  
	   <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span> SIGN OUT </span>
        </a>
      </li>
    
    </ul>

  </aside><!-- End Sidebar-->
