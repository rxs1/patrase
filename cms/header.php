<?php
    error_reporting(1);
    session_start();
  if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
  }else{
    header('Location: login.php');
    die();
  }
  require_once('connect_database.php');
  include('common_function');
?>

<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>A </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PATRASE</b> | Admin</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/admin.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">

                <p>
                  Patrase Team
                  <small>CISDe</small>
                </p>
              </li>
						
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <center>  <a href="logout.php" class="btn btn-default btn-flat">Logout</a></center>
                
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
