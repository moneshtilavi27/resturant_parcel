<?php
  require_once("dbcon.php");
// delete parcel items
if(isset($_POST['parce_delete']))
{
	$sql = "TRUNCATE `parcel`;";
	$retval = mysqli_query($conn,$sql);
	if(! $retval )
	{
		die('Could not get data: ');
	}
}

?>