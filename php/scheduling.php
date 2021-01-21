<!-----------------------------------------DANGER ZONE ( dont ever fk arround here unless time schedule broke || unless an expert in handling db and time related errors !! ) ------------------------------------------------------- -->
<!-- http://localhost/salon/php/scheduling.php?styleid=11&barber=17&ser_id=1&day=Thursday -->
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
    $day=$_GET['day'];
                            // $GLOBALS $able_hr;
                            // $GLOBALS $able_min;


                            $taken_hr=array(); // array of all database hr, min, and average time taken for tat particular
                            $taken_min=array();
                            $taken_avg_time=array();
    
                            $able_hr=array(); // array of hr, min without checking schedules. to compaire with database time. at last this will get updated accordingly.
                            $able_min=array();
                            $able_count=count($able_hr);

                            
                            $querythree="SELECT * FROM tbl_booking where booking_day='$day'";
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
                            $taken_count=count($taken_hr);
                            
                            $avg_time=$result_barber_info['avg_time'];
                            $i=9;$j=0;

                            while($i<20){
                                array_push($able_hr,$i); //pushing able time to able array
                                array_push($able_min,$j);

                                // echo '<button onclick="tim(this.value)" value='.$i.':'.$j.'>'.$time.'</button>';

                                if( $j + $avg_time < 60) $j+=$avg_time;
                                else{
                                    $i+=1;
                                    $temp=60-$j; $j=0;
                                    $j+=$avg_time-$temp;
                                }
                            }
                            $able_count=count($able_hr);

                            function tim($time_hr,$time_min,$addtime)
                            {
                                $i=$time_hr;
                                $j=$time_min;
                                if($j+$addtime < 60) $j+=$addtime;
                                else
                                {
                                    $i+=1;
                                    $tempone=60-$j;
                                    $j=0;
                                    $j+=$addtime-$tempone;
                                }
                                $ret=array($i,$j);
                                return $ret;
                            }


                            function equal($avg,$j,$i){

                                global $able_hr;
                                global $able_min;
                                global $able_count;
                                global $avg_time;
                                global $taken_hr;
                                global $taken_min;

                                $tup=tim($taken_hr[$i],$taken_min[$i],$avg);
                                $able_hr[$j]=$tup[0];
                                $able_min[$j]=$tup[1];
                                if($j+1 < $able_count)
                                {
                                    for( $h=$j+1; $h < $able_count ; $h++)
                                    {
                                        $tupp=tim($able_hr[$h-1],$able_min[$h-1],$avg_time);
                                        $able_hr[$h]=$tupp[0];
                                        $able_min[$h]=$tupp[1];
                                    }
                                }
                            }
                            
                            // sorting taken time because if not in order the schedule time will vary and be take the last one even if its not the greatest
                            for( $x=0 ; $x < $taken_count ; $x++)
                            {
                                for ( $y=$x ; $y < $taken_count ; $y++){
                                    if($taken_hr[$x] > $taken_hr[$y])
                                    {
                                        $temp_hr=$taken_hr[$x];
                                        $temp_min=$taken_min[$x];
                                        $temp_avg=$taken_avg_time[$x];

                                        $taken_hr[$x]=$taken_hr[$y];
                                        $taken_min[$x]=$taken_min[$y];
                                        $taken_avg_time[$x]=$taken_avg_time[$y];

                                        $taken_hr[$y]=$temp_hr;
                                        $taken_min[$y]=$temp_min;
                                        $taken_avg_time[$y]=$temp_avg;
                                    }
                                    elseif($taken_hr[$x]==$taken_hr[$y] && $taken_min[$x] > $taken_min[$y])
                                    {
                                        $temp_min=$taken_min[$x];
                                        $temp_avg=$taken_avg_time[$x];
                                        $taken_min[$x]=$taken_min[$y];
                                        $taken_avg_time[$x]=$taken_avg_time[$y];
                                        $taken_min[$y]=$temp_min;
                                        $taken_avg_time[$y]=$temp_avg;
                                    }
                                }
                                
                            }



                            for( $a=0 ; $a < $taken_count ; $a++ )
                            {
                                for( $b=0 ; $b < $able_count ; $b++ )
                                {
                                    if ($taken_hr[$a] == $able_hr[$b] && $taken_min[$a] == $able_min[$b]) {
                                        // echo $taken_hr[$a].":".$taken_min[$a]."<br>";
                                        equal($taken_avg_time[$a],$b,$a) ;
                                        
                                    }
                                    
                                    else if($taken_hr[$a] == $able_hr[$b] && $able_min[$b]+$avg_time > $taken_min[$a])
                                    {
                                        // echo $taken_hr[$a].":".$taken_min[$a]."<br>";
                                        equal($taken_avg_time[$a],$b,$a) ;

                                    }
                                }
                            }

                            for( $t=0 ; $t < $able_count ; $t++ )
                            {
                                $i=(int)$able_hr[$t];
                                $j=(int)$able_min[$t];
                                // echo $i.",";
                                if($i / 10 < 1 && $j / 10 < 1 ) $time="0$i:0$j";
                                elseif($i / 10 < 1 && $j / 10 > 0 ) $time="0$i:$j";
                                elseif($j / 10 < 1 ) $time="$i:0$j" ;
                                else $time="$i:$j";
                                echo '<button onclick="tim(this.value)" value='.$i.':'.$j.'>'.$time.'</button>';

                            }

                            // var_dump($able_hr);
                            // var_dump($able_min);

                            // array_splice($taken_hr,0,1);
                            // echo $taken_hr[2];
                            // var_dump($able_hr);
                            // echo "<br>";
                            // var_dump($able_min);
}





?>
<!-- -------------------------------------------------------------------------------------------------------------------- -->