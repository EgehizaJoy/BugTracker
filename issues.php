<!DOCTYPE html>
<html lang="en">
<head>
<title>Issue Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">

$(document).ready(function(){
    $('#myTable td.status').each(function(){
        if ($(this).text() == 'Completed') {
            $(this).css('background-color','#28a745');
        }else{
          $(this).css('background-color','#ffc107');
        }
    });
    $('#myTable td.priority').each(function(){
        if ($(this).text() == 'Low') {
            $(this).css('background-color','#28a745');
        }else if($(this).text() == 'High'){
          $(this).css('background-color','#ffc107');
        }else{
          $(this).css('background-color','#dc3545');
        }
    });
});
</script>
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
          <li class="nav-item">
            <a class="nav-link text-white" href="javascript:javascript:history.go(-1)"><span><i class="fa fa-arrow-left" style="font-size:24px;color:white"></i></span></a>
          </li>
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
    <div class="card" style="margin-top: 40px;">
        <div class="card-header text-success bg-white">
            <h5>All Bugs/Issues</h5>
            </div>
        <div class="card-body">
        <?php
         $projectId=$_GET['project'];
        ?>
     <?php echo '<a href="newBug.php?project='.$projectId.'" type="button" class="btn btn-success text-white">Create New Issue</a>';?>
     <button type="button" class="btn btn-success" onclick="sortTable(1)">Sort By Priority</button>

     
    <!--<a href="newBug.php " type="button" class="btn btn-success text-white">Create New Issue</a>-->
    <div class="input-group" style="margin-top:20px"> 
    <input type="text" class="form-control" placeholder="Search for Bug " id="myInput" onkeyup="myFunction()">
    </div>
    <div class="table-responsive">
    <table class="table table-bordered " style="margin-top: 20px;" id="myTable">
        <thead>
          <tr>
            <th rowspan="2">Issue Name</th>
            <th rowspan="2">Priority</th>
            <th colspan="2">Created</th>
            <th rowspan="2">Assigned To</th>
            <th rowspan="2">Status</th>
        </tr>
        <tr>
            <th>On:</th>
            <th>By:</th>
        </tr>
        </thead>
        <tbody>
        <?php  
                 require 'config.php';
                 $projectId=$_GET['project'];
                 $sql="SELECT * FROM issues WHERE project_id=$projectId";
                 $stm=$conn->prepare($sql);
                 $stm->execute();
               // LOOP TILL END OF DATA  
                while($row = $stm->fetch(PDO::FETCH_ASSOC)) 
                { 
              ?> 
            <tr> 

                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN
                    <td> echo '<a href="editIssue.php?issue=' . $row['issue_id'] . '&project='.$projectId.'">'.$row['issue_name'].'</a>';?></td>
                --> 
                <td><?php echo '<a href="editIssue.php?issue=' . $row['issue_id'] . '&project='.$projectId.'">'.$row['issue_name'].'</a>';?></td>
                <td class="priority text-white"><?php echo $row['priority'];?></td> 
                <td><?php echo $row['created_on'];?></td> 
                <td><?php echo $row['created_by'];?></td>
                <td><?php echo $row['assigned_to'];?></td>
                <td class="status text-white"><?php echo $row['status'];?></td>
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
</div>
<!--Display Count from issues where project id=#fetch project id upon clicking a project
Count no users where project id= from table projec-->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

