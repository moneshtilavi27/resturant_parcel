<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <style>
        .error {
            color: red;
        }
        </style>
        <?php require_once("header.php"); ?>
        <script type="text/javascript">
        $(function() {
            $(".pname").autocomplete({
                source: 'product_complete.php'
            });
        });
        </script>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Kitchen1 Stock Inventary
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Kitchen Master</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- SELECT2 EXAMPLE -->
                <div class="box box-default">
                    <!-- /.box-header -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Horizontal Form -->

                            <!-- /.box-header -->
                            <!-- form start -->
                            <form class="form-horizontal" id="addform" action="kitchen_insert.php" method="POST">
                                <div class="box-body">
                                    <div class="row">

                                        <!--
                                            <div class="form-group col-md-4">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Sl No</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" placeholder="Sl No" name="slno" v-bind:value="slno" readonly>
                                                </div>
                                            </div>
-->

                                        <!--     <div class="form-group col-md-4">
                                                <label for="inputPassword3" class="col-sm-4 control-label">Item Name</label>
                                                <div class="col-sm-8">
                                                   <select  required="required" id="sid" onchange="validate1();" class="form-control" name="itmid"> 
                                                    <option disabled="disabled" selected="selected">-- Select Product--</option>
                                                             <?php


                                                                include("dbcon.php");
                                                                
                                                                
                                                                $sql = "SELECT * FROM products";
                                                                
                                                                $retval = mysqli_query( $conn, $sql );
                                                                
                                                                if(! $retval )
                                                                {
                                                                  die('Could not get data: ' . mysql_error());
                                                                }
                                                                
                                                                
                                                                while($row = mysqli_fetch_array($retval))
                                                                {
                                                                    ?>
                                                              <option value="<?php echo $row['pname']; ?>"><?php echo $row['pname']; ?> </option>
                                                                                                     
                                                                   <?php
                                                                }
                            
                                                             ?>

                                                            </select>
                                                </div>
                                            </div> -->

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Product Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control pname" id="sid"
                                                    onblur="validate1();" name="itmid" placeholder="Search Product"
                                                    required="required">

                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Item Unit</label>
                                            <div class="col-sm-8">
                                                <input type="hidden" class="form-control" name="itmname" id="itmname">
                                                <input type="text" class="form-control" name="itmunit" id="itmunit"
                                                    readonly="readonly" placeholder="Quantity">
                                            </div>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Remaining
                                                Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="remqty" id="itmqty"
                                                    placeholder="Quantity" readonly>

                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Item
                                                Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="itmqty"
                                                    placeholder="Quantity">

                                            </div>
                                        </div>


                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Given Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" name="gvndate"
                                                    placeholder="Purchased Date" value="<?php echo date('Y-m-d'); ?>"
                                                    required>

                                            </div>
                                        </div>


                                        <!-- 
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword3" class="col-sm-4 control-label"></label>
                                                <div class="col-sm-8">
                                                    <input type="hidden" step="0.01" class="form-control" name="qty" id="inputPassword3" placeholder="Quantity"  value="1"  >
                                                    <!-- <span style="color: red" v-if="attemptSubmit && missingQty">This field is required.</span>
                                                </div>
                                            </div> -->




                                    </div>


                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </center>
                                </div>
                                <!-- /.box-footer -->
                            </form>

                            <!-- /.box -->
                            <!-- general form elements disabled -->

                            <!-- /.box -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- Table -->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Kitchen Stock List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Item Name</th>
                                    <th>Minimum Qty</th>
                                    <th>Finished Qty</th>
                                    <th>Remaining Qty</th>
                                    <th>Item Unit</th>
                                    <th>Given Date</th>
                                    <th>Edit/Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once("dbcon.php"); 
                                    $sql = "SELECT * FROM store_room_finish where type='kitchen1'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
											
											$r_qty = $row['f_item_rem_qty'];
											$item_name = $row['item_name_finish'];
											
											 $sql1 = "SELECT mqty FROM store_room  where item_name='$item_name'";
											$result1 = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($result1) > 0) 
											{
												while($row1= mysqli_fetch_assoc($result1)) {
													$m_qty = $row1['mqty'];
												}
											}
											if($r_qty <= $m_qty && $r_qty!="")
												echo "<tr style='background:#fda5a5;'>";
											else
												echo "<tr style='background:white;'>";
									?>
                                <td><?php echo $row['fid']; ?></td>
                                <td><?php echo $row['item_name_finish']; ?></td>
                                <td><?php echo $m_qty; ?></td>
                                <td><?php echo $row['f_item_finish_qty']; ?></td>
                                <td><?php echo $row['f_item_rem_qty']; ?></td>
                                <td><?php echo ucfirst($row['f_item_unit']); ?></td>
                                <!--<td><?php echo $row['given_date']; ?></td>-->
                                <td><?php echo date("d-M-Y", strtotime( $row['given_date'])); ?></td>

                                <td>
                                    <button v-on:click="editItem($event)" class="btn btn-primary btn-sm edit1"
                                        data-toggle="modal" data-target="#myModal"><i
                                            class="fa fa-fw fa-edit"></i>Edit</button>
                                    <a href="kitchen_edit.php?del=<?php echo $row['fid'];?>"
                                        class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i>Delete</a>
                                </td>
                                </tr>
                                <?php    }
                                    }
                                    ?>
                            </tbody>
                            <!-- <tfoot>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Short Name</th>
                                        <th>Edit/Delete</th>
                                    </tr> -->
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                </div>
                                <form class="form-horizontal edit" method="post" action="kitchen_edit.php"
                                    id="editform">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <!-- Horizontal Form -->

                                            <!-- /.box-header -->
                                            <!-- form start -->

                                            <div class="box-body">

                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3" class="col-md-4 control-label">Sl
                                                        No</label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" placeholder="Sl No"
                                                            name="slno" readonly>
                                                    </div>
                                                </div>


                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                        Name</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="itmname"
                                                            id="itmname" placeholder="Item Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                        Unit</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="itmunit"
                                                            placeholder="Item Name" required>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Item
                                                        Quantity</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="itmqty"
                                                            placeholder="Item Name" required>
                                                    </div>
                                                </div>



                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Item
                                                        Remaining QTY</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" readonly="readonly" class="form-control"
                                                            name="itm_rem" placeholder="Remaining" required>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Given
                                                        Date</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="g_date" required>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                            <!-- /.box-footer -->


                                            <!-- /.box -->
                                            <!-- general form elements disabled -->

                                            <!-- /.box -->
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
                <!-- End Table -->

            </section>
            <!-- /.content -->
        </div>

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
        <script>
        function validate1() {
            //alert("hi");
            var lid = document.getElementById('sid').value;
            $.ajax({
                type: "GET",
                data: {
                    id: lid
                },
                url: "get.php",
                success: function(data) {

                    // alert(data);
                    //console.log(data);
                    var obj = JSON.parse(data);

                    console.log(obj);
                    //alert(obj[0].item_name)

                    document.getElementById('itmunit').value = obj[0].item_unit;
                    document.getElementById('itmqty').value = obj[0].item_qty;
                    document.getElementById('itmname').value = obj[0].item_name;

                }
            });
        }
        </script>
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


    <script src="dist/js/vue/vue.js"></script>
    <script src="dist/js/vue/vue-resource@1.3.4.js"></script>
    <script src="dist/js/vue/vee-validate.js"></script>

    <script>
    $(function() {
        //$("#example1").DataTable();
        $("#example1").DataTable({
            dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
            "lengthMenu": [
                [25, 10, 100, -1],
                [25, 10, 100, "All"]
            ],
            buttons: [
                'print'
            ],
            order: [
                [6, "desc"]
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

    <script src="conn.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script>
    $(document).ready(function() {
        $.validator.addMethod("alphabetsnspace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        });



        $('#addform').validate({
            rules: {

                itm: {
                    required: true,

                    alphabetsnspace: true
                },

                shnam: {
                    required: true,

                    alphabetsnspace: true
                },

                prc: {
                    required: true
                }





            }

            ,
            messages: {
                empname: {
                    alphabetsnspace: "Please Enter Only Letters"
                }

            }



        });
    });
    </script>


    <script>
    $(".edit1").click(function() {
        var child = $(this).closest('tr');

        var form = $("#editform1 input");
        //console.log(child);
        form[0].value = (child.children()[0].innerHTML);
        form[1].value = (child.children()[1].innerHTML);
        form[2].value = (child.children()[2].innerHTML);
        form[3].value = (child.children()[3].innerHTML);
        form[4].value = (child.children()[4].innerHTML);
        form[5].value = (child.children()[5].innerHTML);
        // form[].value = (child.children()[5].innerHTML);
        //form[5].value = (child.children()[5].innerHTML);
        //form[6].value = (child.children()[6].innerHTML);
    });
    </script>
    <script>
    var app = new Vue({
        el: '#form1',
        data: {
            slno: 0,
            rows: {},
            itmnam: '',
            qty: 1,
            prc: '',
            shnam: '',
            attemptSubmit: false
        },
        computed: {
            missingItmnam: function() {
                return this.itmnam === '';
            },
            missingQty: function() {
                return this.qty === '';
            },
            missingPrc: function() {
                return this.prc === '';
            },
            missingShnam: function() {
                return this.shnam === '';
            },
        },
        methods: {
            validateForm: function(event) {
                this.attemptSubmit = true;
                if (this.missingItmnam || this.missingQty || this.missingPrc || this.missingShnam) {
                    event.preventDefault();
                } else {
                    event.preventDefault();
                    let formData = new FormData(document.getElementById("addform"));



                    this.$http.post('item_insert.php', formData, {
                        emulateJSON: true
                    }).then(function(data) {
                        alert("added");
                        $("#addform").trigger("reset");
                        location.reload();
                    });
                }
            },
            addItem: function(e) {
                e.preventDefault;
                let formData = new FormData(document.getElementById("addform"));



                this.$http.post('item_insert.php', formData, {
                    emulateJSON: true
                }).then(function(data) {
                    alert("added");
                    $("#addform").trigger("reset");
                    location.reload();
                });
            },
            tableData: function() {
                this.$http.post('item_table.php', formData, {
                    emulateJSON: true
                }).then(function(data) {
                    $("#addform").trigger("reset");
                    this.slno++;
                });
            },
            editItem: function(e) {
                var tar = e.currentTarget;
                var chil = tar.parentElement.parentElement.children;
                var form = $("#editform input");

                form[0].value = (chil[0].innerHTML);
                form[1].value = (chil[1].innerHTML);
                form[2].value = (chil[5].innerHTML);
                form[3].value = (chil[3].innerHTML);
                form[4].value = (chil[4].innerHTML);
                form[5].value = (chil[6].innerHTML);


            }
        },
      
    });
    </script>
</body>

</html>