<?php
session_start();
$id=$_SESSION["id"];
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$query="INSERT INTO tbl_booking (login_id,booking_day,booking_time) VALUES ($id,'Tuesday','12:30')";

if(mysqli_query($con,$query)){
    echo "done";
}
else{
    echo 'query error';
}

?>