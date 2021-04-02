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
             <li><a href="item_form.php"><i class="fa fa-table"></i> <span>Menu Master</span></a></li>
            <li><a href="table_form.php"><i class="fa fa-table"></i> <span>Tables Master</span></a></li>
            <li><a href="parcel.php"><i class="fa fa-table"></i> <span>Parcel</span></a></li>
        
<?php
if($_SESSION['user_type'] != "captain")
{
?>
  <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Store Inventory</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                   <li><a href="add_prodct1.php"><i class="fa fa-circle-o"></i> Create Product</a></li>
                    <li><a href="store_form.php"><i class="fa fa-circle-o"></i> Purchase Item</a></li>
                    <li><a href="kitchen_form.php"><i class="fa fa-circle-o"></i> Kitchen Inventory</a></li>
                    <!--<li><a href="kitchen2_form.php"><i class="fa fa-circle-o"></i> Kitchen 2 Inventory</a></li>-->
                    <li><a href="stockavilable.php"><i class="fa fa-circle-o"></i> View Stock</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Reports</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="singlebill_form.php"><i class="fa fa-circle-o"></i> Single Bill</a></li>
                    <li><a href="billdate.php"><i class="fa fa-circle-o"></i> Bill Datewise</a></li>
                </ul>
            </li>

                 <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Employees</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="empreg.php"><i class="fa fa-circle-o"></i>Registration</a></li>
                    <!-- <li class="active"><a href="empatt.php"><i class="fa fa-circle-o"></i>Attendance</a></li>
                    <li class="active"><a href="attrecds.php"><i class="fa fa-circle-o"></i>Attendance Records</a></li>
                    <li class="active"><a href="advancesal.php"><i class="fa fa-circle-o"></i>Advance</a></li>
                    <li class="active"><a href="salrecords.php"><i class="fa fa-circle-o"></i>Salary Records</a></li>
                    <!--                    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>-->
                </ul>
            </li>
             <li><a href="menu_print.php"><i class="fa fa-table"></i> <span>Menu Master Records</span></a></li>
			 <!--<li><a href="addCharges.php"><i class="fa fa-table"></i> <span>Add GST</span></a></li>-->
            <!-- <li><a href="addSrCharges.php"><i class="fa fa-table"></i> <span>Add Service Charges</span></a></li>-->
             <li><a href="dailyreport.php"><i class="fa fa-table"></i> <span>Item Wise Report</span></a></li>
             <li><a href="manager_report.php"><i class="fa fa-table"></i> <span>Manager Report</span></a></li>
			 <?php
}
			 ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>