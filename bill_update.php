<?php
include("dbcon.php");
if(isset($_POST['tabno'], $_POST['itmno']))
{
    $date = $_POST['date'];
    $itmno = $_POST['itmno'];
    $itmnam = $_POST['itmnam'];
    $shnam = $_POST['shnam'];
    $prc = $_POST['prc'];
    $qty = $_POST['qty'];
    $tot = $_POST['tot'];
    $tabno = $_POST['tabno'];
    $tabsec = $_POST['tabsec'];
    $query="SELECT * FROM `parcel` WHERE `itmno`='$itmno';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="UPDATE `parcel` SET `shnam`='',`qty`='$qty',`tot`='$tot' WHERE `itmno`='$itmno';";
    }else{
        $sql="INSERT into `parcel` VALUES('','$ymd','$itmno','$itmnam','$shnam','$prc','$qty','$tot','$tabno','$tabsec',0,1,'')";
    }
    if (!mysqli_query($conn, $sql)) {
        echo 'Error: ' . mysqli_error($conn );
    }
}




if(isset($_POST['delete'], $_POST['itmno']))
{
    $itmno = $_POST['itmno'];
    $query="SELECT * FROM `parcel` WHERE `itmno`='$itmno';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="UPDATE `parcel` SET `shnam`='delete',`qty`='1',`tot`='1' WHERE `itmno`='$itmno';";
        if (!mysqli_query($conn, $sql)) {
            echo 'Error: ' . mysqli_error($conn );
        }
    }
}

if(isset($_POST['save'],$_POST['billno']))
{
    $billno = $_POST['billno'];
    $grandtotal="";
    $query="SELECT * FROM `parcel`;";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        while($row=mysqli_fetch_array($c))
        {
            $itemno = $row['itmno'];
            $prc = $row['prc'];
            $qty = $row['qty'];
            $tot= $row['tot'];
            $shnam = $row['shnam'];
            $query1="SELECT * FROM `tabledata` WHERE `billno` = '$billno' AND `itmno` ='$itemno';";
            $c1=mysqli_query($conn, $query1);
            if(mysqli_num_rows($c1)!=0)
            {
                if($shnam=="delete"){
                    // delete item from table data
                    $sql1="DELETE FROM `tabledata` WHERE `itmno`='$itemno';";
                }
                else{
                    // update the bill data
                    $sql1="UPDATE `tabledata` SET `prc`='$prc',`qty`='$qty',`tot`='$tot' WHERE `itmno`='$itemno' AND `billno` = '$billno';";
                    $grandtotal += $tot;
                }
                $c2=mysqli_query($conn, $sql1);
                $sq="TRUNCATE `parcel`;";
                mysqli_query($conn, $sq);
                $sql2="UPDATE `tabletot` SET `gndtot`='$grandtotal',`nettot`='$grandtotal' WHERE `slno`='$billno';";
                if (!mysqli_query($conn, $sql2)) {
                    echo 'Error: ' . mysqli_error($conn );
                }
            }
        }
    }
}

if(isset($_POST['cancel']))
{
    $query="SELECT * FROM `parcel`;";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $sql="TRUNCATE `parcel`;";
        if (!mysqli_query($conn, $sql)) {
            echo 'Error: ' . mysqli_error($conn );
        }
    }
}

if(isset($_POST['delete'],$_POST['billno']))
{
    $billno = $_POST['billno'];
    $query="SELECT * FROM `tabledata` WHERE `billno`='$billno';";
    $c=mysqli_query($conn, $query);
    if(mysqli_num_rows($c)!=0)
    {
        $query1="DELETE FROM `tabledata` WHERE `billno`='$billno';";
        mysqli_query($conn, $query1);
        $query1="DELETE FROM `tabletot` WHERE `slno`='$billno';";
        $c=mysqli_query($conn, $query1);
        $sql="TRUNCATE `parcel`;";
        if (!mysqli_query($conn, $sql)) {
            echo 'Error: ' . mysqli_error($conn );
        }
    }
}
?>