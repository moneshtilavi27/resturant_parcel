<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">

        <?php require_once("header.php"); 
            $discount = $_GET['discount'];
            $billno = $_GET['billno'];
            ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content">

                <!-- Table -->
                <div class="box" style="margin:-15px;">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <center>
                            <div id="prt">
                                <table width="320" cellpadding="0" cellspacing="0">
                                    <thead>
                                        <caption>
                                            <h3 align="center" style="color: red;">THE VILLAGE <br />KOT Print</h3>
                                        </caption>
                                        <thead>
                                            <tr>
                                                <td colspan="4">
                                                    <p style="text-align: center;">Corporation Bank, Belagavi road
                                                        behind forest office, Bailhongal, Karnataka-591102 <br>+91
                                                        8904327494</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="left"><b>Time
                                                        :</b><?php $t1= new DateTime('now', new DateTimeZone('Asia/Kolkata'));echo $time=$t1->format("h:i:s");?>
                                                </td>
                                                <td colspan="2" style="border: 1px solid transparent;" align="left">
                                                    <b>Date :</b><?php echo date('d-m-Y'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left">Bill No : <?php echo $billno; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <hr style="color: #000;border: dotted 1px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="3" style="text-align: left">Dish Name</th>
                                                <th colspan="2" style="text-align: center">Qty</th>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <hr style="color: #000;border: dotted 1px;">
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
                                                    $sql = "SELECT * FROM tabledata WHERE billno='$billno'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            $total += $row['tot'];
                                                    ?>
                                        <tr>
                                            <td style="display:none"><?php echo $row['slno']; ?>
                                                <input type="hidden" class="form-control" name="billno"
                                                    value="<?php echo $billno; ?>">
                                            </td>
                                            <td colspan="3"><?php echo $row['itmnam']; ?></td>
                                            <td align="center" colspan="2"><?php echo $row['qty']; ?></td>
                                        </tr>
                                        <?php } }
                                            ?> </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr style="color: #000; background-color:; border: dotted 1px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" style='text-align:center'>follow us on
                                                <br>instagram(@the_village_resto)<br>Email(thevillage0606@gmail.com).<br>
                                                <p style='text-align:center'>*** Thank you Visit Again
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr style="color: #000; border: dotted 1px;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                                <td colspan="2" align="left"><b>Time
                                                        :</b><?php $t1= new DateTime('now', new DateTimeZone('Asia/Kolkata'));echo $time=$t1->format("h:i:s");?>
                                                </td>
                                                <td colspan="2" style="border: 1px solid transparent;" align="left">
                                                    <b>Date :</b><?php echo date('d-m-Y'); ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left">Bill No : <?php echo $billno; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <hr style="color: #000; border: dotted 1px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left">Particulars</th>
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
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php
                                                $total = 0;
                                                $gst = 0;
                                                $gstamt = 0;
                                                $nettot = 0;

                                                require_once("dbcon.php");
                                                    $sql = "SELECT * FROM tabledata WHERE billno='$billno'";
                                                    $result = mysqli_query($conn, $sql);
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // output data of each row
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            $total += $row['tot'];
                                                    ?>
                                            <tr>
                                                <td style="display:none"><?php echo $row['slno']; ?>
                                                    <input type="hidden" class="form-control" name="billno"
                                                        value="<?php echo $billno; ?>">
                                                </td>
                                                <td><?php echo $row['itmnam']; ?></td>
                                                <td>&#x20B9; <?php echo $row['prc']; ?></td>
                                                <td align="center"><?php echo $row['qty']; ?></td>
                                                <td>&#x20B9; <?php echo $row['tot']; ?></td>
                                            </tr>
                                            <?php } }
                                                $total = round($total,2);
                                                //  $gstamt = round(($total*($charge/100)),2);
                                                  $nettot = round(($total+$gstamt),2);
                                            ?> </tr>
                                            <tr>
                                            </tr>
                                            <?php if($discount>0){?>
                                            <td colspan="4">
                                                <hr style="color: #000; background-color:; border: dotted 1px;">
                                            </td>
                                            <tr>
                                                <td></td>
                                                <td style="border-bottom: 1px solid transparent;"></td>
                                                <td>Total</td>
                                                <td style="border-bottom: 1px solid transparent;">&#x20B9;
                                                    <?php echo $total; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-bottom: 1px solid transparent;"></td>
                                                <td>Discount</td>
                                                <td style="border-bottom: 1px solid transparent;">&#x20B9;
                                                    <?php echo $discount; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="4">
                                                    <hr style="color: #000; background-color:; border: dotted 1px;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td style="border-bottom: 0.5px solid transparent;"></td>
                                                <td>Grand Total</td>
                                                <td style="border-bottom: 1px solid transparent; font-size:18pt;">
                                                    &#x20B9; <?php echo $total-$discount; ?></td>
                                            </tr>
                                            <td colspan="4">
                                                <hr style="color: #000; background-color:; border: dotted 1px;">
                                            </td>

                                            <tr>
                                                <td colspan="4" style='text-align:center'>follow us on
                                                    <br>instagram(@the_village_resto)<br>Email(thevillage0606@gmail.com).<br>
                                                    <p style='text-align:center'>*** Thank you Visit Again
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                            <button class="btn btn-info" type="submit" id="click" onclick="printcontent('prt')"> <i
                                    class="ace-icon fa fa-check bigger-110"></i> PRINT BILL
                            </button>
                        </center>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <?php// require_once("footer.php"); ?>


    </div>

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
        // w.document.body.innerHTML=restorepage;
        //  w.close();
    }
    </script>
</body>

</html>