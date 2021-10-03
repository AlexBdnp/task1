<?php

class ModelProduct extends Model {

  public function getProductsFromCategory($category_id, $sort = 'price') {
    $sql = 'SELECT * FROM products';

    if($category_id) {
      $sql .= ' WHERE category_id = ' . $category_id;
    }

    $sql .= ' ORDER BY ' . $sort;

    if ($sort == 'date') {
      $sql .= ' DESC';
    }
    else {
      $sql .= ' ASC';
    }

    return $this->query($sql);
  }

}
