<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/nightflix/includes/Header.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="assets/styles/index.css">
    <title>NightFlix</title>
    <?php

    if (isset($_POST['submitButton'])) {
        $email = FormValidator::sanitizeString($_POST['email']);
        $pass1 = $_POST['pass1'];
        $user = new User($db);
    }
    function getPreviousValue ($inputname){
        if(isset($_POST[$inputname])){
            echo $_POST[$inputname];
        }
        return;
    }
    ?>
</head>
<body>
    <div class="siginin-container">
    <div class="siginin-container_column">
        <div class="logo" >
            <img src="https://fontmeme.com/permalink/230728/5da22634780d8f9b3fe9fb4252d8a6e4.png" alt="Nightflix Logo"/>
        </div>
        <div class="siginin-container_column-header">
            <h4>Login</h4>
            <?php
            if (isset($_POST['submitButton'])) {
                if ($user->login($email, $pass1)) {
                    $_SESSION['user']=$email;
                    echo "<script type='text/javascript'>var linkElement = document.createElement('a');linkElement.setAttribute('href', 'index.php');linkElement.style.display = 'none';document.body.appendChild(linkElement);linkElement.click();</script>";
                } 
            } else {
                echo "<span>To dive into NightFlix</span>";
            }
            ?>
        </div>
        <form action= "" method="POST">

        <input type="email" name="email" placeholder="Enter Email" value=" <?php getPreviousValue('email')?>"/>
            <input type="password" name="pass1" placeholder="Enter password" value="<?php getPreviousValue('pass1') ?>"/>
            <input type="submit" name="submitButton" value="Login"/>

        </form>
        <a href="register.php" class="login-cta"> Don't have an account? click here to Register </a>
    </div>
    </div>
   
</body>
</html>





