<?php
include("dbcon.php");
function getBillno($conn){
    $retval2 = mysqli_query($conn,"SELECT max(slno) FROM tabletot");
    $row2 = mysqli_fetch_assoc($retval2);
    $cnt=$row2['max(slno)'];
    return ++$cnt;
}

if(isset($_POST['itmno'],$_POST['itmnam'],$_POST['tabno']))
{
    $date = $_POST['date'];
    $ymd = DateTime::createFromFormat('m/d/Y', $date)->format('Y-m-d');
    $itmno = $_POST['itmno'];
    $itmnam = $_POST['itmnam'];
    $shnam = $_POST['shnam'];
    $captain = $_POST['captain'];
    $prc = $_POST['prc'];
    $qtyy = $_POST['qty'];
    $tot = $_POST['tot'];
    echo $tabno = $_POST['tabno'];
    $tabsec = $_POST['tabsec'];
    $query="SELECT * FROM `temtable` WHERE `itmno`='$itmno' AND `tabno`='$tabno';;";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $row = mysqli_fetch_array($c);
        $qty = $row['qty']+$qtyy;
        $itmnam = $row['itmnam'];
        $tot = $qty * $prc;
        $sql="UPDATE `temtable` SET `prc`='$prc',`qty`='$qty',`tot`='$tot' WHERE `itmno`='$itmno';";
        $cnt = getBillno($conn);
        $qty1 = $row['qty'];
        if($qty1>$qtyy)
        {
            mysqli_query($conn,"INSERT INTO `manager_record`(`mg_id`, `date`, `bill_no`, `itmnam`, `oldqty`, `newqty`, `rate`, `tabno`) VALUES ('','$ymd','$cnt','$itmnam','$qty1','$qty','$prc','$tabno')");
        }

    }else{
        $sql="INSERT into temtable VALUES('','$ymd','$itmno','$itmnam','$shnam','$prc','$qtyy','$tot','$tabno','$tabsec',0,1,'$captain');";
    }
    if (!mysqli_query($conn, $sql)) {
        echo 'Error: ' . mysqli_error($conn );
    }
}


if(isset($_POST['tabno'],$_POST['cancel']))
{
    echo $tabno = $_POST['tabno'];
    $sql="DELETE FROM `temtable` WHERE `tabno`='$tabno';";
    if (!mysqli_query($conn, $sql)) {
        echo 'Error: ' . mysqli_error($conn );
    }
    $cnt = getBillno($conn);
   if (!mysqli_query($conn, "DELETE FROM `manager_record` WHERE `bill_no`='$cnt';")) {
        echo 'Error: ' . mysqli_error($conn );
    }
}

if(isset($_POST['delete'],$_POST['itmno'],$_POST['table_no']))
{
    $table_no = $_POST['table_no'];
    $itmno = $_POST['itmno'];
    $query="SELECT * FROM `temtable` WHERE `itmno`='$itmno' AND `tabno`='$table_no';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="DELETE FROM `temtable` WHERE `itmno`='$itmno' AND `tabno`='$table_no';";
        if (!mysqli_query($conn, $sql)) {
            echo 'Error: ' . mysqli_error($conn );
        }
    }
}
?>