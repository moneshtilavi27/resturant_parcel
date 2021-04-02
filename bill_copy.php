<?php
include("dbcon.php");
echo $bill_no = $_GET['bill_no'];
//insert into table
$sql1 = "INSERT INTO parcel (date,itmno,itmnam,prc,qty,tot,tabno,tabsec,billno) SELECT date,itmno,itmnam,prc,qty,tot,tabno,tabsec,billno FROM tabledata where `billno`='$bill_no';";

if (!mysqli_query($conn, $sql1)) {
    echo json_encode('Error: ' . mysqli_error($conn ));
}else{
    echo '<script>location="bill_edit.php?bill_no='.$bill_no.'";</script>';
}

?>