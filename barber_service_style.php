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
    <script>
        function display(elm) {
            document.getElementById(elm).style.display = "block";
        }
        function cls(elm) {
            document.getElementById(elm).style.display = "none";
        }
        window.onclick = function(event) {
        if (event.target == modal) {
            document.getElementById("myModal").style.display = "none";
            }
        }
    </script>
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
    </div>
    <div class="body-user">

        <div class="add"> 
            <p onclick="display('del')"> Delete Style</p>
            <p onclick="display('inpu')" style="background-color:#f6ae2d;"> Add Style</p>
        </div>

        <?php
        $flag=true;
        $query="SELECT * FROM tbl_barber_info where login_id = $id ";
        $res=mysqli_query($con,$query);
        while($barber_info=mysqli_fetch_array($res)){
            $style_id=$barber_info['style_id'];
            $qone="select * from tbl_service_styles where style_id=$style_id and ser_id = $ser_id";
            $resone=mysqli_query($con,$qone);
            while($service_styles=mysqli_fetch_array($resone)){
                    // echo $service_styles["style_name"];
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
                         <button> <?php echo $reg_table['name'] ?> &nbsp; &nbsp; ₹ <?php echo $barber_info['price'] ?></button>
                     </div>
                <?php 
            }
        }
        if($flag){
            $flag=false;
            echo "<div class='nocontent'><p>Sorry no styles found! Please add styles by clicking 'Add style' button above 👆 </p></div>" ;
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
    <div id="inpu" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cls('inpu')">&times;</span>
            <center>
            <?php 
                $query="SELECT * FROM tbl_service where ser_id=$ser_id";
                $sty=mysqli_fetch_array(mysqli_query($con,$query));
                echo "<p> Add ".$sty['ser_name']." style</p>";
            ?>
            <form id="phppage" action="php/addservisestyles.php?id=<?php echo $ser_id;?>" method='POST' enctype="multipart/form-data">
                <input Required type="text" name="style_name" id="fullname" placeholder="Style Name" >
                <input Required type="text" name="time" id="email" placeholder="Time required (25 min)" >
                <input Required type="text" name="price" id="email" placeholder="Price" >
                <input type="FILE" name=1>
                <input type="submit" value="Add Style">
            </form>
            </center>
        </div>
    </div>

    <div id="del" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cls('del')">&times;</span>
            <center><p>Delete Admin</p>
            <p> By deleting this account, you will get revoked by all your admin privillages ! <br> Do you really wish to 
            delete this account ? 
            <a href=""><button>Delete this accout ! </button></a>
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