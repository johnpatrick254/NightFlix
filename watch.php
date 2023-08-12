<?php
require_once dirname(__DIR__) . '/nightflix/includes/Header.php';
if(!isset($_GET['id'])){
    ErrorHandler::showError("Page Does not Exist");
}
$video = new Video($db,$_GET['id']);
$video->incrementViewCount();
?>