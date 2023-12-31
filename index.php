<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/nightflix/includes/Header.php';

$loggedInUser = $_SESSION['user'];

$preview = new PreviewProvider($db,$loggedInUser);
$categoris = new Categories($db,$loggedInUser);

echo $preview->createPreviewVideo();   
echo $categoris->showAllCategories();