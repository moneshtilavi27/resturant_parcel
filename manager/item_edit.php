<?php
include("dbcon.php");


// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM item WHERE slno='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="item_form.php";</script>';
}
// End Delete


if(isset($_POST['slno'],$_POST['itmnam'])){
    $id = $_POST['slno'];
    $itmnam = $_POST['itmnam'];
    $qty = $_POST['qty'];
    $prc = $_POST['prc'];
    //$prc2 = $_POST['prc2'];

    $sql="UPDATE item SET itmnam='$itmnam', qty='$qty', prc='$prc' WHERE slno='$id' ";

    if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn ));
    }
    echo '<script>alert("Record Updated");</script>';
    echo '<script>location="item_form.php";</script>';
}


?>