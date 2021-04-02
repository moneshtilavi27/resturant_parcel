<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

echo $na1=$_POST['t1'];
// $na2=$_POST['t2'];
// $na3=$_POST['t3'];
     
            
  include("dbcon.php");
				
$sql="INSERT into products VALUES('','$na1')";
           // $result=mysqli_query($con,$sql);
             
if (!mysqli_query($conn,$sql))
 {
  die('Error: ' . mysql_error($conn));
  }

// mail( "jyotikantpatil@gmail.com", "Reservation Form Results",$na1, "From: $na2" );
echo '<script>alert("Record Added Successfully");</script>';
echo '<script>location="add_prodct1.php";</script>'; 
					
    
    
?>


</body>
</html>
