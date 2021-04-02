<?php


require_once('dbcon.php');
 $itmno=$_POST['wingname'];
 //$itmsec=$_POST['wingsec'];

$a = array();

$sql = "SELECT * FROM item WHERE slno='$itmno'";
 $result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        array_push($a,$row['slno'],$row['itmnam'],$row['qty'],$row['prc']);
    }
}
// if($itmsec=="Ground")
// {
// 	$sql = "SELECT * FROM item WHERE slno='$itmno' and mtype='veg'";
// 	$result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         array_push($a,$row['slno'],$row['itmnam'],$row['qty'],$row['prc']);
//     }
// }
// }
// else if($itmsec=="First")
// {
// 	$sql = "SELECT * FROM item WHERE slno='$itmno'";
// 	$result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         array_push($a,$row['slno'],$row['itmnam'],$row['qty'],$row['prc2']);
//     }
// }
// }
// else if($itmsec=="Lodge")
// {
//     $sql = "SELECT * FROM item WHERE slno='$itmno'";
//     $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//     // output data of each row
//     while($row = mysqli_fetch_assoc($result)) {
//         array_push($a,$row['slno'],$row['itmnam'],$row['qty'],$row['prc2']);
//     }
// }
// }


echo json_encode($a);

?>