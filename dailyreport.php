<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php
            require_once("header.php"); 
            // $fdate = $_POST['fdate'];
            // $tdate = $_POST['tdate'];
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Item Wise Report
                </h1>
                <!--  <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Advanced Elements</li>
                    </ol> -->
            </section>
            <!--   <center>
                    <a href="table_print.php?fd=<?php echo $fdate; ?>&td=<?php echo $tdate; ?>" target="_blank" class="btn btn-primary">Print</a>
                </center> -->


            <!-- Main content -->
            <section class="content">
                <!-- form start -->
                <form class="form-horizontal" method="post" id="addform">
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="inputEmail3" class="col-sm-4 control-label">From Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control pull-right" name="fdate" id="fdate"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="inputEmail3" class="col-sm-4 control-label">To Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control pull-right" name="tdate" id="tdate"
                                        value="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" name = "save" class="btn btn-info">View</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>
                <!-- Table -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Item List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div id="prt">
                        <div class="box-body" id="res">
                            <?php
                            echo "<table id='example1' class='table table-bordered table-striped'>
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Total Qty Per Item</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>";
								
								
								require_once("dbcon.php");
                                if(isset($_POST['save']))
                                {
                                $status = true;
                                $fdate = date("Y-m-d",strtotime($_POST['fdate']));
                                 $tdate = date("Y-m-d",strtotime($_POST['tdate']));
                                 $sql_item_name = "SELECT DISTINCT `itmno` FROM `tabledata` WHERE `date` BETWEEN '$fdate' AND '$tdate';";
                                }
                                else{
                                    $status = false;
                                    $sql_item_name = "SELECT DISTINCT `itmno` FROM `tabledata`";
                                }
								$result = mysqli_query($conn, $sql_item_name);
                                if (mysqli_num_rows($result) > 0) 
								{
									while($row = mysqli_fetch_assoc($result)) 
									{
										//echo $i."=>".$row['itmnam']."<br>";
										$item = $row['itmno'];
                                        if($status==true)
                                        {
                                            $sql = "SELECT sum(qty) AS total_qty,itmnam FROM tabledata where itmno='$item' AND `date` BETWEEN '$fdate' AND '$tdate';"; 
                                        }else
                                        {
                                            $sql = "SELECT sum(qty) AS total_qty,itmnam FROM tabledata where itmno='$item'";
                                        }
										
										$result1 = mysqli_query($conn, $sql);
										if (mysqli_num_rows($result1) > 0) 
										{
											while($row1 = mysqli_fetch_assoc($result1)) 
											{
												$item = $row1['itmnam'];
												$total_qty = $row1['total_qty'];
												echo "<tr>
												<td>$item</td>
												<td>$total_qty</td>
												</tr>";
											 
											}
										}
										
									}
								}
								
                                echo "</tbody></table>";
								?>
                        </div>
                    </div>

                </div>
                <!-- End Table -->

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
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.16/api/sum().js"></script>

    <script>
    $(function() {
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

        /* //var table = $('#example1').DataTable();
        //table.column( 1 ).data().sum();
          // Insert the sum of a column into the columns footer, for the visible
          // data on each draw
          $('#example1').DataTable( {
        	drawCallback: function () {
        	  var api = this.api();
        	  $( api.table().footer() ).html(
        		api.column( 2, {page:'current'} ).data().sum()
        	  );
        	}
          } ); */


    });
    </script>



    <script>
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {
            "placeholder": "dd/mm/yyyy"
        });
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {
            "placeholder": "mm/dd/yyyy"
        });
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        });
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'));
            }
        );

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
        $('#datepicker1').datepicker({
            autoclose: true
        });

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
            showInputs: false
        });
    });


    function getitemlist() {
        var fdate = $("#fdate").val();
        var tdate = $("#tdate").val();
        //alert(id,name);
        $.ajax({
            type: "POST",
            url: "getitemlist.php",
            data: {
                fdate: fdate,
                tdate: tdate
            },
            success: function(result) {
                $("#res").html(result);
            }
        });
    }
    </script>
</body>

</html>