<?php
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$old=$_POST["old"];
$n=$_POST["new"];
$new=password_hash("$n",PASSWORD_DEFAULT);

session_start();
$id=$_SESSION["id"];


$query="SELECT * FROM tbl_login WHERE loginid=$id";
$result=mysqli_query($con,$query);
$row = mysqli_fetch_array($result);

if(!password_verify($old,$row['password'])){
    header("location:profile.php?err=wrongpass");
}
else{
    $query="UPDATE tbl_login SET password='$new' WHERE loginid=$id";
    if(mysqli_query($con,$query)){
        header("Location:logout.php");
    }
    else{
        echo "query error";
    }
}

?>