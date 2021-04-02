

            <?php require_once("header.php"); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper"  style="background-image:url(img/food.jpg); background-size: cover;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <!--h1>
Momos
</h1-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="item_form.php">
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>Menu </h3>
                                        <h3>Master </h3>

                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                        <style>
                            .bg-red, .callout.callout-danger, .alert-danger, .alert-error, .label-danger, .modal-danger .modal-body {
                                background-color: #dd4b39b0 !important;
                            }
                        </style>
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="table_form.php">
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>Table</h3>
                                        <h3>Master</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <a href="parcel.php">
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>Parcel</h3>
                                        <h3>Master</h3>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                    <span class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></span>
                                </div>
                            </a>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php require_once("footer.php"); ?>

    </body>
</html>
