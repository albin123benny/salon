<?php
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
session_start();

$login_id=$_SESSION["id"];
$ser_id=$_GET['id'];

if(!empty($_POST['del'])) {
    foreach($_POST['del'] as $value){
        $query="UPDATE tbl_barber_info SET status= 0 where style_id=$value and login_id=$login_id";
        mysqli_query($con,$query);
    }
}
header("Location:../barber_service_style.php?id=$ser_id");
?>