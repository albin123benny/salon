<?php
session_start();
if(isset($_SESSION["id"])){
    $id=$_SESSION["id"];
    $con=mysqli_connect("localhost","root","","salon")or die("couldn't connect");
    $query="SELECT * FROM tbl_login WHERE loginid=$id";
    $result=mysqli_query($con,$query);
    $login = mysqli_fetch_array($result);

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
        <a href="index.php" style="margin-right:50px">Home</a>
        <?php
            $query="SELECT * FROM tbl_service";
            $resultt=mysqli_query($con,$query);
            while($ro=mysqli_fetch_array($resultt)){ ?>
                <a href="user_service_style.php?id=<?php echo $ro['ser_id'];?>" <?php if($_GET['id']==$ro['ser_id'])echo 'class=active' ?>  ><?php echo $ro['ser_name']?></a>
            <?php }
        ?>
        <a href="" style="margin-left:50px">Favorates</a>
        <a href="">Orders</a>
    </div>
    <div class="side_nav">
        <a href="#">About</a><br>
        <a href="#">Services</a><br>
        <a href="#">Clients</a><br>
        <a href="#">Contact</a><br>
    </div>
    <div class="body-user">
    
    <?php
        $flag=true;  //  to know wether any styles available
        $query="SELECT * FROM tbl_barber_info where status=1";
        $res=mysqli_query($con,$query);
        while($barber_info=mysqli_fetch_array($res)){
            $style_id=$barber_info['style_id'];
            $lid=$barber_info['login_id'];
            $qtwo="select * from reg where loginid=$lid";
            $barname=mysqli_fetch_array(mysqli_query($con,$qtwo));
            $qone="select * from tbl_service_styles where style_id=$style_id and ser_id = $ser_id";
            $resone=mysqli_query($con,$qone);
            while($service_styles=mysqli_fetch_array($resone)){
                $flag=false;
                 ?>
                     <div class="content_box">
                         <center><img src="images/<?php echo $barber_info["images"] ?>" alt=""></center>
                         <div class="NM">
                             <?php echo $service_styles["style_name"] ?><br> <p><?php echo $barber_info['avg_time'] ?> &nbsp; min</p> 
                         </div>
                         <div class="ratings"> 
                             <img src="images/ratings-yellow.png" alt="">
                             <img src="images/ratings-yellow.png" alt="">
                             <img src="images/ratings-yellow.png" alt="">
                             <img src="images/ratings-yellow.png" alt="">
                             <img src="images/ratings.png" alt="">
                         </div>
                         <button> <?php echo $barname['name'] ?> &nbsp; &nbsp; ₹ <?php echo $barber_info['price'] ?></button>
                     </div>
                <?php 
            }
        }
        if($flag){
            $flag=false;
            echo "<div class='nocontent'><p>Sorry no styles found! Please try again later </p></div>" ;
        }
        ?>

        <!-- <div class="content_box">
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
        </div> -->
    </div>
</body>
</html>
<?php
}
else{
    ?>
    <center><h1>Something went wrong </h1>  
    <h2>click <a href="signin.php">here</a> to login</h2></center>
    <?php
}
?>  