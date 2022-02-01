<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
 
<?php require '<partials/_styling.php';?>

</head>

<body>
<?php require '<partials/_header.php';?>
<center>
    <h1>
      <div class="p-3 mb-2 bg-dark text-white">𝔸𝕓𝕠𝕦𝕥 𝕌𝕤</div>
    </h1>
  </center>
  <style>
    h1 {
      margin-bottom: -8px;
      margin-top: -10px;
    }
  </style>

  <center>
    <img src="images\office.jpg" class="img-fluid" alt="..." />
  </center>

  <br />
  <h4>
    <div class="bg-dark text-light">
    In this fast-paced, keeping track of our tasks and their
     relevant deadlines is not an easy feat. Plan It serves 
     as an assisting application to provide users ease in 
     maintaining all of their important tasks in one place.  
      
    
    </div>
  </h4>
  <style>
    h4 {
      margin-top: -24px;
      margin-bottom: 0px;
      border-top-style: solid;
      border-top-width: 0px;
      border-bottom-style: solid;
      padding-bottom: 0px;
    }
  </style>

  <div class="card text-center">
   
      <a href="contactus.php" class="mx-auto mt-5 btn btn-dark">Contact Us</a>
    
    <div class="card-footer text-muted">© 2022 Plan It. All rights reserved.</div>
  </div>

</body>

</html>
