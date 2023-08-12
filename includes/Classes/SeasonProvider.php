<?php

class SeasonProvider{

    private $con, $username;

function __construct(PDO $con, string $userName)
{
  $this->con = $con;
  $this->username = $userName;
}

}