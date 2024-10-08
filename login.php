<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
  header("Location: index.php");
  exit();
}

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
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body class="hold-transition skin-green sidebar-mini"

>
    <div class="wrapper"
   >
     <header class="main-header" 
     style="background-color:white !important; position:fixed !important; width:100% !important;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2) !important;"
  >

            <!-- Logo -->
            <a href="index.php" class="logo logo-bg">
                <img class='cakri-logo' src="./img/CakriPortal.png" alt="">
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav style="padding:0.5rem !important;" class="navbar navbar-static-top">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="jobs.php">Jobs</a>
                        </li>
                        <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="sign-up.php">Sign Up</a>
                        </li>
                        <?php } else {

              if (isset($_SESSION['id_user'])) {
              ?>
                        <li>
                            <a href="user/index.php">Dashboard</a>
                        </li>
                        <?php
              } else if (isset($_SESSION['id_company'])) {
              ?>
                        <li>
                            <a href="company/index.php">Dashboard</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row latest-job margin-top-50 margin-bottom-20">
                        <h1 class="text-center margin-bottom-20 animate__bounce" style="font-family:Arial Black">Login
                            here</h1>
                        <div class="col-md-6 latest-job ">
                            <div class="small-box bg-yellow padding-5">
                                <div class="inner">
                                    <h3 class="text-center">Candidates Login</h3>
                                </div>
                                <a href="login-candidates.php" class="small-box-footer">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 latest-job ">
                            <div class="small-box bg-red padding-5">
                                <div class="inner">
                                    <h3 class="text-center">Company Login</h3>
                                </div>
                                <a href="login-company.php" class="small-box-footer">
                                    Login <i class="fa fa-arrow-circle-right"></i>
                                </a>
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
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
</body>

</html>