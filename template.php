<?php
     include 'partials/_dbconnect.php';
 
     if ($_SERVER["REQUEST_METHOD"] == 'POST' && $_POST['savechanges']=='pressed'){
         //figure out: how to get templatetype from the button clicked and how to add alerts
        // $templateType = $_POST['template'];
        // echo $templateType;


         
        $taskcount=sizeof($_POST['taskName']);
      
        if($taskcount!=1 || ($_POST['taskName'][0]!='' && $_POST['taskDescription'][0]!='' && $_POST['startTask'][0]!= '' && $_POST['endTask'][0]!= '')){
            // finding out whether the user already has any planners. If they do, add 1 to the number of planners and set that as the planner_id
            $sql1= "SELECT * from `planit`.`planner` where email_id = 'ayeshaaamir2001@gmail.com';";
            $result=mysqli_query($conn,$sql1);
            $count = mysqli_num_rows($result);
            $planner_id= $count+1;
            $plannerName= $_POST['plannerName'];
            $sql2= "INSERT INTO `planit`.`planner` (`planner_id`,`plannerName`, `templateType`, `email_id`) VALUES ('$planner_id', '$plannerName', 'business', 'ayeshaaamir2001@gmail.com');";
            mysqli_query($conn,$sql2);

            //adding tasks for the planner
         
            $y = 1;
            for ($x = 1; $x <=$taskcount; $x++) {
             
             
                $taskName= $_POST['taskName'][$x-1];
                $taskDescription= $_POST['taskDescription'][$x-1];
                $startTask= $_POST['startTask'][$x-1];
                $endTask= $_POST['endTask'][$x-1];
             
             
                if ($taskName!='' && $taskDescription!='' && $startTask!='' && $endTask!=''){

                    $taskID= $y ;
                    $sql3 = "INSERT INTO `planit`.`task` (`taskID`,`planner_id`, `email_id`, `taskName`, `taskDescription`, `startTask`, `endTask`) VALUES ('$taskID', '$planner_id', 'ayeshaaamir2001@gmail.com', '$taskName', '$taskDescription', '$startTask', '$endTask' );";
                    mysqli_query($conn,$sql3);
                    $y++;
                }
                else{
                    echo 'TASK '.$x.' NOT ADDED';
                }
             
            }
        }
        else{
            echo 'PLEASE ENTER COMPLETE DETAILS FOR THE TASK';
        }
     }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
 
<?php require '<partials/_styling.php';?>

</head>


<body>


<?php require '<partials/_header.php';?>

<!-- MODAL -->
<div class="font-theme">
      <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Planner Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                      
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="template.php" method="POST">
                             <div class="form-group" >
                                <label for="fnameEdit">Planner Name</label>
                                <input type="text" class="form-control" name="plannerName" id="plannerName" required >
                            </div>
                            
                            Task Details
                            
                            <div>
                                <div class="col-lg-12">
                                    Task 
                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                            <input type="text" name="taskName[]" class="form-control m-input" placeholder="Enter Task Name" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="taskDescription[]" class="form-control m-input" placeholder="Enter Task Description" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="startTask[]" class="form-control m-input" placeholder="Enter Start Date" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="endTask[]" class="form-control m-input" placeholder="Enter End Date" autocomplete="off">
                                        </div>
                                    </div>
                                    <div id="newTask"></div>
                                    <button id="addTask" type="button" class="btn btn-info">Add Task</button>
                                </div>
                            </div>
    
                            <button type="submit" name="savechanges" value='pressed' class="btn btn-primary">Save changes</button>
                           
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
         
                    </div>
                </div>

            </div>
        </div>

<!-- Heading -->
    <div class="text-center font-theme">
        <h2 style="text-align:center;font-size:40px; color:#331766; padding-top: 1rem
    ;">
            Templates
        </h2>
    </div>

<!-- Template Options -->
    <div class="container2">
        <form action="template.php" method="POST">
            <div class="card" style="width: 1000px;
height: 100px;background:#F299F2BF; border-radius: 0; ">
                <div class="card-body font-theme" style="font-size: 30px; ">
                    Business Planner
                    <button type="button" name="template" value="business" class="view" data-toggle="modal" data-target="#modal"></button>
                </div>
            </div>
            <br>
            <div class="card" style="width: 1000px;
            height: 100px;background:#45D0BB; border-radius: 0; ">
                <div class="card-body font-theme" style="font-size: 30px;  ">
                    Study Planner
                    <button type="button" name="submit" class="view" data-toggle="modal" data-target="#modal"></button>
                </div>
            </div>
            <br>
            <div class="card" style="width: 1000px;
                        height: 100px;background:#41C357CF; border-radius: 0; ">
                <div class="card-body font-theme" style="font-size: 30px;  ">
                    Employee Planner
                    <button type="button" name="submit" class="view" data-toggle="modal" data-target="#modal"></button>
                </div>
            </div>
            <br>
            <div class="card" style="width: 1000px;
                                    height: 100px;background: #FFBF66DE; border-radius: 0; ">
                <div class="card-body font-theme" style="font-size: 30px;  ">
                    Event Planner
                    <button type="button" name="submit" class="view" data-toggle="modal" data-target="#modal"></button>
                </div>
            </div>
            <br>
        </form>
    </div>
</body>


<script type="text/javascript">
    // Adding new task input fields as user clicks Add Task button
    $(document).ready(function() {
        $("#addTask").click(function () {
            
            var html = '';
            html+= 'Task';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="taskName[]" class="form-control m-input" placeholder="Enter Task Name" autocomplete="off"></div>';
            html += '<div class="input-group mb-3">';
            html+= '<input type="text" name="taskDescription[]" class="form-control m-input"  placeholder="Enter Task Description" autocomplete="off"></div>';
            html += '<div class="input-group mb-3">';
            html+='<input type="text" name="startTask[]" class="form-control m-input" placeholder="Enter Start Date" autocomplete="off"></div>';
            html += '<div class="input-group mb-3">';
            html+='<input type="text" name="endTask[]" class="form-control m-input" placeholder="Enter End Date" autocomplete="off"></div>';
            
            $('#newTask').append(html);

            
        });
        });

        
    </script>
</html>