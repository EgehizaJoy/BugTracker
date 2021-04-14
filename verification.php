<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Issue Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="card" style="margin-top: 40px;width:50%;margin-left:25%;">
    <div class="card-header text-success bg-white text-center"><h3>Issue Tracking System | Verification</h3></div>
    <div class="card-body">
        <img src="images/logo.png" class="mx-auto d-block">
         <h7 class="text-success"><?php echo $_GET['success']?></h5>
    </div>
  </div>
</div>
</body>
</html>
