<?php

class EntityProvider{
  


  public static function getEntities($con,$catID,$limit){
      $query = "SELECT * FROM entities ";
      if($catID){
        $query = $query .= "WHERE categoryId=:categoryId ";
      }

      $query .= "ORDER BY RAND() LIMIT :limit ;";
      $query= $con->prepare($query);
      if($catID){
          $query->bindValue(':categoryId',$catID);
      }
      $query->bindValue(':limit',$limit,PDO::PARAM_INT);
      $query->execute();
     $result =[];

     while($row = $query->fetch(PDO::FETCH_ASSOC)){
          $result[]= new Entity($con,$row);
     }
    
    return $result;
  }
//  public static function getEntities($con,$catID,$limit){

  //  return ;
  //}

  

}