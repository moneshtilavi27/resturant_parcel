<?php
$a0=$_POST['empid'];
$a=$_POST['empname'];
$b=$_POST['address'];
$r=$_POST['mobile'];
$type=$_POST['type'];


if(isset($_POST['uname']))
	$uname=$_POST['uname'];
else
	$uname="";

if(isset($_POST['password']))
	$password=$_POST['password'];
else
	$password="";



//$c=$_POST['idproof'];
// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

//$todir = 'uploads/';
//echo $path=$todir . basename($_FILES['upl']['upl'] );



if(isset($_FILES['upl1']) && $_FILES['upl1']['error'] == 0){

  $extension = pathinfo($_FILES['upl1']['name'], PATHINFO_EXTENSION);

  if(!in_array(strtolower($extension), $allowed)){
   // echo '{"status":"error"}';
   // exit;
  }

  if(move_uploaded_file($_FILES['upl1']['tmp_name'], 'uploads/'.$_FILES['upl1']['name'])){
    //echo '{"status":"success"}';
    $todir = 'uploads/';
     $path1=$todir . basename($_FILES['upl1']['name'] );

    //exit;
    //$sql="insert into properties(photopath)values('$path')";
   // mysqli_query($connection,$sql);
  }
}
$f=$_POST['salary'];


include("dbcon.php");

$sql="INSERT into empreg VALUES('$a0','$a','$b','$r','$path1','$f','$type','$uname','$password')";
//echo $sql;
if (!mysqli_query($conn,$sql))
  {
  die('Error: ' . mysqli_error($conn));
  }
 //mysqli_query($conn,$sql);
//echo"User Record Added";

echo '<script>alert("User Record Added");</script>';
echo '<script>location="empreg.php";</script>';

?>