<?php

namespace app\controllers;

use app\models\Breadcrumbs;
use app\models\ProductModel;
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


    

    //получаем хлебные крошки
    $breadcrumbs = Breadcrumbs::getBreadcrubs($product->category_id, $product->title);

    // получаем связаные товары
    $related = R::getAll('SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?', [$product->id]);
    
    //показать просмотренные товары, запись в куки запрошеного товара
    $pro_model = new ProductModel();
    $pro_model->setRecentlyViewed($product->id);

    // полусить просмотренные товары
    $r_product = $pro_model->getRecentlyViewed();
    $recentlyViewed = null;
    if( $r_product ){
      $recentlyViewed = R::find('product', ' id IN ( '. R::genSlots( $r_product ) .' ) LIMIT 3', $r_product);
    }

    // получить галерию
    $gallery = R::findAll('gallery', 'product_id = ?', [$product->id]);
    
    // получение всех модификаций товаров
    $modification = R::findAll('modification','product_id = ?', [$product->id]);


    $this->set( compact('slider', 'product', 'gallery', 'related', 'recentlyViewed', 'breadcrumbs', 'modification') );

  }

  
}