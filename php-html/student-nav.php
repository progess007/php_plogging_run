<!-- Page Wrapper -->
<div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">
   
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow"
          style="position: fixed; top:0; width:100%; z-index: 1020;">

     <!-- Sidebar Toggle (Topbar) -->
      <a href="./student" class="nav-link text-s mr-4">
        Dashboard นักศึกษา
      </a>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-lg-inline text-gray-600 small">
              <?php echo $row['m_name']." &nbsp;&nbsp;".$row['m_lastname'] ?>
            </span>
            <img 
             class="img-profile rounded-circle"
             src="<?php echo $row['m_img'] ?>"
            >
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalProfile">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalHistory">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Activity Log
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" onclick="logout()">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
            
          </div>
        </li>

      </ul>

    </nav>
<!-- End of Topbar -->

    <div class="jjj p-3" style="margin-top: 70px;">
      <div class="ccc">
        <h1 class="display-4 text-c2 font-weight-bold">UBU Green Club</h1>
        <p class="lead font-weight-bold">plogging new normal.</p>
      </div>
    </div>
    
  <!-- Begin Page Content -->
  <div class="container-fluid mt-4">