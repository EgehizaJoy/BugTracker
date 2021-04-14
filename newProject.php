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
    <div class="card" style="margin-top: 40px;width: 60%;margin-left: 15%;">
        <div class="card-header text-success bg-white">
            <span>New Project</span>
        </h5></div>
        <div class="card-body">
            <form action="transact_project.php" method="post">
                <div class="form-group" style="margin-bottom: 20px;">
                  <label for="projectname">Project Name:</label>
                  <input type="text" class="form-control" id="projectname" name="projectname">
                </div>
                   
                <div class="form-group">
                  <label for="comment">Add Project Team:</label>
                  <textarea class="form-control" rows="5" id="users" name="projectusers" placeholder="member1@gmail.com&#10;member2@gmail.com&#10;member3@gmail.com"></textarea>  
                </div>
                <button type="submit" class="btn btn-success" style="margin-top: 20px;" name="sendProject">Submit Project</button>
              </form>
        </div>
       </div>
      </div>
</body>
</html>

