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
    <!-- <div class="side_nav">
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
    </div> -->
    <div class="nav_buttons">
    <a href="admin.php" class="nav_btn">Add admin</a>
        <a href="addservice.php" class="nav_btn_active">Add Service</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
    </div>
    <div class="body">
    <div class="add"> <p onclick="display()"> Add Service</p></div>
    <div class="service-box">
            <?php
                $query="SELECT * FROM tbl_service";
                $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($result))
                { ?>
                    
                        <div class="single-service">
                        <a href="addservicestyle.php?id=<?php echo $row['ser_id']?>" >
                            <img src="images/<?php echo $row['ser_img']?>">
                            <div class="overlay"></div>
                            <div class="service-desc">
                                <h3><?php echo $row['ser_name']?></h3>
                                <hr>
                                <p><?php echo $row['ser_desc']?></p>
                            </div>
                            </a>
                        </div>
        <?php  } ?>  
    </div>

    </div>
        <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cls()">&times;</span>
            <center><p>Add Service</p>
            <form action="php/addservice.php" method='POST' enctype="multipart/form-data">
                <input type="text" name="ser_name" id="" placeholder="Service name">
                <input type="text" name="ser_desc" id="" placeholder="Service discription">
                <input type="FILE" name=1>
                <!-- <button onclick="val('phppage')">Add</button> -->
                <input type="submit" value="Submit">
            </form>
            </center>
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