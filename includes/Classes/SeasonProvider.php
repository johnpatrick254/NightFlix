<?php

class SeasonProvider{

    private $con, $username;

function __construct(PDO $con, string $userName)
{
  $this->con = $con;
  $this->username = $userName;
}

public function createSeason(Entity $entity){
    $seasons = $entity->getSeason();

    if(sizeof($seasons)== 0){
      return;
    }
     $seasonHTML='';
    foreach($seasons as $season){
        $seasonNumber =$season->getSeasonNumber();
        $videoHTML="";
         foreach($season->getSeasonVideos() as $video){
            $videoHTML .= $this->createVideoCard($video);
         }
        $seasonHTML .= "
        <div class='season'>
            <h3> Season $seasonNumber</h3>
            <div class='videos'>
                $videoHTML
            </div>
        </div>
        
        ";
    }

    return $seasonHTML;
}

private function createVideoCard(Video $video){
    $id = $video->getID();
    $thumbnail = $video->getThumbnail();
    $name = $video->getTitle();
    $desc = $video->getDescription();
    $episodeNo = $video->getEpisodeNumber();

    return "
    <a href='watch.php?id=$id'>

    <div class='episode-container'>
        <div class='content'>
            <img src='$thumbnail'>
            <div class='video-info'>
                <h4>$episodeNo $name</h4>
                <span>$desc</span>
            </div>
        </div>

    </div>
    </a>
    
    ";

}

}