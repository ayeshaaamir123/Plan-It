<?php 
include 'partials/_dbconnect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if(isset($_POST['deletetask']) or isset($_POST['donetask'])  ){

        $taskID=$_POST['deletetask'];
        $sqldel="DELETE FROM task where taskID='$taskID'";
        mysqli_query($conn,$sqldel);
        echo mysqli_error($conn);
        header('Location: planner.php');}}
?>