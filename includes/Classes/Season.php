<?php

class Season {
    private $seasonNumber;
    private array $seasonVideos ;
 function __construct($seasonNumber,$video){
     $this->seasonNumber = $seasonNumber;
     $this->seasonVideos = $video;
 }


 public function getSeasonNumber(){
    return $this->seasonNumber;
 }
 public function getSeasonVideos(){
    return $this->seasonVideos;
 }
}