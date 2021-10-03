<?php

abstract class Controller {
  
  public function __construct()
  {
    # code...
  }

  public function model($name) {
    $model = 'Model'.ucfirst($name);
    require_once(DIR_APPLICATION . 'model/' . $name . '.php');
    return new $model();
  }

  public function view($name, $data = ['title' => APPLICATION_NAME]) {
    require_once(DIR_APPLICATION . 'view/' . $name . '.php');
  }

  public function controller($name) {
    $controller = 'Controller'.ucfirst($name);    
    require_once(DIR_APPLICATION . 'controller/' . $name . '.php');
    return new $controller();
  }

}
