<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Beyond Temptation</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="plugins/select2/select2.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="dist/css/style.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">


        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper" id="form1">

            <?php require_once("header.php"); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Available Stock
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Available Stock</a></li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- SELECT2 EXAMPLE -->
                   
                    <!-- /.box -->
<script>
                    
                                 function divertt() {
                //alert('hiiiiii');
                var wingname = document.getElementById('company').value;
        //alert(wingname);
                $.ajax({
                    url: 'cmaster.php',
                    type: "POST",
                    dataType:'json',
                    data:  { 
                        wingname:wingname
                    }
                    , success:function(data) {
                        
//                        alert(data);
                        
                        $("#itemname option").remove();
var x = document.getElementById("itemname");
for(var i=0;i<data.length;i++)
{
    var option = document.createElement("option");
    option.text = data[i];

    x.add(option);
     }
                        
                        
                        
               var wingname = document.getElementById('itemname').value;           
                 $.ajax({
                    url: 'cmaster1.php',
                    type: "POST",
                    dataType:'json',
                    data:  { 
                        wingname:wingname
                    }
                    , success:function(data) {
                        
                    //  alert(data);
                        
                        $("#cid").val(data);
                        
                  var wingname = document.getElementById('itemname').value;            
                  $.ajax({
                    url: 'cmaster2.php',
                    type: "POST",
                    dataType:'json',
                    data:  { 
                        wingname:wingname
                    }
                    , success:function(data) {
//                        alert(data);
                         $("#price").val(data);
                        
                        
                    }
                 });
 
                        
                        
                        
  }
                                     
                                     
       }); 
                        
                        
                        
  }
                    
                    
                                 
                                     
                                     
                    
                    
                    
                    
                });
            }

                                 </script>
                    <!-- Table -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Available Stock Records</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Item Name</th>
                                        <th>Minimum Quantity</th>
                                        <th>Remaining Quantity</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Date</th>
<!--                                        <th>Edit/Delete</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once("dbcon.php");
                                    $sql = "SELECT * FROM store_room";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) 
										{
											
											$item_name = $row['item_name'];
											$m_qty = $row['mqty'];
											
											 $sql1 = "SELECT * FROM `store_room_finish` WHERE fid=(SELECT max(fid) FROM `store_room_finish` WHERE `item_name_finish`='$item_name')";
											$result1 = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($result1) > 0) 
											{
												while($row1= mysqli_fetch_assoc($result1)) {
													
													$r_qty = $row1['f_item_rem_qty'];
												}
											}
											// if($r_qty <= $m_qty && $r_qty!="")
											// 	echo "<tr style='background:#fda5a5;'>";
											// else
											// 	echo "<tr style='background:white;'>";
									?>
                                        <td><?php echo $row['store_id']; ?></td>
                                        <td><?php echo $row['item_name']; ?></td>
                                        <td><?php if($m_qty!="")  echo $row['mqty']; else echo"---";?></td>
                                        <td><?php echo $row['item_qty']; ?></td>
                                        <td><?php echo ucfirst($row['item_unit']); ?></td>
                                        <td><?php echo $row['item_rate']; ?></td>
                                        <td><?php echo $row['item_total']; ?></td>
                                        <!--<td><?php echo $row['item_pur_date']; ?></td>-->
										<td><?php echo date("d-M-Y", strtotime( $row['item_pur_date'])); ?></td>
<!--
                                        <td>
                                            <button class="btn btn-primary btn-sm edit" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-edit"></i>Edit</button>
                                            <a  class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i>Delete</a>
                                        </td>
-->
                                    </tr>
                                    <?php    }
                                    }
                                    ?>
                                </tbody>
                                 <script>
                                function dell()
                                    {
                                        var x=confirm("Are you Sure to delete it");
                                        if(x)
                                            {
                                                var url='purdit.php?del=<?php echo $row['slno'];?>&db=stockded';
                                                location.assign(url);
                                                
                                            }else{
                                                return false;
                                            }
                                    }
                                </script>
                                
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
                                    <form class="form-horizontal" method="post" action="purdit.php" id="editform">
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
                                                            <input type="text" class="form-control" name="item" placeholder="Item Name" required>
                                                        </div>
                                                    </div>
                                                    
                                                     <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Quantity</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" onblur="calcc1()" class="form-control" name="qty" id="qty1" placeholder="Item Name" required>
                                                        </div>
                                                    </div>




                                                   
                                                    <div class="form-group col-md-12">
                                                        <label for="inputEmail3" class="col-sm-4 control-label">Price</label>
                                                        <div class="col-sm-6">
                                                            <input type="number" onblur="calcc1()"  class="form-control" name="price" id="price1" placeholder="Price" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="inputPassword3" class="col-sm-4 control-label">Total</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" readonly name="total" id="total1" placeholder="Description" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name='db' value="stockded" >
                                                </div>
                                                
<!--                                                 <input type="hidden" name="qty" value="1" >-->
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
		
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>


        <script src="dist/js/vue/vue.js"></script>
        <script src="dist/js/vue/vue-resource@1.3.4.js"></script>
        <script src="dist/js/vue/vee-validate.js"></script>

        <script>
            $(function () {
                //$("#example1").DataTable();
				$("#example1").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[25, 10, 100, -1], [25, 10, 100, "All"]],
                    buttons: [
								'print'
							],
					order:[[6,"desc"]]
					
                });
                
            });
        </script>



        <script>
         
                    $(".edit").click(function(){
                        var child = $(this).closest('tr');
						
						 var form = $("#editform input");
//console.log(child);
                        form[0].value = (child.children()[0].innerHTML);
                        form[1].value = (child.children()[1].innerHTML);
                        form[2].value = (child.children()[2].innerHTML);
                        form[3].value = (child.children()[3].innerHTML);
                        form[4].value = (child.children()[4].innerHTML);
//                        form[5].value = (child.children()[5].innerHTML);
						//form[5].value = (child.children()[5].innerHTML);
						//form[6].value = (child.children()[6].innerHTML);
                    });
               
           
        </script>
    </body>
</html>
