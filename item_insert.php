
<?php
include("dbcon.php");
 $itmnam = $_POST['itm'];
 $qty = $_POST['qty'];
 $prc = $_POST['prc'];
//echo  $_POST['shnam'];

$mtype=0;
$prc2=0;
$shnam =0;

 $sql="INSERT INTO `item`(`item_cat`, `itmnam`, `qty`, `mtype`, `prc`, `prc2`, `shnam`) VALUES ('cat1','$itmnam','0','$mtype','$prc','$prc','$mtype')";
mysqli_query($conn, $sql) ;

  echo '<script>alert("The item was Added Successfully");</script>';
    echo '<script>location="item_form.php";</script>'; 

?>