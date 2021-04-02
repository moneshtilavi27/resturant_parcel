<?php

// echo "<pre>"; print_r($_REQUEST);die;
$tabno="1";
$tabsec="parcel";
$st=1;
include("dbcon.php");
$sql="UPDATE  tabledata SET status='$st' WHERE tabno='$tabno' and tabsec='$tabsec' ";

if (!mysqli_query($conn,$sql)) {
    die('Error: ' . mysqli_error($conn ));
}

header("Location:table_form.php?tabsec=$tabsec&tabno=$tabno");

?>