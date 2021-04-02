<?php
include('connect.php');


$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
  $date1=$date->format('Y-m-d H:i:s');

$date = date("d-m-Y", strtotime($date1));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Diana Delight</title>
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
        <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

 <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
        Employee Attendence
        <small>Give Employee Attendence</small>
      </h1>

        <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Give Employee Attendence</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->


                  <div class="x_content" id="div1" style="overflow: auto;">
                 

                   <table   class="table table-striped table-bordered " id="tble" >
                        <thead>
                        <tr>
                        <th>Employee ID</th>
                           <th>Full Name</th>
                           
                           <th>Mobile No</th>
                           <th>Date</th>
                           <th>Ck</th>
                          <th>Attendence</th>
                          <th>Timing</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                     //   $classs=$_POST['x'];
                       // $batch=$_POST['y'];

                         $empno=$_POST['empno'];

//session_start();
 //if (isset($_SESSION['WEB_SES'])){
 //$Array = explode("^", $_SESSION['WEB_SES']);
 //$classs = $Array[0];
 //$batch = $Array[1];
   //                     echo $classs;
     //                   echo $batch;} 
                        //where classs='$classs' and batch='$batch'";
            $sql="select * from empreg where empid='$empno'";
            $res=mysqli_query($connection,$sql);
             $i=1;
            while($row=mysqli_fetch_array($res))
           {

              $empno=$row['empid'];
            //  echo "<tr><td>".$row["invoiceno"]."</td><td>".$row["itemname"]."</td><td>".$row["descript"]."</td><td>".$row["rate"]."</td><td>".$row["quantity"]."</td><td>".$row["nettotal"]."</td></tr>";
            echo "<tr id='tbletr'> <td>{$row['empid']}</td> <td>{$row['empname']} </td> <td>{$row['mobile']}</td><td>{$date}</td> <td>
            <input type='checkbox'  id='{$row['empid']}'></td>
            <td><input type='text' name='{$row['empid']}' readonly disabled></td><td>
              <select id=timing name=timing>
              <option>10am-5pm</option>
              <option>5pm-6pm</option>
              <option>6pm-7pm</option>
              <option>7pm-8pm</option>
              <option>8pm-9pm</option>
              <option>5pm-7pm</option>
              <option>5pm-9pm</option>
              </select>
            </td></tr>\n";
             
             $j=$row['empid'];

              echo "<script>
                 $('#{$row['empid']}').prop('checked', 'true');
                  
                  document.getElementsByName($j)[0].value='Present';
                </script>";
      
             $i++;
  //echo $i;


            }

            ?>
         

                      
                      </tbody >
                    </table>

                    <script type="text/javascript">



$("input:checkbox").change(function() {

    var someObj = {};
    someObj.fruitsGranted = [];
    someObj.fruitsDenied = [];

    $("input:checkbox").each(function() {
        if ($(this).is(":checked")) {
            someObj.fruitsGranted.push($(this).attr("id"));
            for(i=0;i<someObj.fruitsGranted[i];i++){
  var id=someObj.fruitsGranted[i];
 // alert(id);
document.getElementsByName(id)[0].value="Present";}

        } else {
            someObj.fruitsDenied.push($(this).attr("id"));
            for(i=0;i<someObj.fruitsDenied[i];i++){
var id1=someObj.fruitsDenied[i];
 //alert(id);
document.getElementsByName(id1)[0].value="Absent";



}
        }
    });

    
   // window.alert(someObj.fruitsGranted[0]);

/*for(i=0;i<someObj.fruitsGranted[i];i++){
  var id=someObj.fruitsGranted[i];
 // alert(id);
document.getElementsByName(id)[0].value="present";}

for(i=0;i<someObj.fruitsDenied[i];i++){
var id1=someObj.fruitsDenied[i];
 //alert(id);
document.getElementsByName(id1)[0].value="abscent";



}*/
//document.write(id);}
/*$(document).ready(function() {
    //set initial state.
    $('#12').val($(this).is(':checked').value="abscent");
    
    $('#1').change(function() {
        $('#12').val($(this).is(':checked'));
        document.getElementById('12').value="present";
    });
*/
   

//alert("GRANTED: " + someObj.fruitsGranted);
  //  alert("DENIED: " + someObj.fruitsDenied);
});
 
 /*$("input:checkbox").change(function() {
        if (!$(this).is(':checked') ) {
          $("input:checkbox").each(function() {
        if ($(this).is(":checked")) {
            someObj.fruitsGranted.push($(this).attr("id"));
        } else {
            someObj.fruitsDenied.push($(this).attr("id"));
        }
    });

          for(i=0;i<someObj.fruitsDenied[i];i++){
var id1=someObj.fruitsDenied[i];
 //alert(id);
document.getElementsByName(id1)[0].value="abscent";



}

        }
    }
    );
});*/


 
</script>






                  </div>
                 
                 
                 <p align="right">
   <!-- <button class="btn btn-primary" style="align-content: right" onclick="printcontent('div1')">Print</button> -->
 
  <a class="btn btn-primary"   style="align-content: right" onclick="divert()" >Save</a>
  <a class="btn btn-primary" style="align-content: right" href="empatt.php" >Cancel</a>
 </br></br>
 
              </p>
                
              </div>
               
                      <script>
         function divert1(){
          var someObj={};
Granted=[];
Denied=[];

$("input:checkbox").each(function(){
    var $this = $(this);

    if($this.is(":checked")){
        Granted.push($this.attr("id"));
    }else{
      Denied.push($this.attr("id"));
    } 
          });



            

   $.ajax({
  url: "confirm1.php",
  type: "POST",
  data:  { abscent:Denied 
  }
           

     , success:function(data) {

    // alert(data);
    
  var url="sendtoselected2.php?classs="+selectbox+"&batch="+selectbox1+"&date="+selectbox2;
             location.assign(url);



}

});
          
         }



      function divert(){
       // alert('hii');
         var someObj={};
Granted=[];
Denied=[];
mobileno=[]
$("input:checkbox").each(function(){
    var $this = $(this);

    if($this.is(":checked")){
        Granted.push($this.attr("id"));
    }else{
      Denied.push($this.attr("id"));
    } 

});

 

//printcontent('div1')


 
  var arrayJSON = JSON.stringify(Granted);
 // alert(arrayJSON);
sessionStorage.setItem("tabledata",arrayJSON);
 
          $.ajax({
  url: "confirm.php",
  type: "POST",
  data:  { present:Granted }
           

     , success: function(data) {
     // alert(data);
            
    $.ajax({
  url: "confirm1.php",
  type: "POST",
  data:  { abscent:Denied }
           

     , success: function(data) {

 // alert(data);
           var timing=document.getElementById('timing').value;
         var url="confirm2.php?timing="+timing;
         location.assign(url);           

     }
});

     }
});

          //.done(function( msg ) {
  //alert( "Data Saved: " +msg);
        //  });  

      }



    function printDiv() {
      var divToPrint = document.getElementById('tble');
      newWin = WINDOW.open("");
      newWin.document.write(divToPrint.outerHTML);
      newWin.print();
      newWin.close();
   }

   $('button').on('click',function(){
printData();
})
</script>
          








                          






       </section>



    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
             </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
           </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
           
          <!-- /.box -->

          <!-- solid sales graph -->
          
          <!-- /.box -->

          <!-- Calendar -->
           
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    &copy Payroll Management System Developed by -<a href="https://evonitsolutions.com" target="blank">EVON IT SOLUTIONS</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!--<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>-->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->

<!-- <script src="dist/js/jquery.min.js"></script>-->

<!-- jQuery 2.2.3 -->
<!--<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>-->
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
