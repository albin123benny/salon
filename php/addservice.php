<?php
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$name=$_POST["ser_name"];
$desc=$_POST["ser_desc"];

$image0=$_FILES['1']["name"];
$file_path0='../images/'.$image0;
move_uploaded_file($_FILES["1"]["tmp_name"],$file_path0);
// echo $name,$desc,$image0;
$query="insert into tbl_service(ser_name,ser_desc,ser_img) values('$name','$desc','$image0')";
if(mysqli_query($con,$query))
{
    header("Location:../addservice.php");
}
else{
    echo "Something went wrong !!";
}
?>