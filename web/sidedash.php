
<?php
include('dbconnect.php');
$id=$_SESSION['id'];

$select=mysqli_query($conn, "SELECT * FROM login WHERE id= '$id'");
$row=mysqli_num_rows($select);
$fetch=mysqli_fetch_array($select);
$surname=$fetch['surname'];
$othername=$fetch['othername'];
$name=$surname." ".$othername;

$usertype=$fetch['usertype'];

?>


<ul style="background:#2baae9;" class=" navbar-nav bg-gradient  sidebar sidebar-dark accordion " id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-45">
            <i class="fa fa-tachometer-alt fa-fw"></i>
         <img src="" class="d-block w-100 img-rounded-circle">
        </div>
        <div class="sidebar-brand-text text-dark mx-3"><?php echo strtoupper($usertype);?> DASHBORD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                            <a class="nav-link" href="#">
                                <i class="fas fa-fw fa-user-o"></i>
                                <span class=""><?php echo strtoupper($usertype);?></span></a>
                    </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->

  <?php  if($_SESSION['usertype'] ==='admin'){ ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMainMenu" aria-expanded="true" aria-controls="collapseMainMenu">
        <i class="fas fa-fw fa-user"></i>
          <span>ADMIN</span>
        </a>
        <div id="collapseMainMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Profile</h6>
            <a class="collapse-item" href="main.php">Profile</a>

            <a class="collapse-item" href="admin_viewuser.php">View Designers</a>

            <a class="collapse-item" href="admin_adduser.php">Add Designer</a>
             <a class="collapse-item" href="add_design.php">Add Design</a>
          </div>
        </div>
      </li>
 <?php
          }

         if($_SESSION['usertype'] ==='designer') {
          ?>
              
      <!-- Nav Item - Chat Collapse Menu -->
    

      <!-- Nav Item - Admin Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePanel" aria-expanded="true" aria-controls="collapsePanel">
            <i class="fa fa-bar-chart-alt fa-fw"></i>
          <span>DESIGNER</span>
        </a>
        <div id="collapsePanel" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="main.php">Profile</a>
              <a class="collapse-item" href="add_design.php">Add Designs</a>
               <a class="collapse-item" href="view_design.php">View Designs</a>

          </div>
        </div>
      </li>
    <?php
           }
      ?>
      <!-- Divider -->
      <hr class="sidebar-divider">
  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-wrench"></i>
          <span>Settings</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"></h6>
            <a class="collapse-item" href="setting.php">Change Password</a>
            <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                  Logout
                </a>
           
          </div>
        </div>
      </li>
    
      <!-- Nav Item - Pages Collapse Menu -->
     

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>


<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar notice -->
          <div class="d-none d-sm-inline-block div-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
            <p class="my-2 text-info"> <img style="height:4em; width:4em;" class="left rounded-circle" src="img/logo.png"> <span class="display-4"> Meg<span class="text-danger">Advert</span> </span></p>
          </div>
         <div class="topbar-divider d-none d-sm-block"></div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
              
                 <a class="collapse-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Excellent design!!</div>
                    <div class="small text-gray-500"> Name </div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">close</a>
              </div>
            </li>
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
                       </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="setting.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  change password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>