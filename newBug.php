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
            <span>New Bug/Issue</span>
        </h5></div>
        <div class="card-body">
            <form action="transact_bugs.php" method="post" class="form-horizontal" role="form">
                   <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="text" class="form-control" name="issue_name" value="" placeholder="Issue Name">                                        
                            <?php
                            $projectId=$_GET['project'];
                            echo '<input type="hidden" name="projectId" value='.$projectId.'>';
                            ?>
                        </div>
                    
                      <div class="form-group" style="margin-top: 10px">
                        <label for="admins">Priority</label>
                        <select class="form-control" id="admins" name="priority">
                         <option>Critical</option>
                         <option>High</option>
                         <option>Low</option>
                         </select>
                     </div>
                      <div class="form-group" style="margin-top: 10px">
                        <label for="admins">Status</label>
                        <select class="form-control" id="admins" name="status">
                         <option class="text-danger">In Progress</option>
                         <option class="text-success">Completed</option>
                         </select>
                     </div>

                  <div class="form-group" style="margin-top: 10px"s>
                 <label for="comment">Description:</label>
                 <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                  </div> 
                  <div class="form-group ">
                  <label for="createdOn" class="col-2 col-form-label">Created On:</label>
                  <div class="col-sm-5">
                 <input class="form-control" type="date" value="2021-04-16" name="dateCreated">
                </div>
               </div>
              <div class="col-sm-5">
                      <div class="form-group" style="margin-top: 10px">
                        <label for="admins">Assign User</label>
                        <select class="form-control" id="admins" name="assignedTo">
                        <?php
                                          require "config.php";  // Using database connection file here
                                          $sql="SELECT emails From project_members WHERE project_id=$projectId";
                                          $records = $conn->query($sql);  // Use select query here 
                                           while($data = $records->fetch(PDO::FETCH_ASSOC))
                                            {
                                           echo "<option value='". $data['emails'] ."'>" .$data['emails'] ."</option>";  // displaying data in option menu
                                             } 
                                           ?> 
                         </select>
                     </div>
                   </div>
                    <div  class="form-group" style="margin-top: 10px;">
                         <button type="submit" class="btn btn-success text-white" name="submitBug">Submit Issue</button>
                    </div>
                </form>     
        </div>
       </div>
      </div>
</body>
</html>

