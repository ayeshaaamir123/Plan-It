<?php
$showAlert1=false;
$showAlert2=false;
session_start();
include('partials/_dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST'){
    
    $email = $_POST['EmailId'];
    $password = $_POST['Password'];

//to prevent from mysqli injection  
$email = stripcslashes($email);
$password = stripcslashes($password);
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

$sql = "SELECT * from user where email_id = '$email' ";// AND  password = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
//echo $count;

if ($count == 1) {
    $sql1 = "SELECT * from user where email_id = '$email' AND  password = '$password'";
    $result1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    $count1 = mysqli_num_rows($result1);
    if ($count1==1){
        $_SESSION['EmailId'] = $email;
        header("location: profile.php");

    }else{
        $showAlert1="Password does not match with the this email id";
        //echo "<script>alert('Password does not match with the this email id')</script>";
        //echo "<script>location.href='login.php'</script>";

    }
   
} else {
    $showAlert2="email does not exist";
    //echo "<script>alert('email does not exist')</script>";
    //echo "<script>location.href='login.php'</script>";
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
<?php
if($showAlert1){
echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> '. $showAlert1.'
</div>';
}
if($showAlert2){
    echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error!</strong> '. $showAlert2.'
    </div>';
}
?>    
        <div class="container" >
            <div class="heading col-md-7" style="text-align: justify;">Plan It
                <p>In this fast-paced, keeping track of our tasks and their relevant deadlines is not an easy feat. Plan
                    It serves as an assisting application to provide users ease in maintaining all of their important
                    tasks in one place.</p>
            </div>
            
            <div class="card" style="width: 30rem; padding-bottom: 5rem; left: 700px; border: 2px solid rgba(196, 182, 218, 0.87);">
                <div class="card-body" ; style="text-align:center" ;>
                    <h2 class="card-title" style="padding-top: 5rem;">Login</h2>
                    <form method="POST">
                        
                        <div class="form-group" style="padding-top: 2rem;">

                            <input type="email" class="form-control" id="EmailId" name="EmailId" aria-describedby="emailHelp"
                                placeholder="Enter email">

                        </div>
                        
                        <div class="form-group" style="padding-top: 1rem; padding-bottom: 2rem;">

                            <input type="password" class="form-control" id="Password"  name="Password" placeholder="Password">
                        </div>
                        
                        <button type="submit" class="btn">Login</button>

                    </form>

                    <a style="color: #301b52; " href="signup.php">Create Account?</a>
                </div>
            </div>
            

        </div>
    

    


</body>

</html>