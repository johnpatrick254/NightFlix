<?php

class Entity{
  private $conn, $data;

  function __construct(PDO $con,$input){
    $this->conn =$con;
    if(is_array($input)){
        $this->data = $input;
    }else{
        $query = $this->conn->prepare("SELECT * FROM entities WHERE id=:id;");
        $query->bindValue(":id",$input);
        $query->execute();
        $this->data = $query->fetch(PDO::FETCH_ASSOC);
    }

  }

  public function getId(){
    return $this->data['id'];
  }
  public function getName(){
    return $this->data['name'];
  }
  
  public function getThumbnail(){
    return $this->data['thumbnail'];
  }
  public function getPreview(){
    return $this->data['preview'];
  }

}