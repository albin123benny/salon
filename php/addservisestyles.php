<?php
session_start();
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$name=$_POST["style_name"];
$time=$_POST["time"];
$price=$_POST["price"];

$ser_id=$_GET['id'];
$login_id=$_SESSION["id"];

$image0=$_FILES['1']["name"];
$file_path0='../images/'.$image0;
move_uploaded_file($_FILES["1"]["tmp_name"],$file_path0);

$query="insert into tbl_service_styles(ser_id,style_name) values($ser_id,'$name')";
mysqli_query($con,$query);
$style_id=mysqli_insert_id($con);
$query="insert into tbl_barber_info(login_id,style_id,price,avg_time,images) values($login_id,$style_id,$price,$time,'$image0')";
if(mysqli_query($con,$query)){
    header("Location:../barber_service_style.php?id=$ser_id");
}
else{
    echo "Bad Request something went bad";
}
?>