<?php 
require_once("dbcon.php");
$action=$_POST['action'];

// insert items in database

if($action=="add_category")
{
	$cat_name=$_POST['cat_name'];

	if($cat_name<>" ")
	{
		$q="SELECT * FROM `item-categories` WHERE `category`='$cat_name';";
		$conf=mysqli_query($conn,$q)or die(mysqli_error());
		if(mysqli_num_rows($conf)>0)
		{
				echo "Item Already exist";
		}
		else
		{
				$qry="INSERT INTO `item-categories`(`category`) VALUES ('$cat_name');";
				$confirm=mysqli_query($conn, $qry)or die(mysqli_error());
				if($confirm)
				{
						echo "success";
				}
		}
	}
	else{
		echo "please fill all the Fields";
	}
}

// Delete categories
if($action=="cat_delete")
{
		$cat_name=$_POST['cat_name'];
		$q="DELETE FROM `item-categories` WHERE `category`='$cat_name';";
		$conf=mysqli_query($conn,$q)or die(mysqli_error());
		if($conf)
		{
			$q="DELETE FROM `item` WHERE `item_cat`='$cat_name';";
			$conf=mysqli_query($conn,$q)or die(mysqli_error());	
				echo "Item Deleted successfully";
		}
	
}
