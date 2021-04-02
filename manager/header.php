<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        require_once("dbcon.php");
    } 
if(!isset($_SESSION['uname'])){
    echo "<script>alert('Please login first');window.location = 'index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Village</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.css">
    <link rel="stylesheet" href="custom.css">


    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="dist/css/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="dist/js/jquery-1.12.4.js"></script>
    <script src="dist/js/jquery-ui.js"></script>

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">


        <header class="main-header">
            <!-- Logo -->
            <a href="home.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">TV</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>THE VILLAGE</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <!--  <img src="dist/img/logo.png" alt="User Image"> -->
                    </div>
                    <div class="pull-left info">
                        <!--  <p>Admin</p> -->
                        <!--                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="home.php"><i class="fa fa-table"></i> <span>Dashboard</span></a></li>
                    <li><a href="menu_print.php"><i class="fa fa-table"></i> <span>Menu Master</span></a></li>
                    <li><a href="table_form.php"><i class="fa fa-table"></i> <span>Tables Master</span></a></li>
                    <li><a href="parcel.php"><i class="fa fa-table"></i> <span>Parcel</span></a></li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>