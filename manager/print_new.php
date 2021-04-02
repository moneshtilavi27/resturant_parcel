<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php require_once("header.php"); ?>

        <?php
            $tabno = $_GET['tabno'];
            $tabsec = $_GET['tabsec'];
            $billno = $_GET['billno'];
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="main-content">
                    <div class="main-content-inner">
                        <div class="page-content">
                            <div class="row">
                                <div class="space-4"></div>
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <!-- div.table-responsive -->
                                        <!-- div.dataTables_borderWrap -->
                                        <center>
                                            <div id="prt">
                                                <!--<table id="dynamic-table" class="table table-striped table-bordered table-hover">-->
                                                <table width="320" cellpadding="0" cellspacing="0">
                                                    <thead>
                                                        <caption>
                                                            <h3 align="center" style="color: red;">THE VILLAGE
                                                            </h3>
                                                        </caption>
                                                        <thead>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <p style="text-align: center;">Corporation Bank,
                                                                        Belagavi road behind forest office, Bailhongal,
                                                                        Karnataka-591102 <br>+91 8904327494</p>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" align="left"><b>Time :</b><?php $t1= new DateTime('now', new DateTimeZone('Asia/Kolkata'));
echo $time=$t1->format("h:i:s");?></td>
                                                                <td colspan="2" style="border: 1px solid transparent;"
                                                                    align="left"><b>Date
                                                                        :</b><?php echo date('d-m-Y'); ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td colspan="4">
                                                                    <hr style="color: #000;
background-color:; border: dotted 1px;">
                                                                </td>
                                                            </tr>r>
                                                                <td style="text-align: left">Bill No :
                                                                    <?php echo $billno; ?></td>

                                                                <td colspan="2" style="text-align: left;">Table No:</td>
                                                                <td style="border-top: 1px solid transparent;"
                                                                    align="left"> <?php echo $tabno; ?></td>
                                                            </tr>


                                                            <!--   <tr> 
                                                                    <td style="text-align: left">Captian :<?php echo $_GET['capnam']; ?></td>
                                                                    <td colspan="2" style="text-align: left">Section :</td><td style="text-align: left"><?php 
																	if($_GET['tabsec']=="First" || $_GET['tabsec']=="Ground") 
																		{
																			echo $_GET['tabsec']." Floor"; 
																		}
																		else 
																		{
																			echo $_GET['tabsec'];
																		}?>
																		</td>
                                                                </tr> -->
                                                            <tr>
                                                                <td colspan="4">
                                                                    <hr style="color: #000;
background-color:; border: dotted 1px;">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th style="text-align: left">Dish Name</th>
                                                                <th style="text-align: left">Price</th>
                                                                <th style="text-align: center">Qty</th>
                                                                <th style="text-align: left">Total</th>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <hr style="color: #000;
background-color:; border: dotted 1px;">
                                                                </td>
                                                            </tr>
                                                            <tr>

                                                        </thead>

                                                    <tbody>
                                                        <tr>
                                                            <?php
                                                                $total = 0;
                                                                $gst = 0;
                                                                $gstamt = 0;
                                                                $nettot = 0;

                                                                require_once("dbcon.php");
                                                                $sql = "SELECT * FROM tabledata WHERE tabno='$tabno' AND tabsec='$tabsec' AND billno='$billno'";
                                                                $result = mysqli_query($conn, $sql);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    // output data of each row
                                                                    while($row = mysqli_fetch_assoc($result)) {
                                                                        $total += $row['tot'];
                                                                ?>
                                                            <form action="final_ord.php" method="post">
                                                        <tr>
                                                            <td style="display:none"><?php echo $row['slno']; ?>

                                                                <input type="hidden" class="form-control" name="tabno"
                                                                    value="<?php echo $tabno; ?>">
                                                                <input type="hidden" class="form-control" name="tabsec"
                                                                    value="<?php echo $tabsec; ?>">

                                                            </td>
                                                            <td><?php echo $row['itmnam']; ?></td>
                                                            <td>&#x20B9; <?php echo $row['prc']; ?></td>
                                                            <td align="center"><?php echo $row['qty']; ?></td>
                                                            <td>&#x20B9; <?php echo $row['tot']; ?></td>
                                                        </tr>
                                                        <?php    }
                                                                }
																
																$sql = "SELECT * FROM service_charge";
																$result = mysqli_query($conn, $sql);
																if (mysqli_num_rows($result) > 0) 
																{
																	// output data of each row
																	while($row = mysqli_fetch_assoc($result)) {
																		$charge = $row['charge'];
																	}
																}
																
                                                                $total = round($total,2);
                                                              //  $gstamt = round(($total*($charge/100)),2);
                                                                $nettot = round(($total+$gstamt),2);
                                                            ?>

                                                        </tr>
                                                        <tr>
                                                            <td colspan="4">
                                                                <hr style="color: #000;
background-color:; border: dotted 1px;">
                                                            </td>
                                                        </tr>
                                                        <!-- <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>GST</td>
                                                                <td >18%</td>
                                                            </tr> -->
                                                        <tr>
                                                            <td></td>
                                                            <td style="border-bottom: 1px solid transparent;"></td>
                                                            <td>Grand Total</td>
                                                            <td style="border-bottom: 1px solid transparent;">&#x20B9;
                                                                <?php echo $total; ?></td>
                                                        </tr>
                                                        <?php
															if($tabsec == "First")
															{
															?>
                                                        <tr>
                                                            <td style="border-bottom: 1px solid transparent;"></td>
                                                            <td COLSPAN=2>Service Charge (<?php echo $charge; ?>%)</td>


                                                            <td style="border-bottom: 1px solid transparent;">&#x20B9;
                                                                <?php echo $gstamt?></td>
                                                        </tr>

                                                        <tr>
                                                            <td></td>
                                                            <td style="border-bottom: 1px solid transparent;"></td>
                                                            <td>Grand Total</td>
                                                            <td style="border-bottom: 1px solid transparent;">&#x20B9;
                                                                <?php echo $nettot; ?></td>
                                                        </tr>
                                                        <?php
															}
															?>
                                                        <?PHP 
															//$add_gst = round(($nettot*(5/100)),2);
															//$f_total = round(($nettot+$add_gst),2);
															
															?>
                                                        <!--<tr>
                                                                <td></td>
                                                                <td style="border-bottom: 1px solid transparent;"></td>
                                                                <td>GSTe (5%)</td>
																
																
                                                                <td style="border-bottom: 1px solid transparent;">&#x20B9; <?php echo $add_gst?></td>
                                                            </tr>
															<tr >
                                                                <td></td>
                                                                <td style="border-bottom: 1px solid transparent;"></td>
                                                                <td>Fianl Total</td>
                                                                 <td style="border-bottom: 1px solid transparent;">&#x20B9; <?php echo $f_total; ?></td>
                                                            </tr>-->
                                                        <tr>
                                                            <td colspan="4">
                                                                <hr style="color: #000;
background-color:; border: dotted 1px;">
                                                            </td>
                                                        </tr>
                                                        <tr>

                                                        <tr>
                                                            <td colspan="4" style='text-align:center'>follow us on
                                                                <br>instagram(@the_village_resto)<br>Email(thevillage0606@gmail.com).<br>
                                                                <p style='text-align:center'>*** Thank you Visit Again
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button class="btn btn-info" type="submit" id="click"
                                                onclick="printcontent('prt')">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                PRINT BILL
                                            </button>
                                            </form>
                                        </center>
                                        <div class="modal-footer no-margin-top">
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                            <!-- PAGE CONTENT ENDS -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.page-content -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <script type="text/javascript">
        function printcontent(el) {
            var w = window.open();
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            w.document.body.innerHTML = printcontent;
            w.window.print();
            w.onafterprint = function(event) {
                w.close()
            }
        }
        </script>
        <?php //require_once("footer.php"); ?>

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


</body>

</html>