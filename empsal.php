<?php

   
    
    
if(isset($_POST) && !empty($_POST))
{
   
    
    
    
$empid=$_POST['empid'];
$empname=$_POST['empname'];
$address=$_POST['address'];
$salary=$_POST['salary'];
$mobile=$_POST['mobile'];
$advances=$_POST['advance'];
$overtime=$_POST['overtime'];
$deduction=$_POST['deduction'];
$totalsal=$_POST['totalsal'];
$takesal=$_POST['takesal'];
$balance=$_POST['balance'];
$date=$_POST['date'];
//$c=$_POST['idproof'];


include("dbcon.php");
    
     $sql="update advancesal set flag='1' where empno='$empid'";
//echo $sql;
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
    
    
    $sql="update paysal set flag='1' where empno='$empid'";
//echo $sql;
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
    
    

     $sql="INSERT into paysal VALUES('','$empid','$empname','$address','$mobile','$salary','$advances','$overtime','$deduction','$totalsal','$takesal','$balance','$date','0')";
//echo $sql;
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
    
    
    
   
    
    
 //mysqli_query($conn,$sql);
//echo"User Record Added";
//exit;
echo '<script>alert("The Salary was paid Successfully");</script>';
echo '<script>location="empreg.php";</script>';
}else{ 
  echo '<script>alert("Salary Addition Failed");</script>';
echo '<script>location="empreg.php";</script>'; 
}

?>