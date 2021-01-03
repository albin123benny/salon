<?php
session_start();
if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
    $con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
    $query="SELECT * FROM tbl_login WHERE loginid=$id";
    $result=mysqli_query($con,$query);
    $login = mysqli_fetch_array($result);
    if($login['type']=="barber")
    {
        $query="SELECT * FROM reg WHERE loginid=$id";
        $result=mysqli_query($con,$query);
        $reg_table = mysqli_fetch_array($result);
        $ser_id=$_GET['id'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: white; 
        }
    </style>
</head>
<body>
<div class="navigation_top_user">
        <a href="barber.php">Dashboard</a>
        <a href="#">Bookings</a>
        <a href="#">Transactions</a>
        <a href="#">Feedbacks</a>
        <a href="#">Contact Admin</a>
        <a href="">Profile</a>
    </div>
    <div class="side_nav">
        <?php
            $query="SELECT * FROM tbl_service";
            $resultt=mysqli_query($con,$query);
            while($ro=mysqli_fetch_array($resultt)){ ?>
                <a href="barber_service_style.php?id=<?php echo $ro['ser_id'];?>" <?php if($_GET['id']==$ro['ser_id'])echo'class=outline'?> ><?php echo $ro['ser_name']?></a><br>
            <?php }
        ?>
        <!-- <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a> -->
    </div>
    <div class="body-user">
        <div class="content_box">
            <img src="one.png" alt="">
            <div class="NM">
                Navy<br> <p>25 min</p> 
            </div>
            <div class="ratings"> 
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings.png" alt="">
            </div>
            <button> Kings &nbsp; &nbsp; $50</button>
        </div>
        <div class="content_box">
            <img src="one.png" alt="">
            <div class="NM">
                Navy<br> <p>25 min</p> 
            </div>
            <div class="ratings"> 
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings.png" alt="">
            </div>
            <button> Kings &nbsp; &nbsp; $50</button>
        </div>
        <div class="content_box">
            <img src="one.png" alt="">
            <div class="NM">
                Navy<br> <p>25 min</p> 
            </div>
            <div class="ratings"> 
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings-yellow.png" alt="">
                <img src="images/ratings.png" alt="">
            </div>
            <button> Kings &nbsp; &nbsp; $50</button>
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