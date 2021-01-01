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
    <title>admin</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            background-color: #ecedf1; 
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
        <a href="admin.php" class="nav_btn_active">Add admin</a>
        <a href="addservice.php" class="nav_btn">Add Service</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
        <a class="nav_btn">Add admin</a>
    </div>
    <div class="body">
    <div class="add"> 
        <p onclick="display('del')"> Delete Account</p>
        <p onclick="display('inpu')" style="background-color: rgb(211, 126, 15);"> Add Admin</p>
    </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>
        
            <?php
                $query="SELECT * FROM tbl_login WHERE type='admin'";
                $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_array($result))
                {  $tempid=$row['loginid'];
                    $query="SELECT * FROM reg WHERE loginid=$tempid";
                    $result1=mysqli_query($con,$query);
                    $reg_table = mysqli_fetch_array($result1);
                    ?>
                    <tr>
                        <td><?php echo $row['loginid']?></td>
                        <td><?php echo $reg_table['name']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $reg_table['mobile']?></td>
                        <td style="<?php if($row['status']==1)echo'background-color:rgba(42, 173, 64, 0.918);'; else echo'background-color:red;'?>; border-radius:13px;"><?php if($row['status']==1)echo 'Active'; else echo 'In-Active'?></td>
                    </tr>
            <?php  } ?>  
        </table>

    </div>
    <div id="inpu" class="modal">
        <div class="modal-content">
            <span class="close" onclick="cls('inpu')">&times;</span>
            <center><p>Add Admin</p>
            <form id="phppage" action="php/addadmin.php" method='POST'>
                <input Required type="text" name="uname" id="fullname" placeholder="Fullname" onblur="full_name(this.id)">
                <input Required type="email" name="email1" id="email" placeholder="Email" onblur="email_id(this.id)">
                <input type="text" name="mobno" id="phone" placeholder="Phone number" onblur="phone_no(this.id)">
                <input Required type="password" name="password1" id="password" placeholder="Password" onblur="pass(this.id)">
                <input Required type="password" name="rept-password" id="con_password" placeholder="Confirm Password" onblur="con_pass(this.id)">
                <button onclick="val('phppage')">Add</button>
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
            <a href="php/del_admin.php"><button>Delete this accout ! </button></a>
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