
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
//echo "<pre>"; print_r($_REQUEST);die;

$itmnam = $_POST['pname'];
$itmunit = $_POST['unit'];
$qty = $_POST['qty'];
$mqty = $_POST['mqty'];
$prc = $_POST['prc'];
$purdate = $_POST['purdate'];
$tot = $qty * $prc;

$sql1 = "SELECT * FROM store_room";
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
        $itmnam1=$row1['item_name'];
        $qty2=$row1['item_qty'];
        $itmtot=$row1['item_total'];

    }
}
if($itmnam1==$itmnam)
{
	$qty1=$qty2+$qty;
	$tot1=$tot + $itmtot;
 echo $sql="UPDATE  store_room SET item_qty='$qty1', mqty='$mqty', item_total='$tot1' where item_name='$itmnam'";
mysqli_query($conn, $sql) ;

  echo '<script>alert("The item was Added Successfully");</script>';
   echo '<script>window.location="store_form.php";</script>'; 
}
else{
	$sql="INSERT into  store_room VALUES('','$itmnam','$itmunit','$qty','$prc','$purdate','$tot','$mqty')";
mysqli_query($conn, $sql) ;

 echo '<script>alert("The item was Added Successfully");</script>';
   echo '<script>window.location="store_form.php";</script>'; 
}



?>