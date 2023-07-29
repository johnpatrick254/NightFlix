<?php
declare(strict_types=1);
require_once "includes/config.php";

if(!isset($_SESSION['user'])){
    header("Location:login.php");
}
echo "<h1>Hello $_SESSION[user]</h1>";   