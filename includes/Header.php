<?php
declare(strict_types=1);
require_once "includes/config.php";
spl_autoload_register(function ($className){
require_once "includes/Classes/$className.php";
});

if(!isset($_SESSION['user'])){
    header("Location:login.php");
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type = "text/css" href="assets/styles/index.css">
    <title>NightFlix</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f7b087d71b.js" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</head>
<body>
<div class="wrapper">


