<?php
session_start();
$id=$_SESSION["id"];
$info_id=$_GET['info_id'];
$time=$_POST["time"];
$day=$_POST['day'];

$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");


$query="INSERT INTO tbl_booking (login_id,info_id,booking_day,booking_time) VALUES ($id,$info_id,'$day','$time')";

if(mysqli_query($con,$query)){
    echo "done";
}
else{
    echo 'query error';
}

?>