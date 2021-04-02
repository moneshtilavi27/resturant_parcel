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
            <!-- Content Header (Page header) -->
            <section class="content">
                <!-- Table -->
                <div class="box" style="margin:-15px;">
                    <!-- /.box-header -->
                    <div class="box-body">
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
                                                <td colspan="2" align="left"><b>Date :</b><?php echo date('d-m-Y'); ?>
                                                </td>
                                                <!-- <td colspan="2" align="right"><b>Ph No :</b> </td> -->
                                            </tr>
                                            <tr>
                                                <th align="left">Table No:</th>
                                                <td align="left"> <?php echo $tabno; ?></td>
                                                <th style="text-align: left">Bill No :</th>
                                                <td style="text-align: left"> <?php echo $billno; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <hr style="color: #000;
                                                    background-color:; border: dotted 1px;">
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
                                                $sql = "SELECT * FROM tabledata WHERE tabno='$tabno' AND `billno`= $billno";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    // output data of each row  
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                        $total += $row['tot'];
                                                ?>
                                        <tr>
                                            <td style="display:none"><?php echo $row['slno']; ?></td>
                                            <td><?php echo $row['itmnam']; ?></td>
                                            <td>&#x20B9; <?php echo $row['prc']; ?></td>
                                            <td align="center"><?php echo $row['qty']; ?></td>
                                            <td>&#x20B9; <?php echo $row['tot']; ?></td>
                                            <!--   <td style="padding-top: 2px"><a href="black.php?imno=<?php echo $row['slno'];?>&billno=<?php echo $_GET['billno']?>&tabsec=<?php echo $_GET['tabsec']?>&tabno=<?php echo $_GET['tabno'];?>&total=<?php echo $row['tot']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td> -->
                                        </tr>
                                        <?php    }
                                                }
                                                $total = round($total,2);
                                                $gstamt = round(($total*($gst/100)),2);
                                                $nettot = round(($total+$gstamt),2);
                                            ?>
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
                                            <td></td>
                                            <td>Net Total</td>
                                            <td>&#x20B9; <?php echo $nettot; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr style="color: #000; border: dotted 1px;">
                                            </td>
                                        </tr>

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
                            <!--  <a target="_blank" href="print1.php?tabno=<?php echo $tabno; ?>&tabsec=<?php echo $tabsec; ?>&billno=<?php echo $billno; ?>&capnam=<?php echo $_GET['capnam']; ?>" class="btn btn-primary">Print</a> -->
                        </center>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- End Table -->

            </section>
            <!-- /.content -->
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