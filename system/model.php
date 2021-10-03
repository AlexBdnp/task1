<?php

abstract class Model {
  public $mysqli;

  function __construct() {
    $this->mysqli = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_PORT);
  }

  public function query($sql)
  {
    try {
      return $this->mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
    } 
    catch (\Throwable $th) {
      Page404::generate();
    } 
    
  }

}
