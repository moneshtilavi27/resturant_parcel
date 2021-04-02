<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php
            require_once("header.php"); 
            //$fdate = $_POST['fdate'];
           // $tdate = $_POST['tdate'];
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    REPORT MASTER
                </h1>
                <!--  <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Advanced Elements</li>
                    </ol> -->
            </section>
            <!--   <center>
                    <a href="table_print.php?fd=<?php echo $fdate; ?>&td=<?php echo $tdate; ?>" target="_blank" class="btn btn-primary">Print</a>
                </center> -->
            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="billdate.php" id="addform">
                            <div class="box-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail3" class="col-sm-4 control-label">From Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control pull-right" name="fdate"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail3" class="col-sm-4 control-label">To Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control pull-right" name="tdate"
                                                value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" name="save" class="btn btn-info">View</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.row -->
            </div>
            <div id="prt">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Bill No</th>
                                <th>Date</th>
                                <th>Grand Total</th>
                                <!-- <th>GST Amount</th> -->
                                <th>Net Total</th>
                                <th>Payment Mode</th>
                            </tr>
                        </thead>
                        <tbody id="tb">
                            <?php
                                    require_once("dbcon.php");
                                    if(isset($_POST['save']))
                                    {
                                    $fdate = date("Y-m-d",strtotime($_POST['fdate']));
                                     $tdate = date("Y-m-d",strtotime($_POST['tdate']));
                                    $sql = "SELECT * FROM tabletot WHERE date BETWEEN '$fdate' AND '$tdate'";
                                     $sql2 = "SELECT SUM(gndtot) AS grdtot, SUM(gstamt) AS gsttot, SUM(nettot) AS netprc  FROM tabletot WHERE date BETWEEN '$fdate' AND '$tdate'";
                                    }
                                    else{
                                        $fdate = date("Y-m-1");
                                        $tdate = date("Y-m-d");
                                    $sql = "SELECT * FROM tabletot WHERE date BETWEEN '$fdate' AND '$tdate'";
                                     $sql2 = "SELECT SUM(gndtot) AS grdtot, SUM(gstamt) AS gsttot, SUM(nettot) AS netprc  FROM tabletot WHERE date BETWEEN '$fdate' AND '$tdate'";
                                     }
                                    $result = mysqli_query($conn, $sql);
                                    $result2= mysqli_query($conn, $sql2);
                                    $res= mysqli_fetch_assoc($result2);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                            <tr>
                                <td><?php echo $row['slno']; ?></td>
                                <td><?php echo date("d-M-Y", strtotime( $row['date'])); ?></td>
                                <td><?php echo $row['gndtot']; ?></td>
                                <!-- <td><?php echo $row['gstamt']; ?></td> -->
                                <td><?php echo $row['nettot']; ?></td>
                                <td><?php echo $row['paymentmode']; ?></td>
                            </tr>
                            <?php    } }  ?>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-striped">
                        <tr style="background: #cc4b4b; color: #fff;">
                            <td colspan="2">
                                <h4>Grand Total : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <i class="fa fa-inr"></i> <?php echo $res['grdtot']; ?>
                                </h4>
                            </td>
                            <td colspan="2">
                                <h4>G.S.T :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-inr"></i>
                                    <?php echo $res['gsttot'];?></h4>
                            </td>
                            <td colspan="2">
                                <h4>Net Total : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-inr"></i>
                                    <?php echo $res['netprc'];?></h4>
                            </td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Table -->

        </section>
        <!-- /.content -->
    </div>
    </div>
    <!-- /.content-wrapper -->

    <?php require_once("footer.php"); ?>

    <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->

    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

    <script>
    $(function() {
        /* $("#example1").DataTable({
            "lengthMenu": [[25, 10, 100, -1], [25, 10, 100, "All"]]
        }); */
        $("#example1").DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [
                [25, 10, 100, -1],
                [25, 10, 100, "All"]
            ],
            buttons: [
                'print'
            ]

        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $("#example1 tbody").on('dblclick', 'tr', function() {
            var currow = $(this).closest('tr');
            var item_id = currow.find('td:eq(0)').html();
            window.location.href = 'bill_copy.php?bill_no='+item_id;
        });
    });

    $("#tb tr").hover(function() {
        $(this).css('background-color', 'yellow');
    }, function() {
        $(this).css('background-color', 'white');
    });
    </script>

</body>

</html>