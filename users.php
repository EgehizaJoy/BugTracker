<?php
session_start();
require 'config.php';
if(isset($_POST["register"])){
$name=$_POST['names'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$code=$_POST['code'];
$phone=$_POST['phone'];
$mobile=$code.$phone;

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if ($uppercase && $lowercase && $number && strlen($password) >= 8) 
{
  if ($password==$confirm) {
    $sql = $conn->prepare("INSERT INTO users (user_email, user_password,user_phone,user_names) VALUES
    ('$email','$password','$mobile','$name')");
    $sql->execute();
    $_SESSION['user_id']=$conn->lastInsertId();
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    //the belowshould later be sent to verification.php
    header('Location: projects.php');
    exit();

    /*$to      = $email; // Send email to our user
    $subject = 'Signup | Verification'; // Give the email a subject 
    $message = ' 
     Thanks for signing up!
     Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
     ------------------------
    Please click this link to activate your account:
    
    http://localhost/issuetracker/verify.php?email='.$email.''; // Our message above including the link
                      
    $headers = 'From:tiforanita@gmail.com' . "\r\n"; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    $msg = 'Your account has been made, please verify it by clicking the activation link that has been send to your email.';
    header('Location: verification.php?success='.$msg);*/

  }else {
    header('Location: register.php?error=Passwords do not match');
  }
 }else{
  header('Location: register.php?error=password does not meet requirements');
 }

}

if(isset($_POST["login"])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $_SESSION['Reg_email']=$email;
    $sql="SELECT user_id,user_email,user_password,user_names,active FROM users WHERE user_email='$email' and user_password='$password'";
    $result=$conn->prepare($sql);
    $result->execute();

    if($row = $result->fetch(PDO::FETCH_ASSOC)){
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['email']=$row['user_email'];
        $_SESSION['name']=$row['user_names'];

        header('Location: projects.php');
        exit();
        if (isset($_POST['remember']) ) {
            setcookie ("username",$email,time()+ 3600);
           }
           else {
            setcookie("username","");
          }
      } else{
      $_SESSION['error']="Incorrect Password/Email";
      header('Location: login.php');
      }
  }

  if(isset($_REQUEST['action'])=='Logout'){
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.html');
  }
  if (isset($_POST["send"])) {
    $email=$_POST['femail'];

    $sql="SELECT user_password FROM users WHERE user_email='$email'";
    $result=$conn->prepare($sql);
    $result->execute();
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $to      = $email; // Send email to our user
    $subject = 'Your Password;' ;// Give the email a subject 
    $message = $row['user_password']; // Our message above including the link
                      
    $headers = 'From:charitykiguhi@gmail.com'; // Set from headers
    mail($to, $subject, $message, $headers); // Send our email

    $_SESSION['error']="Password has been mailed...";
    header('Location: login.php');
  }
?>