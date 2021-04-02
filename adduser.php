<?php
require("dbcon.php");
if(isset($_POST['user']))
{
    $user = $_POST['user'];
    $query="INSERT INTO `userlist`(`id`, `user`) VALUES ('','$user');";
    if(mysqli_query($conn, $query))
    {
       echo "success";
    }
}
?>
