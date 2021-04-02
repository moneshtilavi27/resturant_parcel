<?php
session_start();
?>

    <script type="text/javascript">
    $(function() {
        $(".itmnam").autocomplete({
            source: 'menu_complete.php'
        });
    });
    </script>
    <style>
    .form1 .col-md-6 {
        padding-right: 2px;
        padding-left: 2px;
    }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php require_once("header.php"); ?>

        <?php
            //$tabno = $_GET['tabno'];
            //$tabsec = $_GET['tabsec'];
            $tabsec = "";
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
           

             <div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>Final Order</b></h4>
                </div>
                        <div class="modal-body">
                            <form role="form" method="POST" action="table_form_save.php" id="finalform">
                                <div class="box-body form1">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputFile">Table No</label>
                                        <input type="text" class="form-control" name="tableno" readonly
                                            placeholder="Table No" id="tableno">
                                    </div>
                                    <div class="form-group col-md-12" style="display: none;">
                                        <label for="exampleInputFile">Table Section</label>
                                        <input type="text" class="form-control" name="tabsec" readonly
                                            placeholder="Table No" id="tabsec">
                                    </div>
                                    <?php
                                    require_once("dbcon.php");
                                    $sql = "SELECT * FROM service_charge";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) 
									{
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
											$charge = $row['charge'];
										}
									}
									//$section = $_GET['tabsec'];
                                    $section = "second";
									if($section == "First")
										$show_charge = $charge;
									else
										$show_charge = 0;
										
                                    ?>
                                    <!-- <div class="form-group col-md-6">
                                            <label for="exampleInputFile">Service Charge( % )</label>
                                            <input type="text" class="form-control" name="service_charge" placeholder="service charge" id="tabgst" required="required" value=<?php echo $show_charge?> readonly>
                                        </div>-->

                                    <div class="form-group col-md-12" style="display: none;">
                                        <label for="exampleInputFile">Captain Name</label>
                                        <input type="text" class="form-control" name="capnam"
                                            id="capnam1"
                                            readonly>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="exampleInputFile">Mobile No</label>
                                        <input type="text" class="form-control" name="mobno" maxlength="10"
                                            pattern="[6789][0-9]{9}" placeholder="Customer No">
                                    </div>
                                    <div class="radio" style="display: inline-block; padding-left: 8px;">
                                        <label>
                                            <input type="radio" name="paymentmode" id="optionsRadios1" value="Cash"
                                                checked>
                                            Cash
                                        </label>
                                    </div>
                                    <div class="radio" style="display: inline-block; padding-left: 8px;">
                                        <label>
                                            <input type="radio" name="paymentmode" id="optionsRadios2" value="online">
                                            Online
                                        </label>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Modal -->





            <!-- Modal -->
            <div class="modal fade" id="menuedit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Menu Edit</h4>
                        </div>
                        <form class="form-horizontal" method="post" action="menu_form_edit.php" id="editform">
                            <div class="modal-body">
                                <div class="col-md-12">
                                    <!-- Horizontal Form -->

                                    <!-- /.box-header -->
                                    <!-- form start -->
                                    <?php  $tabno=$_GET['tabno']; ?>

                                    <div class="box-body">

                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Order ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="ordid" id="ordid"
                                                    placeholder="Item ID" readonly="readonly" required>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="itmid" id="itmid"
                                                    placeholder="Item ID" readonly="readonly" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Section</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="tabsec" readonly
                                                    placeholder="Item Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item Name</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="itmname" id="itmname"
                                                    placeholder="Item Name" required>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                Quantity</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="itmqty" id="itmqty"
                                                    placeholder="Item Name" required>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                Price</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="itmprc" id="itmprc"
                                                    placeholder="Item Name" required readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                Total</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="itmtot" id="itmtot"
                                                    placeholder="Item Name" required readonly="readonly">
                                                <input type="hidden" class="form-control" name="tabno" id="tabno"
                                                    value="<?php echo $tabno; ?>" placeholder="Item ID"
                                                    readonly="readonly" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal -->

            <!-- Modal2 -->
            <div class="modal fade" id="orderview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Current Order</h4>
                        </div>
                        <div class="modal-body" id="list">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box box-primary">
                        <h3 class="text-center" style="margin-top: 3px;">Select Menu</h3>
                            <?php 
                                  $sec="Ground";
                                ?>

                            <input type="hidden" name="slno" id="slno">
                            <div class="box-body form1">
                                <div class="form-group col-md-6">
                                    <label for="fname">Captan</label>
                                    <input type="hidden" class="form-control" name="date" id="datepicker"
                                        value="<?php echo date("m/d/Y") ?>" required>
                                    <select class="form-control" name="captan" id="captain12">
                                    <option>Select</option>
                                    <?php
                                     $query="SELECT `empname` FROM `empreg` WHERE `type` ='Captain';";
                                     $c=mysqli_query($conn, $query);
                                     while($row = mysqli_fetch_array($c))
                                     {?>
                                     <option><?php echo $row['empname']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Table No</label>
                                    <!-- <input type="text" class="form-control" name="tabno" placeholder="Table No" id="table_no"> -->
                                    <div><select class="form-control" name="tabno" id="table_no">
                                            <?php 
                                            for($i=1; $i<=50; $i++)
                                            {?>
                                            <option value="<?php echo $i;?>"><?php echo $i; ?></option>
                                            <?php  } ?>
                                        </select></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <!--  <input type="hidden" class="form-control" name="itmsec" placeholder="Item sec" id="itmsec" value="<?php echo $sec; ?>" > -->
                                    <label for="exampleInputFile">Item No</label>
                                    <input type="text" class="form-control" name="itmno" placeholder="Item No"
                                        id="itmno" onblur="diver()">
                                </div>
                                <input type="hidden" name="tabsec" value="<?php echo $sec; ?>">
                                <input type="hidden" name="shnam" value="shanm">

                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Menu Name</label>
                                    <select class="form-control itmnam" name="itmnam" id="itmnam"
                                        placeholder="Item Name" onblur="itname()">
                                        <option><?php echo 'Select'; ?></option>
                                    <?php
                                     $query="SELECT `itmnam` FROM `item`;";
                                     $c=mysqli_query($conn, $query);
                                     while($row = mysqli_fetch_array($c))
                                     {?>
                                     <option><?php echo $row['itmnam']; ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Menu Price</label>
                                    <input type="number" step="0.01" class="form-control" name="prc" id="prc"
                                        placeholder="Price" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Menu Quantity</label>
                                    <input type="number" class="form-control" min="1" name="qty" id="qty"
                                        placeholder="Quantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Total</label>
                                    <input type="text" class="form-control" name="tot" id="tot" placeholder="Total"
                                        readonly>
                                </div>
                            </div>
                            <!-- /.box-body -->


                            <div class="box-footer">
                            <center><button type="button" class="btn btn-danger col-sm-5" id="add_order"
                                        onclick="delitm();" style="margin: 3px;"> Delete</button>
                                <button type="button" class="btn btn-success col-sm-5" id="add_order"
                                        onclick="insert();"> Add</button></center>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body" style="max-height:530px; overflow-y: auto;">
                                <div class="box-body">
                                    <div id="final"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                            </div>
                                            <form class="form-horizontal" method="post" action="table_form_edit.php"
                                                id="editform">
                                                <div class="modal-body">
                                                    <div class="col-md-12">
                                                        <div class="box-body">
                                                            <input type="hidden" name="slno">
                                                            <div class="form-group col-md-12">
                                                                <label for="inputEmail3"
                                                                    class="col-sm-4 control-label">Date</label>
                                                                <div class="col-sm-6">
                                                                    <div class="input-group date">
                                                                        <div class="input-group-addon">
                                                                            <i class="fa fa-calendar"></i>
                                                                        </div>
                                                                        <input type="text"
                                                                            class="form-control pull-right" name="date"
                                                                            id="datepicker1"
                                                                            value="<?php echo date("m/d/Y") ?>">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputEmail3"
                                                                    class="col-md-4 control-label">Item No</label>
                                                                <div class="col-md-4">
                                                                    <input type="number" class="form-control"
                                                                        placeholder="Item No" name="itmno" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputPassword3"
                                                                    class="col-sm-4 control-label">Item Name</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control"
                                                                        name="itmnam" placeholder="Item Name" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputPassword3"
                                                                    class="col-sm-4 control-label">Short Name</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="shnam"
                                                                        placeholder="Short Name" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputEmail3"
                                                                    class="col-sm-4 control-label">Price</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" step="0.01"
                                                                        class="form-control" name="prc"
                                                                        placeholder="Price" id="prc1" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputPassword3"
                                                                    class="col-sm-4 control-label">Quantity</label>
                                                                <div class="col-sm-6">
                                                                    <input type="number" class="form-control" name="qty"
                                                                        id="qty1" placeholder="Quantity" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label for="inputPassword3"
                                                                    class="col-sm-4 control-label">Total</label>
                                                                <div class="col-sm-6">
                                                                    <input type="text" class="form-control" name="tot"
                                                                        placeholder="Total" id="tot1" readonly>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="tabno">
                                                            <input type="hidden" name="tabsec">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div><!-- /.modal -->
                                <!-- End Modal-->
                            </div>
                        </div>
                        <!-- /.row -->
            </section>


        </div>
        <!-- /.content-wrapper -->
        <?php //require_once("footer.php"); ?>

        <div class="control-sidebar-bg"></div>
    </div>

    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> -->
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="plugins/moment.min.js"></script>
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


    <script>
    $(document).ready(function() {
        $("input").keyup(function() {
            // alert("hello");
            var qty = document.getElementById('itmqty').value;
            var price = document.getElementById('itmprc').value;
            //  alert(qty);
            // alert(price);
            var qty1 = parseInt(qty);
            var prc = parseInt(price);
            var tot = qty1 * prc;
            // alert (paid);
            document.getElementById('itmtot').value = tot;
        });
    });
    </script>
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


    <script src="dist/js/vue/vue.js"></script>
    <script src="dist/js/vue/vue-resource@1.3.4.js"></script>
    <script src="dist/js/vue/vee-validate.js"></script>

    <script type="text/javascript">
    $('#final').load("final_search.php");

    $("#qty").keyup(total);
    $("#prc").keyup(total);

    $("#prc1").keyup(total1);
    $("#qty1").keyup(total1);

    function total() {
        var qt = parseFloat($("#qty").val());
        var prc = parseFloat($("#prc").val());
        var x = (qt * prc).toFixed(2);
        $("#tot").val(x);
    }

    function total1() {
        var qt = parseFloat($("#qty1").val());
        var prc = parseFloat($("#prc1").val());
        var x = (qt * prc).toFixed(2);
        $("#tot1").val(x);
    }

    function diver() {
        //alert('hiiiiii');
        var wingname = document.getElementById('itmno').value;
        //var wingsec = document.getElementById('itmsec').value;
        // alert(wingsec);
        $.ajax({
            url: 'item_ajax.php',
            type: "POST",
            dataType: 'json',
            data: {
                wingname: wingname
            },
            success: function(data) {
                // alert(data);
                $("#itmno").val(data[0]);
                $("#itmnam").val(data[1]);
                $("#qty").val('1');
                $("#prc").val(data[3]);
                total();
            }
        });
    }

    function itname() {
        //alert('hiiiiii');
        var wingname = document.getElementById('itmnam').value;
        // var wingsec = document.getElementById('itmsec').value;
        //alert(wingname);
        $.ajax({
            url: 'item_nam_ajax.php',
            type: "POST",
            dataType: 'json',
            data: {
                wingname: wingname
            },
            success: function(data) {
                console.log(data);
                $("#itmno").val(data[0]);
                $("#itmnam").val(data[1]);
                $("#qty").val('1');
                $("#prc").val(data[3]);
                total();
            }
        });
    }

    function insert() {
        var itdate = $('#datepicker').val();
        let captain = $('#captain12').val();
        var table_no = $('#table_no').val();
        var itmno = $("#itmno").val();
        var itname = $("#itmnam").val();
        var qty = $("#qty").val();
        var prc = $("#prc").val();
        var total = $("#tot").val();
        if (itdate != "" && table_no != "" && itname != "" && captain != 'Select') {
            $.ajax({
                type: "post",
                url: "table_form_insert.php",
                data: { 
                    shnam: "shnam",
                    tabsec: "Ground",
                    captain :captain,
                    date: itdate,
                    itmno: itmno,
                    itmnam: itname,
                    prc: prc,
                    qty: qty,
                    tot: total,
                    tabno: table_no
                },
                success: function(status) {
                    $("#itmno").val("");
                    $("#itmnam").val("");
                    $("#qty").val("");
                    $("#prc").val("");
                    $("#tot").val("");
                    $('#final').load("final_search.php");
                }
            });
        } else {
            alert("Missing Field...");
        }
    }
   
    // to delete item from bill
    function delitm() {
        var table_no = $('#table_no').val();
        var itmno = $("#itmno").val();
        if (itmno != "") {
            $.ajax({
                type: "post",
                url: "table_form_insert.php",
                data: {
                    itmno: itmno,
                    table_no : table_no,
                    delete : "delete"   
                },
                success: function(status) {
                    $("#itmno").val("");
                    $("#itmnam").val("");
                    $("#qty").val("");
                    $("#prc").val("");
                    $("#tot").val("");
                    $('#final').load("final_search.php");
                }
            });
        } else {
            alert("Please Select Item");
        }
    }
    </script>

</body>

</html>