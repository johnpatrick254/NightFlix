<?php
require_once "../includes/config.php";
if (isset($_POST['videoId']) && isset($_POST['username'])&& isset($_POST['progress'])) {
        $query = $db->prepare("UPDATE videoProgress SET progress=:progress, dateModified=NOW() WHERE videoId=:id AND username=:username;");
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':id', $_POST['videoId']);
        $query->bindValue(':progress', $_POST['progress']);
        $query->execute();
} 


?>