
<?php
include("dbcon.php");

//if($_GET['maxsl']){
//    $cnt = 0;
//    $sql1 = "SELECT max(slno) FROM item";
//    $retval1 = mysqli_query($conn, $sql1 );
//
//    if(! $retval1 ) {
//        die('Could not get data: ' . mysqli_error($conn));
//    }
//    while($row1 = mysqli_fetch_assoc($retval1)) {
//        $cnt=$row1['max(slno)'];
//        $cnt++;
//    }
//    
//    echo json_encode($cnt);
//    exit();
//}
// echo "<pre>"; print_r($_REQUEST);die;
$itmid = $_POST['itmid'];
$itmnam = $_POST['itmname'];
$itmunit = $_POST['itmunit'];
$remqty = $_POST['remqty'];
$itmqty = $_POST['itmqty'];
$gdate = $_POST['gvndate'];
$remqty1 = $remqty - $itmqty;
//$dt=array($itmid,$itmnam,$itmunit,$remqty,$itmqty,$gdate,$remqty1);

// echo "<pre>"; print_r($dt);die;


$sql="INSERT into  store_room_finish VALUES('','$itmid', '$itmnam','$itmunit','$remqty1','$itmqty','$gdate','kitchen1')";
mysqli_query($conn, $sql) ;

  // echo '<script>alert("The item was Added Successfully");</script>';
  //   echo '<script>location="kitchen_form.php";</script>'; 


echo $sql1="UPDATE store_room SET item_qty='$remqty1' WHERE item_name='$itmid' ";

if (!mysqli_query($conn, $sql1)) {
    die('Error: ' . mysqli_error($conn ));
}
echo '<script>alert("Record Updated");</script>';
echo '<script>location="kitchen_form.php";</script>';

?>