<?php
declare(strict_types=1);
spl_autoload_register(function ($classname) {
    require_once "includes/Classes/$classname.php";
});
require_once "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="assets/styles/index.css">
    <link rel="apple-touch-icon" sizes="180x180" href="includes/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="includes/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="includes/favicon-16x16.png">
 
    <title>NightFlix</title>
    <?php

    if (isset($_POST['submitButton'])) {
        $fname = FormValidator::sanitizeString($_POST['firstName']);
        $lname = FormValidator::sanitizeString($_POST['lastName']);
        $uname = FormValidator::sanitizeString($_POST['userName']);
        $email = FormValidator::sanitizeString($_POST['email']);
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if (!FormValidator::validatePassword($pass1, $pass2)) {
            $user = new User($db);
        }
    }

    function getPreviousValue($inputname)
    {
        if (isset($_POST[$inputname])) {
            echo $_POST[$inputname];
        }
        return "";
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
            <h4>Sign up</h4>
            <?php
            if (isset($_POST['submitButton'])) {
                if (!FormValidator::validatePassword($pass1, $pass2)) {
                    if ($user->register($fname, $lname, $uname, $email, $pass1)) {
                        echo "<script type='text/javascript'>var linkElement = document.createElement('a');linkElement.setAttribute('href', 'login.php');linkElement.style.display = 'none';document.body.appendChild(linkElement);linkElement.click();</script>";
                    }
                }
            } else {
                echo "<span>To dive into NightFlix</span>";
            }
            ?>

        </div>
        <form action= "" method="POST">
            <input type="text" name="firstName" placeholder="First Name"  value="<?php getPreviousValue('firstName') ?>"/>
            <input type="text" name="lastName" placeholder="Last Name" value="<?php getPreviousValue('lastName') ?>"/>
            <input type="text" name="userName" placeholder="User Name" value="<?php getPreviousValue('userName') ?>"/>
            <input type="email" name="email" placeholder="Enter Email" value="<?php getPreviousValue('email') ?>"/>
            <input type="password" name="pass1" placeholder="Enter password" value="<?php getPreviousValue('pass1') ?>"/>
            <input type="password" name="pass2" placeholder="Confirm Password"/> 
            <input type="submit" name="submitButton" value="Submit"/>

        </form>
        <a href="login.php" class="login-cta"> Already signed up? click here to Login </a>
    </div>
    </div>
    
</body>
</html>
