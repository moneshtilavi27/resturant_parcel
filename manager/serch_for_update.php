<?php


require_once('dbcon.php');
if(isset($_POST['item_id']))
{
	$item_id=$_POST['item_id'];
	//$itmsec=$_POST['wingsec'];
	$a = array();
	$sql = "SELECT * FROM `parcel` WHERE `slno`='$item_id';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$billno=$row['billno'];
				array_push($a,$row['slno'],$row['itmno'],$row['itmnam'],$row['qty'],$row['prc'],$row['tabno'],$row['billno'],$row['date']);
			}
		}
	echo json_encode($a);
}


?>