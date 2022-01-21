<?php
    include 'partials/_dbconnect.php';


    if ($_SERVER["REQUEST_METHOD"] == 'POST'){
        //If user wants to edit their details
        
            $fname = $_POST['fnameEdit'];
            $lname = $_POST['lnameEdit'];
            $number = $_POST['numberEdit'];
    
            //UPDATING user's data according to the changes entered by them
            $sql1a = "UPDATE user SET `firstName` = '$fname' WHERE `email_id` = 'ayeshaaamir2001@gmail.com'";
            $sql1b = "UPDATE user SET `lastName` = '$lname' WHERE `email_id` = 'ayeshaaamir2001@gmail.com'";
            $sql1c = "UPDATE user SET `contact` = '$number' WHERE `email_id` = 'ayeshaaamir2001@gmail.com'";
            
            mysqli_query($conn,$sql1a);
            mysqli_query($conn,$sql1b);
            mysqli_query($conn,$sql1c);
            echo mysqli_error($conn);
        
    }

    $sql2 = "SELECT * from user where email_id = 'ayeshaaamir2001@gmail.com'";
    $result=mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_array($result);

    $sql3="SELECT * from planner where email_id = 'ayeshaaamir2001@gmail.com'";
    $result=mysqli_query($conn,$sql3);
    $count = mysqli_num_rows($result);
    while ($row_element = mysqli_fetch_array($result)){
           $row3[]=$row_element;
    }    
   // print_r($row3) 

?>


<!DOCTYPE html>
<html lang="en">
<head>
 
<?php require '<partials/_styling.php';?>

</head>

<body>


    <?php require '<partials/_header.php';?>

      <!-- EDIT BUTTON MODAL -->
<div class="font-theme">
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                      
                    </div>
                    <div class="modal-body">
                        <!-- Modal Body -->
                        <form action="profile.php" method="POST">
                             <div class="form-group" >
                                <label for="fnameEdit">First Name</label>
                                <input type="text" class="form-control" name="fnameEdit" id="fnameEdit" required >
                            </div>
                            <div class="form-group" >
                                <label for="fnameEdit">Last Name</label>
                                <input type="text" class="form-control" name="lnameEdit" name="lnameEdit" required>
                            </div>
                            
                            <div class="form-group" >
                                <label for="numberEdit">Contact Number</label>
                                <input type="tel"  pattern="[0-9]{4}-[0-9]{7}" class="form-control" name="numberEdit" id="numberEdit"  required>
                                <small>Format: 03XX-XXXXXXX</small>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Save changes</button>
                           
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
         
                    </div>
                </div>

            </div>
        </div>

    <div class="text-center">
 
        <h2
            style="text-align:center;font-size:40px; color:#331766; padding-top: 1rem
;">
            Welcome User
        </h2>
        <div>
            <h3 style="color: rgb(65, 66, 82); font-size: 25px; padding-top: 1rem; padding-bottom: 1rem;">Personal Information</h3>
        </div>
    <div style="padding-right: 2rem; padding-left: 2rem;">
        <table class="table table-bordered" id='myTable' >
            <thead>
                <tr>
        
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th> Actions </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- Showing Personal Information from database -->
                    <td>

                         <?php echo $row2['firstName'];?> 
                    </td>
                    <td>
                        <?php echo $row2['lastName'];?>
                    </td>
                    <td>
                        <?php echo $row2['email_id']; ?> 
                    </td>
                    <td>
                        <?php echo $row2['contact']; ?> 
                    </td>
                    
                    <td> <button style=" background-color:#10102b; border-color:#10102b;" name='edit' data-toggle="modal" data-target="#editModal"
                            class='edit btn btn-primary' id='edit'>Edit</button></td>
        
        
                </tr>
        
            </tbody>
        </table>

    </div>
<div>
    <h6 style="color: rgb(65, 66, 82); font-size: 25px; padding-top: 1rem; padding-bottom: 1rem;">Your Planners
    </h6>
</div>
<div class="container2">
<div class="card" style="width: 30rem;background: #45D0BB; ">
    <div class="card-body font-theme">
        Create A New Planner
        <a class="view" href="template.php">View</a>
    </div>
</div>

</div>

<?php

$x=1 ;                                  
for ($x; $x <= $count; $x++){ 
    
echo'
<div class="container2">
        <div class="card" style="width: 30rem;background:#F299F2BF; ">
            <div class="card-body font-theme">
                '.$row3[$x-1]['plannerName'].'     
         <a class="view" href="planner.php">View</a>
               
            </div>
        </div>
</div>';}?>
</div>
</body>

</html>