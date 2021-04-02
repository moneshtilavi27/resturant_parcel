<?php
include("dbcon.php");


// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM store_room WHERE store_id='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="store_form.php";</script>';
}
// End Delete


$id = $_POST['slno'];
$itmnam = $_POST['itmnam'];
$qty = $_POST['itmqty'];
$mqty = $_POST['itmmqty'];
$prc = $_POST['itmprc'];
$pdate= $_POST['pur_date'];


$tot1=$qty * $prc;


$sql="UPDATE store_room SET item_name='$itmnam', item_qty='$qty', mqty='$mqty', item_rate='$prc', item_pur_date='$pdate',item_total='$tot1' WHERE store_id='$id' ";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn ));
}
echo '<script>alert("Record Updated");</script>';
echo '<script>location="store_form.php";</script>';

?>