<?php
session_start();
require 'config.php';
if(isset($_POST["submitBug"])){
$name=$_POST['issue_name'];
$priority=$_POST['priority'];
$status=$_POST['status'];
$description=$_POST['description'];
$dateCreated=$_POST['dateCreated'];
$assignedUser=$_POST['assignedTo'];
$project=$_POST['projectId'];
$createdBy=$_SESSION['name'];
$userId=$_SESSION['user_id'];

 if(empty($name)||empty($description)){
 session_start();
 $_SESSION['error']="Please Insert all values!";
 header('Location: newBug.php');  
 }
  else
    {
    $sql ="INSERT INTO issues (issue_name,project_id,created_on,created_by,assigned_to,description,priority,status,userId) VALUES
    ('$name','$project','$dateCreated','$createdBy','$assignedUser','$description','$priority','$status',$userId)"; 
    $result = $conn->prepare($sql);
    $result->execute();
    header('Location:issues.php?project='.$project.''); 
    }
  }

  if (isset($_POST["updateBug"])) {
    $priority1=$_POST['priority'];
    $status1=$_POST['status'];
    $description1=$_POST['description'];
    $assignedUser1=$_POST['assigned'];
    $issue=$_POST['issueId'];
   
    $sql1="SELECT project_id FROM issues WHERE issue_id=$issue";
    $stm1=$conn->prepare($sql1);
    $stm1->execute();
    $row = $stm1->fetch(PDO::FETCH_ASSOC);
    $editProjectId=$row['project_id'];

    $sql2="UPDATE issues SET priority='$priority1',status='$status1', description='$description1', assigned_to='$assignedUser1'
    WHERE issue_id=$issue";
    $stm=$conn->prepare($sql2);
    $stm->execute();
    header('Location:issues.php?project='.$row['project_id'].''); 
  }
  
  if (isset($_POST["deleteBug"])) {
    $issue=$_POST['issueId'];
    $sql1="SELECT project_id FROM issues WHERE issue_id=$issue";
    $stm1=$conn->prepare($sql1);
    $stm1->execute();
    $row = $stm1->fetch(PDO::FETCH_ASSOC);
    $editProjectId=$row['project_id'];

    $sql4="DELETE FROM issues WHERE issue_id=$issue";
    $stm=$conn->prepare($sql4);
    $stm->execute();
    header('Location:issues.php?project='.$row['project_id'].''); 
  }
  
?>