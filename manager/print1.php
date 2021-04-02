<html moznomarginboxes mozdisallowselectionprint>

<head>
    <style type="text/css" media="print">
    @page {
        size: auto;
        /* auto is the current printer page size */
        margin: 0mm;
        /* this affects the margin in the printer settings */
    }

    body {
        /*background-color:#FFFFFF; */
        /*border: solid 1px black ;*/
        margin: 0px;
        /* the margin on the content before printing */
        font-family: 'Source Sans Pro', sans-serif;
        font-size: 14px;
    }
    </style>
</head>

<body>

    <?php
            $discount = $_GET['discount'];
            $billno = $_GET['billno'];
            ?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                </ul>

                <div class="nav-search" id="nav-search">

                </div>
            </div>
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
                                    <table width="320" cellpadding="0" cellspacing="0">
                                        <thead>
                                            <caption>
                                                <h3 align="center" style="color: red;">THE VILLAGE</h3>
                                            </caption>
                                            <thead>
                                                <tr>
                                                    <td colspan="4">
                                                        <p style="text-align: center;">Corporation Bank, Belagavi road
                                                            behind forest office, Bailhongal, Karnataka-591102 <br>+91
                                                            8904327494</p>
                                                    </td>/p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" align="left"><b>Time :</b><?php $t1= new DateTime('now', new DateTimeZone('Asia/Kolkata'));
    echo $time=$t1->format("h:i:s");?></td>
                                                    <td colspan="2" style="border: 1px solid transparent;" align="left">
                                                        <b>Date :</b><?php echo date('d-m-Y'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left">Bill No : <?php echo $billno; ?></td>
                                                </tr>
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

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        window.print()
        window.onafterprint = function(event) {
            window.location.href = 'parcel.php';
        };
    });
    </script>
</body>

</html>