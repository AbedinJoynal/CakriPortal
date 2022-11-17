<?php

session_start();

if(empty($_SESSION['id_admin'])) {
  header("Location: index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Job Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->

  <link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <link rel="stylesheet" href="../css/_all-skins.min.css">
  <!-- Custom -->
  <link rel="stylesheet" href="../css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

<header class="main-header" style="background-color:white !important; position:fixed !important; width:100% !important;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2) !important;
  ">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <img class='cakri-logo' src="../img/CakriPortal.png" alt="">
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="padding:0.5rem !important">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                   
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="box box-solid">
              <div style="margin-top:5rem !important" class="box-header with-border">
                <h3 class="box-title">Welcome <b>Admin</b></h3>
              </div>
              <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li><a href="active-jobs.php"><i class="fa fa-briefcase"></i> Active Jobs</a></li>
                  <li><a href="applications.php"><i class="fa fa-address-card-o"></i> Applications</a></li>
                  <li><a href="companies.php"><i class="fa fa-building"></i> Companies</a></li>
                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right"></i> Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div style="margin-top:5rem !important" class="col-md-9 bg-white padding-2">

            <h3>Job Portal Statistics</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Active Company Registered</span>
                    <?php
                      $sql = "SELECT * FROM company WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-red"><i class="ion ion-briefcase"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Company Approval</span>
                    <?php
                      $sql = "SELECT * FROM company WHERE active='2'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                    
                  </div>
                </div>                
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Registered Candidates</span>
                    <?php
                      $sql = "SELECT * FROM users WHERE active='1'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-green"><i class="ion ion-person-stalker"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Pending Candidates Confirmation</span>
                    <?php
                      $sql = "SELECT * FROM users WHERE active='0'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-person-add"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Job Posts</span>
                    <?php
                      $sql = "SELECT * FROM job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box bg-c-yellow">
                  <span class="info-box-icon bg-yellow"><i class="ion ion-ios-browsers"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">Total Applications</span>
                    <?php
                      $sql = "SELECT * FROM apply_job_post";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0) {
                        $totalno = $result->num_rows;
                      } else {
                        $totalno = 0;
                      }
                    ?>
                    <span class="info-box-number"><?php echo $totalno; ?></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

    

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="margin-left: 0px;">
  <div
    style="font-size:2rem !important;
    font-weight: 400 !important;
    "
    class="text-center">
      <strong>Copyright &copy; 2022 <a href="index.php">Cakri Portal</a>.</strong> All rights
    reserved.
    </div>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
</body>
</html>
