<?php
namespace app\controllers;

use RedBeanPHP\R;

class SearchController extends AppController
{

  public function typeaheadAction()
  {
    if( $this->isAjax() ){
      $query = !empty( trim($_GET['query']) ) ? trim($_GET['query']) : null;
      //debug($query);
      if( $query ){
        $products = R::getAll("SELECT id, title FROM product WHERE title LIKE ? LIMIT 9", ["%{$query}%"]);
        echo json_encode($products);
      }
    }
    die;
  }

  public function indexAction()
  {
    //debug($_GET);
    $slider = __METHOD__;
    $query = !empty( trim($_GET['s']) ) ? trim($_GET['s']) : null;
    if($query){
      $products = R::find('product',"title LIKE ?",["%{$query}%"]);
    }

    $this->set( compact('slider', 'products') );
  }

}