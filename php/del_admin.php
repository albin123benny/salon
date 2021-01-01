<?php
session_start();
$id=$_SESSION["id"];
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$query="update tbl_login set status=0 where loginid=$id";
if(mysqli_query($con,$query))
{
    header("Location:../logout.php");
}
else{
    echo "Something went wrong !!";
}
?>
