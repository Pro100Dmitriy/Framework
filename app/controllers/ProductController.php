<?php

namespace app\controllers;
 
use \RedBeanPHP\R as R;

class ProductController extends AppController
{

  public function viewAction(){
    $slider = __METHOD__;

    $this->set( compact('slider') );

    $alias = $this->route['alias'];
    $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    if(!$product){
      throw new \Exception('Страница не найдена', 404);
    }
  }

}