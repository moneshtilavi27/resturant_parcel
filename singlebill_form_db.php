
<?php
include("dbcon.php");



$billno = "";
if(isset($_GET['billno'])){ $billno = $_GET['billno']; }
if(isset($_POST['billno'])){ $billno = $_POST['billno']; }
// $tabno = "";
// $tabsec = "";
// $capnam = "";

$sql="SELECT * FROM `tabledata` WHERE `billno`= '$billno'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $tabno = $row['tabno'];      
        $tabsec = $row['tabsec'];
    }
}

$sql1="SELECT * FROM `tabletot` WHERE `slno`= '$billno'";
$result1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($result1) > 0) {
    // output data of each row
    while($row1 = mysqli_fetch_assoc($result1)) {
        $capnam = $row1['capnam'];
    }
}

echo '<script>location="singlebill.php?tabno='.$tabno.'&tabsec='.$tabsec.'&billno='.$billno.'&capnam='.$capnam.'";</script>';

?>