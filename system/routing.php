<?php

// URI with 'route' - e.g. http://aploid.com/index.php?route=category&id=1&sort=price
if (isset($_GET['route'])) {
  $route = $_GET['route'];
  $arr = explode('/', $route);
  $file = DIR_APPLICATION . 'controller/';
  $controller = 'Controller';

  while (count($arr) > 0) {
    $currentElement = array_shift($arr);
    $file .= $currentElement;
    $controller .= ucfirst($currentElement);

    if (file_exists($file . '.php')) {
      $file .= '.php';
      require_once($file);
      $instance = new $controller();
      if (count($arr) > 0) {
        $function = implode($arr);
        if (method_exists($instance, $function)) {
          $instance->$function();
          exit();
        } else {
          Page404::generate();
        }
      } else {
        $instance->index();
        exit();
      }
      break;
    } else {
      $file .= '/';
    }
  }
  Page404::generate();
}

// main page - http://aploid.com/ or http://aploid.com/index.php
if ($_SERVER['REQUEST_URI'] == ('/' || '/index.php')) {
  require_once(DIR_APPLICATION . 'controller/home.php');  
  $home = new ControllerHome();  
  $home->index();
  die();
}