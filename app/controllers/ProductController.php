<?php

namespace app\controllers;
 
use \RedBeanPHP\R as R;

class ProductController extends AppController
{

  public function viewAction(){
    $alias = $this->route['alias'];
    $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    debug($product);
  }

}