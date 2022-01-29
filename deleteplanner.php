<?php
include 'partials/_dbconnect.php';

session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $planner_id= $_POST['deleteplanner'];
    echo $planner_id;
    
    $sql2= "SELECT * from `planit`.`planner` where email_id = 'ayeshaaamir2001@gmail.com';";
    $result=mysqli_query($conn,$sql2);
    $planner_count = mysqli_num_rows($result);
    $sql1= "DELETE FROM planner WHERE planner_id= '$planner_id' and email_id='ayeshaaamir2001@gmail.com';";
    mysqli_query($conn,$sql1);
    $y=$planner_id+1;
    for ($y; $y<=$planner_count; $y++ ){
            $planner_id=$y-1;

            $sql2= "UPDATE `planner` SET planner_id = '$planner_id' WHERE planner_id = '$y' AND email_id = 'ayeshaaamir2001@gmail.com';";
            mysqli_query($conn,$sql2);
        }
    header('Location: profile.php');
}
?>