<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

        <header class="main-header" style="background-color:white !important; position:fixed !important; width:100% !important;
  box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2) !important;
  ">

            <!-- Logo -->
            <a href="index.php" class="logo logo-bg">
                <img class='cakri-logo' src="./img/CakriPortal.png" alt="">
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" style="padding:0.5rem !important;">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
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
                    <div class="row">
                        <div class="col-md-12 latest-job margin-top-50 margin-bottom-20">
                            <h1 class="text-center">Latest Jobs</h1>
                            <div class="input-group input-group-lg">
                                <input type="text" id="searchBar" class="form-control" placeholder="Search job">
                                <span class="input-group-btn">
                                    <button id="searchBtn" type="button" class="btn btn-info btn-flat">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="candidates" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="box box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Filters</h3>
                                </div>
                                <div class="box-body no-padding">
                                    <ul class="nav nav-pills nav-stacked tree" data-widget="tree">
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> City <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="citySearch" data-target="Dhaka"><i
                                                            class="fa fa-circle-o text-yellow"></i> Dhaka</a></li>
                                                <li><a href="" class="citySearch" data-target="Chattagam"><i
                                                            class="fa fa-circle-o text-yellow"></i> Chattagam</a></li>
                                                <li><a href="" class="citySearch" data-target="Rajshahi"><i
                                                            class="fa fa-circle-o text-yellow"></i> Rajshahi</a></li>
                                                <li><a href="" class="citySearch" data-target="khulna"><i
                                                            class="fa fa-circle-o text-yellow"></i> khulna</a></li>
                                                <li><a href="" class="citySearch" data-target="Comilla"><i
                                                            class="fa fa-circle-o text-yellow"></i>Comilla</a></li>
                                                <li><a href="" class="citySearch" data-target="Barishal"><i
                                                            class="fa fa-circle-o text-yellow"></i> Barishal</a></li>
                                            </ul>
                                        </li>

                                        <!-- update
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> City <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="citySearch" data-target="Bengaluru"><i
                                                            class="fa fa-circle-o text-yellow"></i> Bengaluru</a></li>
                                                <li><a href="" class="citySearch" data-target="Navi Mumbai"><i
                                                            class="fa fa-circle-o text-yellow"></i> Navi Mumbai</a></li>
                                            </ul>
                                        </li> -->


                                        <!-- update -->
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> Experience <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="experienceSearch" data-target='1'><i
                                                            class="fa fa-circle-o text-yellow"></i> > 1 Years</a></li>
                                                <li><a href="" class="experienceSearch" data-target='2'><i
                                                            class="fa fa-circle-o text-yellow"></i> > 2 Years</a></li>
                                                <li><a href="" class="experienceSearch" data-target='3'><i
                                                            class="fa fa-circle-o text-yellow"></i> > 3 Years</a></li>
                                                <li><a href="" class="experienceSearch" data-target='4'><i
                                                            class="fa fa-circle-o text-yellow"></i> > 4 Years</a></li>
                                                <li><a href="" class="experienceSearch" data-target='5'><i
                                                            class="fa fa-circle-o text-yellow"></i> > 5 Years</a></li>
                                            </ul>
                                        </li>
                                        <!-- filter job type -->
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> Job Type <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="jobtypeSearch" data-target='full-time'><i
                                                            class="fa fa-circle-o text-yellow"></i> > full-time</a></li>
                                                <li><a href="" class="jobtypeSearch" data-target='contractual'><i
                                                            class="fa fa-circle-o text-yellow"></i> > Contractual</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- filter remote/onsite -->
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> Remote/On-site <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="onsiteSearch" data-target='remote'><i
                                                            class="fa fa-circle-o text-yellow"></i> > remote</a></li>
                                                <li><a href="" class="onsiteSearch" data-target='on-site'><i
                                                            class="fa fa-circle-o text-yellow"></i> > on-site</a></li>
                                                <li><a href="" class="onsiteSearch" data-target='hybrid'><i
                                                            class="fa fa-circle-o text-yellow"></i> > hybrid</a></li>
                                            </ul>
                                        </li>

                                        <!-- filter salary -->
                                        <li class="treeview menu-open">
                                            <a href="#"><i class="fa fa-plane text-red"></i> Salary <span
                                                    class="pull-right"><i
                                                        class="fa fa-angle-down pull-right"></i></span></a>
                                            <ul class="treeview-menu">
                                                <li><a href="" class="salarySearch" data-target=00000><i
                                                            class="fa fa-circle-o text-yellow"></i>
                                                        < 20k</a>
                                                </li>
                                                <li><a href="" class="salarySearch" data-target=20000><i
                                                            class="fa fa-circle-o text-yellow"></i> 20k-40k</a></li>
                                                <li><a href="" class="salarySearch" data-target=40000><i
                                                            class="fa fa-circle-o text-yellow"></i> 40k-60k</a></li>
                                                <li><a href="" class="salarySearch" data-target=60000><i
                                                            class="fa fa-circle-o text-yellow"></i> 60k-80k</a></li>
                                                <li><a href="" class="salarySearch" data-target=80000><i
                                                            class="fa fa-circle-o text-yellow"></i> 80-100k</a></li>
                                                <li><a href="" class="salarySearch" data-target=100000><i
                                                            class="fa fa-circle-o text-yellow"></i> > 100k</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-9">

                            <?php

                            $limit = 4;

                            $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $total_records = $row['id'];
                                $total_pages = ceil($total_records / $limit);
                            } else {
                                $total_pages = 1;
                            }

                            ?>


                            <div id="target-content">

                            </div>
                            <div class="text-center">
                                <ul class="pagination text-center" id="pagination"></ul>
                            </div>

                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer" style="margin:auto !important;

        ">

            <div style="font-size:2rem !important;
    font-weight: 400 !important;
    " class="text-center">
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
    <script src="js/adminlte.min.js"></script>
    <script src="js/jquery.twbsPagination.min.js"></script>

    <script>
    function Pagination() {
        $("#pagination").twbsPagination({
            totalPages: <?php echo $total_pages; ?>,
            visible: 5,
            onPageClick: function(e, page) {
                e.preventDefault();
                $("#target-content").html("loading....");
                $("#target-content").load("jobpagination.php?page=" + page);
            }
        });
    }
    </script>

    <script>
    $(function() {
        Pagination();
    });
    </script>

    <script>
    $("#searchBtn").on("click", function(e) {
        e.preventDefault();
        var searchResult = $("#searchBar").val();
        var filter = "searchBar";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    $(".experienceSearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "experience";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    $(".citySearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "city";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    function Search(val, filter) {
        $("#pagination").twbsPagination({
            totalPages: <?php echo $total_pages; ?>,
            visible: 5,
            onPageClick: function(e, page) {
                e.preventDefault();
                val = encodeURIComponent(val);
                $("#target-content").html("loading....");
                $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" +
                    filter);
            }
        });
    }
    </script>

    <!-- jobtype search -->
    <script>
    $(".jobtypeSearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "jobtype";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <!-- remote/onsite search -->
    <script>
    $(".onsiteSearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "onsite";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <!-- salary search -->
    <script>
    $(".salarySearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "maximumsalary";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>


</body>

</html>