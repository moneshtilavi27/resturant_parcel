<?php require_once("header.php"); ?>
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
        <?php
            //$tabno = $_GET['tabno'];
            //$tabsec = $_GET['tabsec'];
            $tabsec = "";
            ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
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
                            <input type="hidden" name="slno" value="1" id="table_no">
                            <div class="box-body form1">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputFile">Mobile Number</label>
                                    <input type="text" class="form-control" name="mob" placeholder="Mobile Number"
                                        id="mobno">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fname">Date</label>
                                    <input type="text" class="form-control" name="date" id="datepicker"
                                        value="<?php echo date("m/d/Y") ?>" required>
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
                                    <input type="text" class="form-control itmnam" name="itmnam" id="itmnam"
                                        placeholder="Item Name" onblur="itname()">
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
                            <div class="box-footer">
                            <center><button type="button" class="btn btn-danger col-sm-5" id="add_order"
                                        onclick="delitm();" style="margin: 3px;"> Delete</button>
                             <button type="button" class="btn btn-success col-sm-5" id="add_order"
                                        onclick="insert();"> Add</button></center>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--/.col (left) -->
                    <div class="col-md-6">
                        <div class="box" style="height: 570px;">
                            <!-- /.box-header -->
                            <div class="box-body" style="max-height:530px; overflow-y: auto;">
                                <div class="box-body">
                                    <div id="final"></div>
                                </div>
                            </div>
                        </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php //require_once("footer.php"); ?>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><b>Final Order</b></h4>
                </div>
                <div class="modal-body bg-warning">
                    <form role="form" method="POST" action="parcel_save.php" id="finalform">
                        <div class="box-body form1">
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">Bill Amount</label>
                                <input type="text" class="form-control" name="" readonly placeholder="Table No"
                                    id="billamt">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">Discount</label>
                                <input type="text" class="form-control" name="discount" placeholder="Discount" id="disc"
                                    value="0" onkeyup="return onlyNumbers(this);discount(this);" autocomplete="off">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">Total Amount</label>
                                <input type="text" class="form-control" name="" placeholder="Amout" id="tot_amt"
                                    readonly>
                            </div>
                            <div class="form-group col-md-12" style="display:non;">
                                <label for="exampleInputFile">Mobile No</label>
                                <input type="text" class="form-control" id="mob" name="mobno" maxlength="10"
                                    pattern="[6789][0-9]{9}" placeholder="Customer No" autocomplete="off">
                            </div>
                            <div class="radio" style="display: inline-block; padding-left: 13px;">
                                <label>
                                    <input type="radio" name="paymentmode" id="optionsRadios1" value="Cash" checked>
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

                        <div class="box-footer text-center">
                            <button type="submit" class="btn btn-success col-md-12">Print</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal -->

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
    $('#final').load("parcel_fetch.php");

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
    $('#disc').keyup(function() {
        let amt = $('#billamt').val();
        let discount = $(this).val();
        $('#tot_amt').val(amt - discount + ".00");
    });

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
        var table_no = $('#table_no').val();
        var itmno = $("#itmno").val();
        var itname = $("#itmnam").val();
        var qty = $("#qty").val();
        var prc = $("#prc").val();
        var total = $("#tot").val();
        let mobno = $('#mobno').val();
        $('#mob').val(mobno);
        if (itname != "" && itmno !="") {
          let log= $.ajax({
                type: "post",
                url: "parcel_form_insert.php",
                data: {
                    shnam: "shnam",
                    tabsec: "Ground",
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
                    $('#final').load("parcel_fetch.php");
                }
            });
            console.log(log);
        } else {
            alert("Plese add All The field");
        }
    }
    
    
     // to delete item from bill
     function delitm() {
        let mobno = $('#mobno').val();
        var itmno = $("#itmno").val();
        if (itmno != "") {
            $.ajax({
                type: "post",
                url: "parcel_form_insert.php",
                data: {
                    itmno: itmno,
                    mobno : mobno,
                    delete : "delete"
                },
                success: function(status) {
                    $("#itmno").val("");
                    $("#itmnam").val("");
                    $("#qty").val("");
                    $("#prc").val("");
                    $("#tot").val("");
                    $('#final').load("parcel_fetch.php");
                }
            });
        } else {
            alert("Plese add All The field");
        }
    }
    </script>
</body>

</html>