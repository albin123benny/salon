<?php
if (isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST["email"];
    $pass=$_POST['password'];

    $con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
    $query="select * from tbl_login where email='$email'";
    $result=mysqli_query($con,$query);

    if(mysqli_num_rows($result)==1)
    {
        $row = mysqli_fetch_array($result);
            
        if(password_verify($pass,$row['password']))
        {
                session_start();
                $_SESSION["id"]=$row["loginid"];
                header("Location:index.php");
        } 
        else{
            header("Location:signin.php?errormessage=WRONGPASSWORD");
        } 
    }
    else
    {
        header("Location:signin.php?errormessage=WRONGPASSWORD");
    }
}
else
{
    die( "something went wrong");
}

    // echo $uname,$pass;
 
    
// } else {
//     die("Ayyo post value mosham aaaanallo");
// }
?>