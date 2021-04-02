<?php
 require_once("dbcon.php");
								$id = $_GET['id'];
if(isset($_POST) & !empty($_POST))
{
	$id=$_POST['t1'];
	$p1=$_POST['p1'];

	echo $sql="update products set pname='$p1' where pid=$id";
	if (!mysqli_query($conn,$sql))
	{
		die('Error: ' . mysqli_error($conn));
	}
	echo '<script>alert("The Details Updated Successfully.");</script>';
	echo '<script>location="add_prodct1.php";</script>'; 
}
?>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper" id="form1">
<style>
    .error{color: red;}</style>
            <?php require_once("header.php"); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Stock Inventary
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Stock Master</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="box box-default">
                        <!-- /.box-header -->
                        <div class="row" >
                            <div class="col-md-12">
      <?php
$n1=$_GET['id'];


include("dbcon.php");


$sql = "SELECT * FROM products where pid='$n1' ";

$retval = mysqli_query($conn,$sql);



$num_rows = mysqli_num_rows($retval);


while($row = mysqli_fetch_assoc($retval))
{
$a1=$row['pname']   ;

    
}
    ?>                          <!-- Horizontal Form -->

                                <!-- /.box-header -->
                                <!-- form start -->
                               <form class="form-horizontal" role="form" action="" method="post">
                                <div class="form-group">
                                    

                                        <div class="col-md-9">
                                            &nbsp;&nbsp;<input type="hidden" id="form-field-1" placeholder="" name="t1" value="<?php echo $n1 ?>" class="col-xs-10 col-sm-5" />
                                        </div>
                                </div>



                                <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name of Product</label>

                                        <div class="col-md-9">
                                            &nbsp;&nbsp;<input type="text" id="form-field-1" placeholder="Name of Product" name="p1" value="<?php echo $a1 ?>" class="col-xs-10 col-sm-5" required="required" />
                                        </div>
                                </div>
                                
                        <!--        <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Company</label>

                                        <div class="col-md-9">
                                            &nbsp;&nbsp;<input type="text" id="form-field-1" placeholder="Company" name="t2" class="col-xs-10 col-sm-5" required="required" />
                                        </div>
                                </div>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Product Price</label>

                                        <div class="col-md-9">

                                        
                                            <input type="number" id="form-field-1" placeholder="Product Price" name="t3" class="col-xs-10 col-sm-5" required="required" />
                                        </div>
                                        </div> -->
                                    

                                    



                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-info" type="Submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                Update
                                            </button>

                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                </div>  
                                <div class="col-md-12">
                                <div class="col-md-12">
                                <?php
                                    include("dbcon.php");
                                    $sql = "SELECT * FROM products";
                                    $retval = mysqli_query($conn,$sql);
                                    if(! $retval )
                                    {
                                      die('Could not get data: ' . mysqli_error($conn));
                                    }

                                ?>                                                 
                                    <div class="clearfix">
                                        <div class="pull-right tableTools-container"></div>
                                    </div>
                                    <div class="table-header">Detail / Per Month </div>
                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>                                                        
                                                    <th>Product ID</th>
                                                    <th>Product Name</th>                                                    
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($row = mysqli_fetch_assoc($retval))
                                                    { 

                                                ?>
                                                <tr>                                                    
                                                    <td><?php echo $row['pid']; ?></td>                                                   
                                                    <td><?php echo $row['pname']; ?></td>
                                                     <!--  <td><?php echo $row['pcompany']; ?></td>
                                                       <td><?php echo $row['pro_price']; ?></td> -->
                                                    <td><a href="update_product.php?id=<?php echo $row['pid'];?> "><button class="btn btn-info" type="submit">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>EDIT</button></td>

                                                    <td><a href="delete_product.php?id=<?php echo $row['pid'];?> "><button class="btn btn-danger" type="submit">
                                                    <i class="ace-icon fa fa-trash bigger-110"></i>DELETE</button></td>
                                                                                    
                                                 
                                                </tr>
                                                 <?php
                                                }
                                                ?>

                                            </tbody>
                                        </table>

                                    </div>    
                                    </div>    

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
                      <!-- <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Stock List</h3>
                        </div>
                        <!-- /.box-header -->
                       <!-- <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>
                                        <th>Item Unit</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Purchased Date</th>
                                        <th>Total</th>
                                        <th>Edit/Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("dbcon.php"); 
                                    $sql = "SELECT * FROM store_room";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['store_id']; ?></td>
                                        <td><?php echo $row['item_name']; ?></td>
                                        <td><?php echo $row['item_unit']; ?></td>
                                        <td><?php echo $row['item_qty']; ?></td>
                                        <td><?php echo $row['item_rate']; ?></td>
                                        <td><?php echo $row['item_pur_date']; ?></td>
                                        <td><?php echo $row['item_total']; ?></td>
                                     
                                        <td>
                                            <button v-on:click="editItem($event)" class="btn btn-primary btn-sm edit1" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            <a href="store_edit.php?del=<?php echo $row['store_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i>Delete</a>
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
                                <!--</tfoot>
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
                                    <form class="form-horizontal edit" method="post" action="store_edit.php" id="editform">
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
                                                     <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Item Unit</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="itmunit" placeholder="Item Name" required>
                                                        </div>
                                                    </div>

                                                     <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Item Quantity</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="itmqty" placeholder="Item Name" required>
                                                        </div>
                                                    </div>



                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail3" class="col-sm-4 control-label">Price</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" step="0.01" class="form-control" name="itmprc" placeholder="Price" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Purchased Date</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="pur_date" placeholder="Short Name" required>
                                                            
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
                $("#dynamic-table").DataTable();
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
        <script src="conn.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
       <script>
    $(document).ready(function(){
         $.validator.addMethod("alphabetsnspace", function(value, element) {
        return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
    });

        
        
        $('#addform').validate({
            rules :{
                
                itm :{
                    required:true,
                    
                    alphabetsnspace:true
                },
                
                shnam:
                {
                    required:true,
                    
                    alphabetsnspace:true
                },
                
                prc :{
                required:true
            }
                
              
                
                
                
            }
            
            , messages:
            {
                empname:{
                    alphabetsnspace: "Please Enter Only Letters"
                }
                
            }
            
            
            
        });
    });
                    </script>
                    
                    
                      <script>
            $(".edit1").click(function(){
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
                        form[5].value = (chil[5].innerHTML);
                     
                   
                    }
                },
                created: function(){
                    this.$http.get('item_insert.php?maxsl=1').then(function (data){
                        this.slno = parseInt(data.body);
                    });
                }
            });
        </script>
    </body>
</html>
