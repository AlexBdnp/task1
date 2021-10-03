<?php

class ControllerCategory extends Controller {

  public function index() {
    $model_product = $this->model('product');
    $model_category = $this->model('category');
    $category_id = isset($_GET['id']) ? $_GET['id'] : null;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'price';

    $data['title'] = APPLICATION_NAME;
    $data['categories'] = $model_category->getAllCategories();
    $data['products'] = $model_product->getProductsFromCategory($category_id, $sort);
    $this->view('home', $data);
  }

  public function getProductsJson()
  {
    $model_product = $this->model('product');

    $category_id = isset($_GET['id']) ? $_GET['id'] : null;
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'price';

    $data['products'] = $model_product->getProductsFromCategory($category_id, $sort);
    echo json_encode($data['products']);
  }

}
