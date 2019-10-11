<?php

namespace app\controllers;

use \RedBeanPHP\R as R;

class ProductController extends AppController
{

  public function viewAction(){

    $slider = __METHOD__;
    $alias = $this->route['alias'];
    $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
    if(!$product){
      throw new \Exception('Страница не найдена', 404);
    }

    //debug($product);

    $this->setMeta( [$product->title, $product->description, $product->keywords] );


    $this->set( compact('slider', 'product') );

    //получаем хлебные крошки

    // получаем связаные товары

    //показать просмотренные товары, запись в куки запрошеного товара

    // полусить просмотренные товары

    // получить галерию

    // получение всех модификаций товаров

  }

  
}