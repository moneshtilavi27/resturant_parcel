<?php
include("dbcon.php");


// DELETE
if(isset($_GET['del'])){
    $id = $_GET['del'];
    $sql1 = "DELETE FROM empreg WHERE empid='$id'";

    if (!mysqli_query($conn, $sql1)) {
        die('Error: ' . mysqli_error($conn ));
    }
    echo '<script>alert("Record Deleted");</script>';
    echo '<script>location="empreg.php";</script>';
}
// End Delete



$a0=$_POST['empid'];
$a=$_POST['empname'];
$b=$_POST['address'];
$r=$_POST['mobile'];
$uname=$_POST['uname'];
$password=$_POST['password'];
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


$sql="UPDATE empreg SET empname='$a', address='$b', mobile='$r', path1='$path1',salary='$f' ,uname='$uname' ,pass='$password' WHERE empid='$a0' ";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn ));
}
echo '<script>alert("Record Updated");</script>';
echo '<script>location="empreg.php";</script>';

?>