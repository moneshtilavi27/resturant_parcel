
<?php
include("dbcon.php");
if(isset($_POST['itmno'],$_POST['itmnam']))
{
    $date = $_POST['date'];
    $itmno = $_POST['itmno'];
    $itmnam = $_POST['itmnam'];
    $shnam = $_POST['shnam'];
    $prc = $_POST['prc'];
    $qty = $_POST['qty'];
    $tot = $_POST['tot'];
    $tabno = "-";
    $tabsec = "parcel";
    
    $query="SELECT * FROM `parcel` WHERE `itmno`='$itmno';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="UPDATE `parcel` SET `qty`='$qty',`tot`='$tot' WHERE `itmno`='$itmno';";
    }else{
        $ymd = DateTime::createFromFormat('m/d/Y', $date)->format('Y-m-d');
        $sql="INSERT into `parcel` VALUES('','$ymd','$itmno','$itmnam','$shnam','$prc','$qty','$tot','$tabno','$tabsec',0,1,'')";
    }
    if (!mysqli_query($conn, $sql)) {
        echo 'Error: ' . mysqli_error($conn );
    }
}

if(isset($_POST['delete'],$_POST['itmno']))
{
    $itmno = $_POST['itmno'];
    $query="SELECT * FROM `parcel` WHERE `itmno`='$itmno';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="DELETE FROM `parcel` WHERE `itmno`='$itmno';";
        if (!mysqli_query($conn, $sql)) {
            echo 'Error: ' . mysqli_error($conn );
        }
    }
}
?>