<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" id="form1">
        <style>
        .error {
            color: red;
        }
        </style>
        <?php 
			require_once("header.php");
			require_once("dbcon.php");
			 $cnt = 0;
    $sql1 = "SELECT max(empid) FROM empreg";
    $retval1 = mysqli_query($conn, $sql1 );

    if(! $retval1 ) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    while($row1 = mysqli_fetch_assoc($retval1)) {
        $cnt=$row1['max(empid)'];
        $cnt++;
    }
			?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Employee Registration
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Item Master</a></li>
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
                            <form class="form-horizontal" name="form1" id="form11" method="post"
                                action="empreginsert.php" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Select User</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" id="type" name="type" required>
                                                    <option value="">Select User</option>
                                                    <?php
                                                    $query="SELECT DISTINCT * FROM `userlist`;";
                                                    $c=mysqli_query($conn, $query);
                                                    while($row = mysqli_fetch_array($c))
                                                    {?>
                                                    <option><?php echo $row['user']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="button" data-toggle="modal" data-target="#finalModal"
                                            class="btn btn-warning">Add User</button>
                                    </div>


                                    <div class="row">

                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Emp_Id</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" placeholder="Emp Id"
                                                    name="empid" id="empid" value="<?php echo $cnt; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Emp_Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="empname" id='empname'
                                                    placeholder="Employee Name">
                                                <!--span style="color: red" v-if="attemptSubmit && missingItmnam">This field is required.</span-->
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="address"
                                                    placeholder="Address">
                                                <!--span style="color: red" v-if="attemptSubmit && missingQty">This field is required.</span-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">Mobile</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="mobile"
                                                    placeholder="Mobile">
                                                <!--span style="color: red" v-if="attemptSubmit && missingPrc">This field is required.</span-->
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">ID Proof</label>
                                            <div class="col-sm-8">
                                                <input type="file" class="form-control" name="upl1" placeholder="ID"
                                                    accept="image/*">
                                                <!--span style="color: red" v-if="attemptSubmit && missingShnam">This field is required.</span-->
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Monthly
                                                Salary</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" name="salary" min='0'
                                                    placeholder="Monthly Salary">
                                                <!--span style="color: red" v-if="attemptSubmit && missingShnam">This field is required.</span-->
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row" id="unamepass" style="display:none">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail3" class="col-sm-4 control-label">User Name</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="uname"
                                                    placeholder="User Name">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control" name="password"
                                                    placeholder="Password">
                                            </div>
                                        </div>

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
                        <h3 class="box-title">Employee Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Emp_Id</th>
                                    <th>Emp_Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th>ID</th>
                                    <th>Monthly Salary</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>Type</th>
                                    <th>Edit/Delete</th>
                                    <!-- <th>Pay Salary</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require_once("dbcon.php");
                                    $sql = "SELECT * FROM empreg";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                <tr>
                                    <td><?php echo $row['empid']; ?></td>
                                    <td><?php echo $row['empname']; ?></td>
                                    <td><?php echo $row['address']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><img src="./<?php echo $row["path1"]; ?>" width="100" height="50" /></td>
                                    <td><?php echo $row['salary']; ?></td>
                                    <td><?php echo $row['uname']; ?></td>
                                    <td><?php echo $row['pass']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td>
                                        <button class="btn btn-primary btn-sm edit" data-toggle="modal"
                                            data-target="#myModal"><i class="fa fa-fw fa-edit"></i></button>
                                        <a href="empedit.php?del=<?php echo $row['empid'];?>"
                                            class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a>
                                    </td>
                                    <!--<td>
                                            
                                            <button class="btn btn-primary btn-sm edit1" data-toggle="modal" data-target="#myModal1">Pay Salary</button>
                                        </td>-->
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
                                <form class="form-horizontal" method="post" action="empedit.php" id="editform"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <!-- Horizontal Form -->

                                            <!-- /.box-header -->
                                            <!-- form start -->

                                            <div class="box-body">

                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3" class="col-sm-4 control-label">Select
                                                        User</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="type" name="type" required>
                                                            <option value="">Select User</option>
                                                            <option value="Captain">Captain</option>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3"
                                                        class="col-md-4 control-label">Emp_Id</label>
                                                    <div class="col-md-4">
                                                        <input type="number" class="form-control" placeholder="empid"
                                                            name="empid" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3"
                                                        class="col-sm-4 control-label">Emp_Name</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="empname"
                                                            placeholder="Emp Name" required>
                                                    </div>
                                                </div>




                                                <!--input type="hidden" name="qty" value="1" -->
                                                <div class="form-group col-md-12">
                                                    <label for="inputEmail3"
                                                        class="col-sm-4 control-label">Address</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="address"
                                                            placeholder="Address" required>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3"
                                                        class="col-sm-4 control-label">Mobile</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="mobile"
                                                            placeholder="Mobile" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3"
                                                        class="col-sm-4 control-label">ID</label>
                                                    <div class="col-sm-6">
                                                        <input type="file" class="form-control" name="upl1"
                                                            placeholder="ID" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Monthly
                                                        Salary</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="salary"
                                                            placeholder="Salary" required>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12" style="display: none;">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">User Name
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <input type="text" id="unamefield" class="form-control"
                                                            name="uname" placeholder="User Name">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12" style="display: none;">
                                                    <label for="inputPassword3" class="col-sm-4 control-label">Password
                                                    </label>
                                                    <div class="col-sm-6">
                                                        <input type="password" id="passfield" class="form-control"
                                                            name="password" placeholder="Password">
                                                    </div>
                                                </div>

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



                    <script>
                    function calce() {
                        //        salary
                        //advance
                        //overtime
                        //deduction
                        //totalsal
                        //takesal
                        //balance

                        var salary = parseInt(document.getElementById('salary').value);
                        var advance = parseInt(document.getElementById('advance').value);
                        var overtime = parseInt(document.getElementById('overtime').value);
                        var deduction = parseInt(document.getElementById('deduction').value);
                        //      var  totalsal=document.getElementById('totalsal').value;
                        //      var  balance=parseInt(document.getElementById('balance').value);

                        var totalsal = salary - advance + overtime - deduction;
                        document.getElementById('totalsal').value = totalsal;
                        //        alert(totalsal);




                    }


                    function calce1() {
                        var balance = parseInt(document.getElementById('bal').value);
                        var totalsal = parseInt(document.getElementById('totalsal').value);
                        var takesal = parseInt(document.getElementById('takesal').value);
                        var balance = totalsal - takesal + balance;
                        document.getElementById('balance').value = balance;
                    }
                    </script>

                </div>
                <!-- End Table -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php //require_once("footer.php"); ?>
        <!--Salary Modal-->
        <div class="modal fade" id="finalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><b>Add User</b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box-body form1">
                            <div class="form-group col-md-12">
                                <label for="exampleInputFile">User</label>
                                <input type="text" class="form-control" id="user" placeholder="user">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" onclick="submit();" id="adduser"
                                class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="control-sidebar-bg"></div>

    </div>
    </div>
    <!-- Modal -->
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
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
    $(function() {
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


    $("#type").change(function() {
        if ($('#type').val() == "Captain")
            $("#unamepass").css("display", "block");
        else
            $("#unamepass").css("display", "none");
    });
    </script>



    <script>
    $(".edit").click(function() {
        var child = $(this).closest('tr');

        var form = $("#editform input");
        console.log(child);
        form[0].value = (child.children()[0].innerHTML);
        form[1].value = (child.children()[1].innerHTML);
        form[2].value = (child.children()[2].innerHTML);
        form[3].value = (child.children()[3].innerHTML);
        //form[4].value = (child.children()[4].innerHTML);
        form[5].value = (child.children()[5].innerHTML);
        if ((child.children()[8].innerHTML) == "Captain") {
            $("#unamefield").attr('readonly', "");
            $("#passfield").attr('readonly', "");
            form[6].value = (child.children()[6].innerHTML);
            form[7].value = (child.children()[7].innerHTML);

        } else {
            form[6].value = "";
            form[7].value = "";
            $("#unamefield").attr('readonly', true);
            $("#passfield").attr('readonly', true);
        }
    });
    </script>

    <script>
    $(".edit1").click(function() {
        var child = $(this).closest('tr');

        var form = $("#editform1 input");

        //console.log(child);
        var wingname = (child.children()[0].innerHTML);
        $.ajax({
            url: 'advprs.php',
            type: "POST",
            dataType: 'json',
            data: {
                wingname: wingname
            },
            success: function(data) {
                //                       alert(data);
                //                        console.log(data);
                //                        $("#empname").val(data[0]);
                //                        var b=data[0]
                //                        if(isset(data[0]) && !empty(data[0]))
                //                            {
                //                              
                //                            }else{
                //                                 b=0;
                //                            }
                form[5].value = data[0];
                form[10].value = data[1];
                form[12].value = data[1];
                //                        $("#prc").val(data[3]);

            }
        });

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
    function sum() {
        var txtFirstNumberValue = document.getElementById('txt3').value;
        var txtSecondNumberValue = document.getElementById('txt4').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt17').value = result;
        }
    }

    function submit() {
        let user = $('#user').val();
        if (user != "") {
            $.ajax({
                url: 'adduser.php',
                type: "POST",
                data: {
                    user: user
                },
                success: function(data) {
                    // alert(data);
                    window.location.href = 'empreg.php';
                }
            });
        } else {
            alert("Empty field")
        }
    }
    </script>
    <script>
    $(document).ready(function() {
        $.validator.addMethod("alphabetsnspace", function(value, element) {
            return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
        });



        $('#form11').validate({
            rules: {
                empname: {
                    required: true,

                    alphabetsnspace: true
                },
                mobile: {
                    digits: true,
                    minlength: 10,
                    maxlength: 10
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
</body>

</html>