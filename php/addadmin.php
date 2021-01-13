<?php
$con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
$uname=$_POST["uname"];
$email=$_POST["email1"];

$p=$_POST["password1"] ;
$pass=password_hash("$p",PASSWORD_DEFAULT);

$reptpass=$_POST["rept-password"];
$mobile=$_POST["mobno"];

// echo $uname,$email,$pass,$reptpass,$mobile
$query="insert into tbl_login(email,password,type,status) values('$email','$pass','admin',1)";
mysqli_query($con,$query);
$loginid=mysqli_insert_id($con);
$query="insert into reg (loginid,name,mobile) values($loginid,'$uname','$mobile')";
if(mysqli_query($con,$query))
{
    header("Location:../admin.php");
}
else{
    echo "Something went wrong !!";
}
?>
