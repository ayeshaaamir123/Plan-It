<?php 
include 'partials/_dbconnect.php';

session_start();

//$user =$_SESSION["email_id"];

$user='ayeshaaamir2001@gmail.com';
$planner_id=$_POST['planner_id'];
$sql1="SELECT * from task where planner_id='$planner_id' and email_id='$user';";
$result=mysqli_query($conn,$sql1);
    $count = mysqli_num_rows($result);
    while ($row_element = mysqli_fetch_array($result)){
           $tasks[]=$row_element;
    }  
   // print_r($tasks) ;  

$sql2="SELECT * from planner where planner_id='$planner_id' and email_id='$user';";
$result=mysqli_query($conn,$sql2);
$plan = mysqli_fetch_array($result);
//print_r($plan) ; 

//delete task



//edit task
   

///add task

   $color=['#3ed6bf','#F299F2BF','#41C357CF','#FFBF66DE'];

?>


<!DOCTYPE html>
<html lang="en-US">


<head>
<?php require '<partials/_styling.php'?>
</head>

<body>

<?php require '<partials/_header.php';?>

    <div class="text-center font-theme">
        <h2 style="text-align:center;font-size:40px; color:#331766; padding-top: 1rem
    ;">
          <?php echo $plan['plannerName'];  ?>
        </h2>
    </div>

    <!--TASK BAR -->
    <div class="container2 d-flex flex-row justify-content" style="margin: auto;">
   <?php  for ($x=1; $x <= $count; $x++){
echo ' <div class="p-2">
            <div class="container-taskbar ">
            '.$tasks[$x-1]['taskName'].'
            </div>
            <div class="d-flex flex-row justify-content-between " style=" width: 200px; margin: auto;">
                <div class="p-2">'.$tasks[$x-1]['startTask'].'</div>
                <div class="p-2" >'.$tasks[$x-1]['endTask'].'</div>
            </div>
        </div>';}?>
           
    </div>

    <!-- MAIN BODY WITH TASKS AND CHART -->

    <div class= "d-flex" style="padding-top: 4rem;">
        <!-- TASKS -->


        <div class="p-2">  

        <?php for ($x=1; $x <= $count; $x++){
    echo' <div class="card" style="width:500px;height: 180px;left: 4rem; border-radius: 20;background: linear-gradient(180deg, #3ED6BF 0%, rgba(62, 214, 191, 0.8) 100%);" >
                <div class="card-body">
                    <div class= "d-flex felx-row justify-content-between">
                        <h5 class="card-title p-2"> '.$tasks[$x-1]['taskName'].'</h5>
                        <h6 class="p-2" >'.$tasks[$x-1]['startTask'].'</h6>
                       
                    </div>
            
                    <h5 class="card-subtitle ml-3" style="color: rgb(255, 255, 255); font-size: 16px;">'.$tasks[$x-1]['taskDescription'].'</h5>
                    <hr>
                    <div class="btn-group"role="group" aria-label="Basic example" >

                    <form action="planner.php" method="POST">
                        <button type="submit" class="btn btn-secondary" name="donetask"  style="background: #19524b; ">Done</button>
                        
                        

                        
                        <button type="submit" class="btn btn-secondary" name="deletetask" value='.$tasks[$x-1]['taskID'].'  style="background: #19524b; ">Delete</button>
                        
                        </form>
                        <button type="submit" class="btn btn-secondary" name="edittask" data-toggle="modal" data-target="#modaledittask" style="background: #19524b; ">Edit</button>
                    </div>

                </div>
            </div>
            <br>';} ?>
      
        </div>
    
  

    <div class="font-theme">
      <div class="modal fade" id="modaledittask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                      
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="deletetask.php" method="POST">
                             
                            Task Details
                            
                            <div>
                                <div class="col-lg-12">
                                 
                                    <div id="inputFormRow">
                                        <div class="input-group mb-3">
                                            <input type="text" name="edittaskName" class="form-control m-input" placeholder="Enter Task Name" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="edittaskDescription" class="form-control m-input" placeholder="Enter Task Description" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="editstartTask" class="form-control m-input" placeholder="Enter Start Date" autocomplete="off">
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="text" name="editendTask" class="form-control m-input" placeholder="Enter End Date" autocomplete="off">
                                        </div>
                                    
                                    </div>
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

    <!-- add task -->
      <div class="modal fade" id="modaladdtask" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                      
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="addtask.php" method="POST">
                             
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
    
                            <button type="submit" name="savechanges" value='<?php echo $planner_id; ?>' class="btn btn-primary">Save changes</button>
                           
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
         
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <!-- PIE CHART -->
        <div class="chart p-2">
            <h1>Pie chart View</h1>
    
            <div id="piechart"></div>
        </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 8],
                ['Eat', 2],
                ['TV', 4],
                ['Gym', 2],
                ['Sleep', 8]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = { 'title': 'My Average Day', 'width': 550, 'height': 400 };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }


    </script>
    </div>
    <br>
    <!-- ADD BUTTON -->
    <div class="card mx-auto text-center" style="width: 30rem;background:#F299F2BF; ">
        <div class="card-body font-theme">
            Add Task
        
            <button type="submit" name="submit" class="view" data-toggle="modal" data-target="#modaladdtask"></button>
           
           
        </div>
    </div>
    <br>
 


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

</body>


</html>
