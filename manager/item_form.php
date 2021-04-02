
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper" id="form1">
<style>
    .error{color: red;}</style>
            <?php require_once("header.php"); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
               <section class="content">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <div class="row" >
                            <div class="col-md-12">
                            <h4 class="text-center" style="color: red;">Menu Master</h4>
                                <form class="form-horizontal" id="addform" action="item_insert.php" method="POST" >
                                    <div class="box-body">
                                            <div class="form-group col-md-4">
                                                <label for="inputPassword3" class="col-sm-4 control-label">Menu Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="itm" id="itm" placeholder="Item Name" v-model="itmnam"  >
                                                </div>
                                            </div>
                                            
                                            
                                             <div class="form-group col-md-4">
                                                <label for="inputEmail3" class="col-sm-4 control-label">Menu Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number"   class="form-control" name="prc" min="1" placeholder="Price" v-model="prc"  >
                                                    
                                                </div>
                                            </div>
											<input type="hidden" step="0.01"  name="qty" id="inputPassword3" placeholder="Quantity"  value="1"  >
                                                    <!-- <span style="color: red" v-if="attemptSubmit && missingQty">This field is required.</span> -->
                                                
                                        
                                        <div class="form-group col-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.box-footer -->
                                </form>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="box-body" style="margin-top: -15px;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Menu Name</th>
                                        <!-- <th>Quantity</th> -->
                                        <th>Menu Price</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("dbcon.php");
                                    $sql = "SELECT * FROM item";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['slno']; ?></td>
                                        <td><?php echo $row['itmnam']; ?></td>
                                        <!-- <td><?php //echo $row['qty']; ?></td> -->
                                        <td><?php echo $row['prc']; ?></td>
                                        
                                        <td>
                                            <button v-on:click="editItem($event)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            <a href="item_edit.php?del=<?php echo $row['slno'];?>" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i>Delete</a>
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Edit</h4>
                                    </div>
                                    <form class="form-horizontal" method="post" action="item_edit.php" id="editform">
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <!-- Horizontal Form -->

                                                <!-- /.box-header -->
                                                <!-- form start -->

                                                <div class="box-body">

                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail3" class="col-md-4 control-label">Sl No</label>
                                                        <div class="col-md-4">
                                                            <input type="number" class="form-control" placeholder="Sl No" name="slno" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Item Name</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="itmnam" placeholder="Item Name" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="qty" value="1" >
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail3" class="col-sm-4 control-label">Price</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" step="0.01" class="form-control" name="prc" placeholder="Price" required>
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
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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


        <script src="dist/js/vue/vue.js"></script>
        <script src="dist/js/vue/vue-resource@1.3.4.js"></script>
        <script src="dist/js/vue/vee-validate.js"></script>

        <script>
            $(function () {
                $("#example1").DataTable();
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
            $(".edit1").click(function(){
                        var child = $(this).closest('tr');
                        
                         var form = $("#editform1 input");
//console.log(child);
                        form[0].value = (child.children()[0].innerHTML);
                        form[1].value = (child.children()[1].innerHTML);
                        form[2].value = (child.children()[2].innerHTML);
                        form[3].value = (child.children()[3].innerHTML);
                        form[4].value = (child.children()[5].innerHTML);
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
                    missingItmnam: function () { return this.itmnam === ''; },
                    missingQty: function () { return this.qty === ''; },
                    missingPrc: function () { return this.prc === ''; },
                    missingShnam: function () { return this.shnam === ''; },
                },
                methods: {
                    validateForm: function (event) {
                        this.attemptSubmit = true;
                        if (this.missingItmnam || this.missingQty || this.missingPrc || this.missingShnam) {
                            event.preventDefault();
                        } else {
                            event.preventDefault();
                            let formData = new FormData(document.getElementById("addform"));



                            this.$http.post('item_insert.php', formData,{emulateJSON: true}).then(function (data){
                                alert("added");
                                $("#addform").trigger("reset");
                                location.reload();
                            });
                        }
                    },
                    addItem: function (e){
                        e.preventDefault;
                        let formData = new FormData(document.getElementById("addform"));



                        this.$http.post('item_insert.php', formData,{emulateJSON: true}).then(function (data){
                            alert("added");
                            $("#addform").trigger("reset");
                            location.reload();
                        });
                    },
                    tableData: function(){
                        this.$http.post('item_table.php', formData,{emulateJSON: true}).then(function (data){
                            $("#addform").trigger("reset");
                            this.slno++;
                        });
                    },
                    editItem: function(e){
                        var tar = e.currentTarget;
                        var chil = tar.parentElement.parentElement.children;
                        var form = $("#editform input");

                        form[0].value = (chil[0].innerHTML);
                        form[1].value = (chil[1].innerHTML);
                        form[2].value = (chil[2].innerHTML);
                        form[3].value = (chil[3].innerHTML);
                        form[4].value = (chil[4].innerHTML);
                    }
                },
                
            });
        </script>
    </body>
</html>
