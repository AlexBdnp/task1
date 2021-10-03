<?php

class ModelCategory extends Model {
  
  public function getAllCategories()
  {
    return $this->query('SELECT c. *, COUNT(*) AS total_products FROM categories AS c LEFT JOIN products p ON (c.id = p.category_id) GROUP BY c.id');
  }

}
