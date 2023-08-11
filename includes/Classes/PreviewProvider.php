<?php

class PreviewProvider
{
  private $con, $username;

  function __construct(PDO $con, string $userName)
  {
    $this->con = $con;
    $this->username = $userName;
  }

  public function createPreviewVideo($entity = null)
  {
    if ($entity === null) {
      $entity = $this->getRandomEntity();
    }
    $id = $entity->getId();
    $name = $entity->getName();
    $preview = $entity->getPreview();
    $thumbNail = $entity->getThumbnail();
   return "
   <div class='preview-container'>
    <img class='preview-image' src='$thumbNail' hidden />
    <video autoplay muted class='preview-video' onended='previewEnded()'>
      <source src='$preview' type='video/mp4'/>
  </video>
    <div class='preview-overlay'>
        <div class='name-details'>
            <h3>$name</h3>
            <div class='buttons'>
              <button onclick=''><i class='fa-solid fa-play fa-beat-fade icon'></i>   Play</button>
              <button onclick ='toggleVolume(this)'><i class='fa-solid fa-volume-high icon'></i></button>

            </div>
        </div>
    </div>
    </div>
   ";

  }

  private function getRandomEntity()
  {
    $query = $this->con->prepare("SELECT * FROM entities ORDER BY RAND() LIMIT 1");
    $query->execute();
    $entity = $query->fetch(PDO::FETCH_ASSOC);
    return new Entity($this->con, $entity);
  }
}