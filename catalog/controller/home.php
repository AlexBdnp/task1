<?php

class ControllerHome extends Controller {

  public function index() {
    $controllerCategory = $this->controller('category');
    $controllerCategory->index();
  }

}