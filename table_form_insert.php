<?php
include("dbcon.php");

if(isset($_POST['itmno'],$_POST['itmnam'],$_POST['tabno']))
{
    $date = $_POST['date'];
    $ymd = DateTime::createFromFormat('m/d/Y', $date)->format('Y-m-d');
    $itmno = $_POST['itmno'];
    $itmnam = $_POST['itmnam'];
    $shnam = $_POST['shnam'];
    $captain = $_POST['captain'];
    $prc = $_POST['prc'];
    $qty = $_POST['qty'];
    $tot = $_POST['tot'];
    echo $tabno = $_POST['tabno'];
    $tabsec = $_POST['tabsec'];
    $query="SELECT * FROM `temtable` WHERE `itmno`='$itmno' AND `tabno`='$tabno';;";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $row = mysqli_fetch_array($c);
        $qty = $row['qty']+$qty;
        $tot = $qty * $prc;
        $sql="UPDATE `temtable` SET `prc`='$prc',`qty`='$qty',`tot`='$tot' WHERE `itmno`='$itmno';";
    }else{
        $sql="INSERT into temtable VALUES('','$ymd','$itmno','$itmnam','$shnam','$prc','$qty','$tot','$tabno','$tabsec',0,1,'$captain');";
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