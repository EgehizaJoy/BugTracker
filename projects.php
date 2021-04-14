<?php 
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Issue Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-success text-white fixed-top"> 
    <div class="container">
      <a class="navbar-brand" href="projects.php"><span class="text-white"><img src="images/logo.png">BugTracker</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto"> 
          <li class="nav-item active">
            <a class="nav-link text-white" href="projects.php">Projects</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-white" href="users.php?action=Logout">Sign Out</a>
          </li>
        </ul>
      </div>
    </div> 
  </nav>

<div class="container" style="margin-top: 50px;">
<div class="container-fluid d-flex justify-content-center" style="padding-right: 5%;">
          <div class="card">
          <div class="card-header text-info bg-white">Total Projects</div>
           <div class="card-body">
            <div class="progress">
            <?php 
                
                 $sql="SELECT id FROM projects";
                  $stm1=$conn->prepare($sql);
                  $stm1->execute();
                  $project_count=$stm1->rowCount();;?>
            <div class="progress-bar progress-bar-striped active bg-info" role="progressbar"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:20%">
             <?php echo $project_count?>
          </div>
        </div> 
          </div>
         </div>
          <div class="card ">
          <div class="card-header text-warning bg-white">Total Bugs Fixed</div>
           <div class="card-body">
           <div class="progress">
            <?php 
                
                 $sql="SELECT issue_id FROM issues where status='completed'";
                  $stm1=$conn->prepare($sql);
                  $stm1->execute();
                  $fixed_count=$stm1->rowCount();;?>
            <div class="progress-bar progress-bar-striped active bg-warning" role="progressbar"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:50%">
             <?php echo $fixed_count?>
          </div>   
          </div>
          </div>
         </div>

          <div class="card ">
          <div class="card-header text-danger bg-white">Critical Bugs</div>
           <div class="card-body">
           <div class="progress">
            <?php 
                
                 $sql="SELECT issue_id FROM issues where status!='completed'";
                  $stm1=$conn->prepare($sql);
                  $stm1->execute();
                  $fixed_count=$stm1->rowCount();;?>
            <div class="progress-bar progress-bar-striped active bg-danger" role="progressbar"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:20%">
             <?php echo $fixed_count?>
          </div>
          </div>
          </div>
         </div>
      
         <div class="card ">
         <div class="card-header text-success bg-white">Users</div>
           <div class="card-body">
           <div class="progress">
            <?php 
                
                 $sql="SELECT user_id FROM users ";
                  $stm1=$conn->prepare($sql);
                  $stm1->execute();
                  $user_count=$stm1->rowCount();;?>
            <div class="progress-bar progress-bar-striped active bg-success" role="progressbar"
             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
             <?php echo $user_count?>
          </div>
          </div> 
         </div>
         </div>
</div>

    <div class="card" style="margin-top: 40px;">
        <div class="card-header text-success bg-white">
            <h5>Your Projects:
          </div>
        <div class="card-body">
    <a href="newProject.php" class="btn btn-success text-white">Create New Project</a>

       <div class="input-group" style="margin-top:20px"> 
        <input type="text" class="form-control" placeholder="Search for project " id="myInput" onkeyup="myFunction()">
       </div>
     <div class="table-responsive">
    <table class="table table-bordered" style="margin-top: 20px;width: 100%;" id="myTable">
        <thead>
          <tr>
            <th>Project Name</th>
            <th>Issues</th>
            <th>Participants</th>
          </tr>
        </thead>
        <tbody>
         <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
         <?php  
                 $sql="SELECT * FROM projects";
                 $stm=$conn->prepare($sql);
                 $stm->execute();               
               // LOOP TILL END OF DATA  
                while($row = $stm->fetch(PDO::FETCH_ASSOC)) 
                { 
                  $projectId=$row['id'];
                  $sql1="SELECT COUNT(*) FROM issues WHERE project_id=$projectId";
                  $stm1=$conn->prepare($sql1);
                  $stm1->execute();
                  $count=$stm1->fetchColumn();
  
                  $sql2="UPDATE projects SET issues='$count' WHERE id=$projectId";
                  $stm2=$conn->prepare($sql2);
                  $stm2->execute();
              ?> 
            <tr> 

                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN
                --> 
                <td><?php echo '<a href="issues.php?project=' . $row['id'] . '">'.$row['project_name'].'</a>';?></td>
                <td><?php echo $row['issues'];?></td> 
                <td><?php echo $row['participants'];?></td> 
            </tr> 
            <?php 
                } 
             ?> 
        </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
      <script type="text/javascript" src="js/main.js"></script>
</body>
</html>

