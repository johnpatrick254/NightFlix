<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/nightflix/includes/Header.php';
$loggedInUser = $_SESSION['user'];
if(!isset($_GET['id'])){
    ErrorHandler::showError("Page Does not Exist");
}
$entity = new Entity($db,$_GET['id']);
$preview = new PreviewProvider($db,$loggedInUser);
echo $preview->createPreviewVideo($entity);
$seasonProvider = new SeasonProvider($db,$loggedInUser);
echo $seasonProvider->createSeason($entity);
$categoryContainer = new Categories($db,$loggedInUser);
echo $categoryContainer->showCategories($entity->getCategoryID(),"You might also like");