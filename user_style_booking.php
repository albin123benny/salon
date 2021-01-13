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
    $ser_id=$_GET['ser_id'];
    $barber=$_GET['barber'];
    $style_id=$_GET['styleid'];

    $querytwo="select * from tbl_barber_info where login_id=$barber and style_id=$style_id and status=1";
    $result_barber_info=mysqli_fetch_array(mysqli_query($con,$querytwo));
    $info_id=$result_barber_info['info_id'];
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
            background-color:white;
        }
    </style>
    <script src="js/animation.js"></script>
</head>
<body>
    <div class="navigation_top_user">
        <a href="index.php" style="margin-right:50px">Home</a>
        <?php
            $query="SELECT * FROM tbl_service";
            $resultt=mysqli_query($con,$query);
            while($ro=mysqli_fetch_array($resultt)){ ?>
                <a href="user_service_style.php?id=<?php echo $ro['ser_id'];?>" <?php if($_GET['ser_id']==$ro['ser_id'])echo 'class=active' ?>  ><?php echo $ro['ser_name']?></a>
            <?php }
        ?>
        <a href="" style="margin-left:50px">Favorates</a>
        <a href="">Orders</a>
    </div>

    <?php 
        $query="select * from tbl_barber_info where login_id=$barber and style_id=$style_id";
        $res=mysqli_fetch_array(mysqli_query($con,$query));

        $query="select * from tbl_service_styles where style_id=$style_id";
        $res_style=mysqli_fetch_array(mysqli_query($con,$query));

        $day=date("l");
        $weekdays=[
            'Sunday' => 'Sun',
            'Monday' => 'M',
            'Tuesday' => 'Tue',
            'Wednesday' => 'W',
            'Thursday' => 'Thu',
            'Friday' => 'F',
            'Saturday' => 'Sat',
            'Sun'=>'Sunday',
            'M'=>'Monday',
            'Tue'=>'Tuesday',
            'W'=>'Wednesday',
            'Thu'=>'Thursday',
            'F'=>'Friday',
            'Sat'=>'Saturday',
        ];
        $dis_day=array('Sun','M','Tue','W','Thu','F','Sat');
        $day_short=['Sun'=>'S','M'=>'M','Tue'=>'T','W'=>'W','Thu'=>'T','F'=>'F','Sat'=>'S'];
        $key = array_search($weekdays[$day], $dis_day);

        $queryone="SELECT * FROM tbl_barber_info where login_id=$barber and style_id=$style_id and status=1";
        $barber_info=mysqli_fetch_array(mysqli_query($con,$queryone));

        $qtwo="select * from reg where loginid=$barber";
        $barname=mysqli_fetch_array(mysqli_query($con,$qtwo));
    ?>

    <div class="booking_info">
    
        <div class="rightbox"><br>
            <center><p>Current Schedules</p>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <div class="rightbox_cont" onclick="change()"></div>
            <!-- <div class='nocontent'><p>No schedules...</p></div> -->
            </center>

        </div>
        <div class="book_box">
            <button class="book_btn" onclick="sub()">
                Book for &nbsp; ₹ 
                <?php echo $barber_info['price'] ?>
            </button>

            <div class="book_head">
                <h1><?php echo $res_style['style_name'] ?></h1>
                <h2>by <?php echo $barname['name'] ?> &nbsp; Average time <?php echo $result_barber_info['avg_time'] ?>&nbsp;min </h2>
            </div>
            <div class="bookdays">
                <br>
                <center><p>Set your time and day :</p></center>
                <br>
                <div class="book_content">
                    <div class="weekdays">
                        <center>
                            <?php
                                for($i = $key; $i < 7; $i ++ ){
                                    echo '<button value="'.$weekdays[$dis_day[$i]].'" onclick="anim(this.value)">'.$day_short[$dis_day[$i]].'</button>';
                                }
                                if($key>0){
                                    for($j = 0; $j < $key ; $j ++ ){
                                        echo '<button value="'.$weekdays[$dis_day[$j]].'" onclick="anim(this.value)">'.$day_short[$dis_day[$j]].'</button>';
                                    }
                                }
                            ?>
                        </center>
                    </div>
                    <div class="bookdays_time" style="display:none">
                        <center>
<!-- -------------------------------------------------------------DANGER ZONE ( dont ever  play here unless time schedule broke !! ) ------------------------------------------------------- -->
                        <?php

                            $taken_hr=array();
                            $taken_min=array();
                            $taken_avg_time=array();

                            $querythree="SELECT * FROM tbl_booking";
                            $resume=mysqli_query($con,$querythree);
                            while($row=mysqli_fetch_array($resume))
                            {
                                $data=$row['info_id'];
                                $queryfour="SELECT * FROM tbl_barber_info where login_id=$barber and info_id=$data";
                                $resthree=mysqli_query($con,$queryfour);
                                while($result_no_one=mysqli_fetch_array($resthree)){
                                    $database_time=$row['booking_time'];
                                    $hr=mb_substr($database_time,0,2);
                                    $min=mb_substr($database_time,3,2);
                                    array_push($taken_hr,$hr);
                                    array_push($taken_min,$min);
                                    array_push($taken_avg_time,$result_no_one['avg_time']);
                                }
                            }

                            $avg_time=$result_barber_info['avg_time'];
                            $temp_avg_time=$avg_time;
                            $flag=FALSE;//true means array have the hr already booked !! ;
                            $mach_hr=0;
                            $mach_min=0;
                            $match_avg_time=0;
                            $i=9;$j=0;
                            // echo count($taken_hr);
                            while($i<20){
                                $count=count($taken_hr);
                                for( $t = 0 ; $t < $count ; $t+=1 ){
                                    if(!isset($taken_hr[$t])){
                                        if($taken_hr[$t] == $i) {
                                            $mach_hr=$taken_hr[$t];$mach_min=$taken_min[$t];$match_avg_time=$taken_avg_time[$t];
                                            unset($taken_hr[$t]);
                                            unset($taken_min[$t]);
                                            unset($taken_avg_time[$t]);
                                            $flag=TRUE;
                                            break;
                                        }
                                    }
                                }

                                if($flag==TRUE &&  $j+$avg_time > $mach_min ){
                                    // echo "yes";
                                    $j=$mach_min;
                                    $avg_time=$match_avg_time;
                                    $flag=FALSE;
                                }else{
                                    if($i / 10 < 1 && $j / 10 < 1 ) $time="0$i:0$j";
                                    elseif($i / 10 < 1 && $j / 10 > 0 ) $time="0$i:$j";
                                    elseif($j / 10 < 1 ) $time="$i:0$j" ;
                                    else $time="$i:$j";

                                    echo '<button onclick="tim(this.value)" value='.$i.':'.$j.'>'.$time.'</button>';
                                }
                                if( $j + $avg_time < 60){ $j+=$avg_time; $avg_time=$temp_avg_time;}
                                else{
                                    $i+=1;
                                    $flag=FALSE;
                                    $temp=60-$j; $j=0;
                                    $j+=$avg_time-$temp;
                                    $avg_time=$temp_avg_time;
                                }
                            }
                        ?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="img_bdy"><img src="images/<?php echo $res['images']?>" alt="image canot load"></div>
    </div>
    <form action="php/booking.php?info_id=<?php echo $info_id ?>" method="POST" style="display:none" id="sub_values">
    <input id="dayy" name="day" type="text">
    <input id="tim" name="time" type="text">
    </form>
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