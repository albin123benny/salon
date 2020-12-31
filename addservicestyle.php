<?php
session_start();
if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
    $con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
    $query="SELECT * FROM tbl_login WHERE loginid=$id";
    $result=mysqli_query($con,$query);
    $login = mysqli_fetch_array($result);
    if($login['type']=="admin")
    {
        $query="SELECT * FROM reg WHERE loginid=$id";
        $result=mysqli_query($con,$query);
        $reg_table = mysqli_fetch_array($result);
    
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: #ecedf1; 
        }
    </style>
    <script>
        function display() {
            document.getElementById("myModal").style.display = "block";
        }
        function cls() {
            document.getElementById("myModal").style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == modal) {
            document.getElementById("myModal").style.display = "none";
            }
        }
    </script>
    <script src="js/validation.js"></script>
</head>
<body>
    <div class="navigation_top">
        <a href="">Dashboard</a>
        <a class="rgt" style="float:right" href="logout.php">Logout</a>
        <a class="rgt" style="float:right" href="profile.php"><?php echo $reg_table['name'] ?></a>
    </div>
    <div class="nav_buttons">
    <a href="admin.php" class="nav_btn">Add admin</a>
        <a href="addservice.php" class="nav_btn_active">Add Service</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
    </div>
    <div class="body">
        <div class="add"> <a href="addservice.php"><p> Go Back</p></a></div>
        <div class="service-box">

        </div>
    </div>
</body>
</html>
<?php
    }
}
else{
    ?>
    <center><h1>Something went wrong </h1>  
    <h2>click <a href="signin.php">here</a> to login</h2></center>
    <?php
}
?>  