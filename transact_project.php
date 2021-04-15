<?php
require 'config.php';
if(isset($_POST["sendProject"])){
$name=$_POST['projectname'];
$users=$_POST['projectusers'];

 if(empty($name)){
 session_start();
 $_SESSION['project_error']="Project name was not inserted";
 header('Location: newProjectprojects.php');  
 }
 else if(empty($users)){
 session_start();
 $_SESSION['project_error']="Members were not inserted";
 header('Location: newProjectprojects.php'); 
  }
  else
    {
        $array = explode("\r\n", $users);
        $email_array = array_unique($array);
        $participants=count($email_array);
        
        $query = "INSERT INTO projects (project_name,issues,participants) VALUES
        ('$name',0,$participants)";
        $statement = $conn->prepare($query);
        $statement->execute();
        session_start();
        $_SESSION['$project_id']=$conn->lastInsertId();
  
        for ($i = 0; $i < $participants; ++$i) {
         $sql = "INSERT INTO project_members(emails,project_id) VALUES
         ('$email_array[$i]','".$_SESSION['$project_id']."')";
         $result = $conn->prepare($sql);
         $result->execute();
          header('Location: newProjectprojects.php');
    }
  }
}
?>
