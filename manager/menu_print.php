
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
              

                <!-- Main content -->
                <section class="content">
                    <!-- Table -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Item List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div id="prt">
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>
                                        <!-- <th>Type</th> -->
                                        <th>Price</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("dbcon.php");
                                
                                    
                                    $sql = "SELECT * FROM item";
                                   
                                     
                                    $result = mysqli_query($conn, $sql);
                                   // $result2= mysqli_query($conn, $sql2);
                                    //$res= mysqli_fetch_assoc($result2);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['slno']; ?></td>
                                        <td><?php echo $row['itmnam']; ?></td>
                                        <!-- <td><?php echo $row['mtype']; ?></td> -->
                                        <td><?php echo $row['prc']; ?></td>
                                       
                                       <!--  <td>
                                            #
                                            <!-- <a href="singlebill_form_db.php?billno=<?php echo $row['slno'];?>" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-print"></i>View</a> 
                                        </td> -->
                                    </tr>
                                     
                                    <?php    }
                                    }
                                    ?>
                                   
                                    
                                </tbody>
                             
                            </table>
                      
                        </div>
                    </div>
                         <!--  <button class="btn btn-info" type="submit" onclick="printcontent('prt')">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                PRINT 
                                            </button> -->
                        <!-- /.box-body -->
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
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		 <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
		 
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

        <script>
            $(function () {
               /*  $("#example1").DataTable({
                    "lengthMenu": [[25, 10, 100, -1], [25, 10, 100, "All"]],
					
                }); */
				
				
				$("#example1").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[25, 10, 100, -1], [25, 10, 100, "All"]],
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
                    "autoWidth": false,
                });
            });
        </script>



        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                    {
                        ranges: {
                            'Today': [moment(), moment()],
                            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                            'This Month': [moment().startOf('month'), moment().endOf('month')],
                            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate: moment()
                    },
                    function (start, end) {
                        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
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
        </script>
    </body>
</html>
