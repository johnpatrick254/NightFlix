<?php
require_once "../includes/config.php";
if (isset($_POST['videoId']) && isset($_POST['username'])) {
    $query = $db->prepare("SELECT * FROM videoProgress WHERE username=:username AND videoId=:id");
    $query->bindValue(':username', $_POST['username']);
    $query->bindValue(':id', $_POST['videoId']);
    $query->execute();
    if ($query->rowCount() == 0) {
        $query = $db->prepare("INSERT INTO videoProgress (username,videoId) VALUES(:username,:id);");
        $query->bindValue(':username', $_POST['username']);
        $query->bindValue(':id', $_POST['videoId']);
        $query->execute();
    }
}

?>