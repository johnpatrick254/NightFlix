<?php
class Video{
    private $conn, $data;
    private Entity $entity ;

  function __construct(PDO $con,$input){
    $this->conn =$con;
    if(is_array($input)){
        $this->data = $input;
    }else{
        $query = $this->conn->prepare("SELECT * FROM videos WHERE id=:id;");
        $query->bindValue(":id",$input);
        $query->execute();
        $this->data = $query->fetch(PDO::FETCH_ASSOC);
    }

    $this->entity = new Entity($this->conn,$this->data['entityId']);

  }

  public function getID(){
    return $this->data['id'];
  }

  public function getTitle(){
    return $this->data['title'];
  }

  public function getDescription(){
    return $this->data['description'];
  }

  public function getFilePath(){
    return $this->data['filePath'];
  }
  public function getThumbnail(){
    return $this->entity->getThumbnail();
  }

  public function getEpisodeNumber(){
    return $this->data['episode'];
  }
  public function incrementViewCount(){
    $query = $this->conn->prepare("UPDATE videos SET views=views+1 WHERE id=:id;");
    $query->bindValue(":id",$this->getID());
    $query->execute();
  }
}