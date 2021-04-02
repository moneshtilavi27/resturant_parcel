<?php
ini_set('display_errors', 1);

$na1=$_POST["uname"];
$na2=$_POST["pass"];
$user=$_POST["user"];

include("dbcon.php");
$sql="SELECT * FROM login WHERE uname='$na1' and pass='$na2' and `user`='$user';";
$retval=mysqli_query($conn,$sql);
if(mysqli_num_rows($retval)!=0)
{
	$row=mysqli_fetch_assoc($retval);
	session_start();
	$_SESSION['uname']=$_POST["uname"];
	$_SESSION['user_type']="";
	if($row['uname']==$na1 && $row['pass']==$na2 && $row['user']=="Admin")
	{  
        echo '<script>alert("Login sucessfull");</script>';
        echo '<script>location="home.php"</script>';
        exit;
	}
	if($row['uname']==$na1 && $row['pass']==$na2 && $row['user']=="Manager")
	{  
        echo '<script>alert("Login sucessfull");</script>';
        echo '<script>location="manager/home.php"</script>';
        exit;
	}
}
	
echo '<script>alert("Login Unsucessfull");</script>';
echo '<script>location="index.php"</script>';

?>