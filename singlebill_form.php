<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php require_once("header.php"); ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <!-- Table -->
                <div class="box" style="margin:-15px;">
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Horizontal Form -->

                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" method="post" action="singlebill_form_db.php" id="addform">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Bill No</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control pull-right" name="billno">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <center>
                                                <button type="submit" class="btn btn-info">View</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
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
                                    $sn=0;
                                    $sql = "SELECT * FROM `tabletot` ORDER BY `slno` DESC;";
                                     $sql2 = "SELECT SUM(gndtot) AS grdtot, SUM(gstamt) AS gsttot, SUM(nettot) AS netprc  FROM tabletot ORDER BY `slno` DESC";
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
                </div>
            </div>
                </div>

            </section>
            <!-- /.content -->
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

    <script>
    $(function() {
        $("#example1").DataTable({
            "lengthMenu": [
                [25, 10, 100, -1],
                [25, 10, 100, "All"]
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