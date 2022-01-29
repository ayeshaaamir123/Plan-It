<?php 
include 'partials/_dbconnect.php';

session_start();

$user='ayeshaaamir2001@gmail.com';
$planner_id=$_POST['savechanges'];
echo $planner_id;
if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    $sql1="SELECT * from `planit`.`task` where email_id = 'ayeshaaamir2001@gmail.com' and planner_id='$planner_id';";
    $result=mysqli_query($conn,$sql1);
    $taskID = mysqli_num_rows($result);
    echo mysqli_error($conn);
    $taskID+=1; 
    $taskcount=sizeof($_POST['taskName']); 
    echo $taskcount;
    for ($x = 1; $x <=$taskcount; $x++) {
             
        $taskDescription= $_POST['taskDescription'][$x-1];
        //formatting dates
        $startdate=$_POST['startTask'][$x-1];
        $startdate= explode("-", $startdate);
        list($year, $month, $day)= $startdate;
        $startTask= $year.'-'.$month."-".$day;
        $enddate= $_POST['endTask'][$x-1];
        $enddate= explode("-", $enddate);
        list($year, $month, $day)= $enddate;
        $endTask= $year.'-'.$month."-".$day;
                    
        $taskName= $_POST['taskName'][$x-1];

        //checking if all fields are filled of a particular task
        if ($taskName!='' && $taskDescription!='' && $startTask!='' && $endTask!=''){
            
            $sql3 = "INSERT INTO `planit`.`task` (`taskID`,`planner_id`, `email_id`, `taskName`, `taskDescription`, `startTask`, `endTask`) VALUES ('$taskID', '$planner_id', 'ayeshaaamir2001@gmail.com', '$taskName', '$taskDescription', '$startTask', '$endTask' );";
            mysqli_query($conn,$sql3);
            $taskID+=1;
                        
        }
        else{
                    
            $showAlert="Task ". $x." could not be added to the planner.";
                        
        }
             
    }

header('Location: planner.php');
}



?>