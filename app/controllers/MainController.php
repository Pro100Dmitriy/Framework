<?php

namespace app\controllers;
 
use \RedBeanPHP\R as R;

class MainController extends AppController
{

  public function indexAction(){

    $slider = __METHOD__;
    $brand = R::find('brand', "LIMIT 3");
    $hit = R::find('product', "hit = '1' AND status = '1' LIMIT 8");

    $this->set( compact('slider', 'brand', 'hit') ); // тут передётся контент в class Controller

  }

}