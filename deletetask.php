<?php 
include 'partials/_dbconnect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if(isset($_POST['deletetask'])){

        $task_details=$_POST['deletetask'];
        echo $task_details;
        $task_details= explode('/',$task_details);
        list($task, $planner)=$task_details;
        $taskID=$task;
        $planner_id= $planner;
        $sql1="SELECT * from `planit`.`task` where email_id = 'ayeshaaamir2001@gmail.com' and planner_id='$planner_id';";
        $result=mysqli_query($conn,$sql1);
        echo mysqli_error($conn);
        
        $task_count = mysqli_num_rows($result);
        $sqldel="DELETE FROM task where taskID='$taskID' AND planner_id='$planner_id' AND email_id='ayeshaaamir2001@gmail.com';";
        mysqli_query($conn,$sqldel);
        echo mysqli_error($conn);
        $y=$taskID+1;
        for ($y; $y<=$task_count; $y++ ){
            $taskID=$y-1;
            $sql2= "UPDATE `task` SET taskID = '$taskID' WHERE taskID = '$y' AND planner_id = '$planner_id' AND email_id = 'ayeshaaamir2001@gmail.com';";
            mysqli_query($conn,$sql2);
        }
    }
    else if(isset($_POST['donetask'])){
        $task_details=$_POST['donetask'];
        echo $task_details;
        $task_details= explode('/',$task_details);
        list($task, $planner)=$task_details;
        $taskID=$task;
        $planner_id= $planner;
        $sql1="SELECT * from `planit`.`task` where email_id = 'ayeshaaamir2001@gmail.com' and planner_id='$planner_id';";
        $result=mysqli_query($conn,$sql1);
        echo mysqli_error($conn);
        
        $task_count = mysqli_num_rows($result);
        $sqldel="DELETE FROM task where taskID='$taskID' AND planner_id='$planner_id' AND email_id='ayeshaaamir2001@gmail.com';";
        mysqli_query($conn,$sqldel);
        echo mysqli_error($conn);
        $y=$taskID+1;
        for ($y; $y<=$task_count; $y++ ){
            $taskID=$y-1;
            $sql2= "UPDATE `task` SET taskID = '$taskID' WHERE taskID = '$y' AND planner_id = '$planner_id' AND email_id = 'ayeshaaamir2001@gmail.com';";
            mysqli_query($conn,$sql2);
        }

    }
    header('Location: planner.php');}
?>