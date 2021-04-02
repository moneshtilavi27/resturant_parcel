
    <?php


include("dbcon.php");
if($id=$_GET['id']!="")
{
	$sql = "DELETE FROM products WHERE pid='$id' ";
	$retval = mysqli_query($conn,$sql);
	if(! $retval )
	{
		die('Could not get data: ');
	}

	echo '<script>alert("Product Details Deleted");</script>';
	echo '<script>location="add_prodct1.php";</script>';
}		



?>