<?php

class Categories
{
  private $con, $username;

  function __construct(PDO $con, string $userName)
  {
    $this->con = $con;
    $this->username = $userName;
  }


  public function showAllCategories(){
    $query = $this->con->prepare("SELECT * FROM categories;");
    $query->execute();

    $html = "<div class='preview-categories'>";

    while($categories = $query->fetch(PDO::FETCH_ASSOC)){
        $html .= $this->addCategoryHTML($categories,true,true);
    }

    return $html ."</div>";

  }
  public function addCategoryHTML( array $data,bool $tvshows,bool $movies,$title =null){
     $categoryId = $data['id'];
     $title = $title? $title: $data['name'];

     if($tvshows && $movies){
        $entities = EntityProvider::getEntities($this->con,$categoryId,30);

     } elseif ($tvshows){

     }else{

     }

     if(sizeof($entities)==0){
        return;
     }

     $entitiesHtml = '';
       $preview = new PreviewProvider($this->con,$this->username);
     foreach( $entities as $ent){
        $entitiesHtml .= $preview->createEntityCard($ent);
     }
     return "<div class='category'>
            <a href='categories.php?id=$categoryId'>
                <h3>$title</h3>
            </a>
          <div class='entities'>
            $entitiesHtml
          </div>
     </div>";

  }

  public function showCategories($categoryId,$title=null){
    $query = $this->con->prepare("SELECT * FROM categories WHERE id=:id;");
    $query->bindValue(":id",$categoryId); 
    $query->execute();

    $html = "<div class='season no-scroll'>";

    while($categories = $query->fetch(PDO::FETCH_ASSOC)){
        $html .= $this->addCategoryHTML($categories,true,true,$title);
    }

    return $html ."</div>";
  }


}