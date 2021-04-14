<?php
require 'config.php';

if(isset($_GET['email']) && !empty($_GET['email'])){
    // Verify data
    $email = $_GET['email']; // Set email variable
              
    $sql="SELECT email,active FROM users WHERE email='".$email."' AND active='0'";
    $search = $conn->prepare($sql); 
    $search->execute();
                  
    if($row = $search->fetch(PDO::FETCH_ASSOC)){
        // We have a match, activate the account
        $sql1="UPDATE users SET active='1' WHERE email='".$email."' AND active='0'";
        $stm=$conn->prepare($sql1);
        $stm->execute();
        header('Location: index.php?error=your account has been activated. Log in!');
    }else{
        // No match -> invalid url or account has already been activated.
        header('Location: index.php?error=your account had already been activated Log in!');
    }
                  
}else{
    // Invalid approach
    header('Location: verification.php?error=activate accountusing link sent to your mail');
}
?>