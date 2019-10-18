<?php
namespace app\models;

use fw\core\App;

class Cart extends AppModel
{

  public function addToCart($product, $qty = 1, $mod = null)
  {
    
    if(!isset($_SESSION['cart.currency'])){
      $_SESSION['cart.currency'] = App::$app->getProperty('currency');
    }
    if($mod){
      $ID = "{$product->id}-{$mod->id}";
      $title = "{$product->title} ({$mod->title})"; 
      $price = $mod->price;
    }else{
      $ID = $product->id;
      $title = $product->title; 
      $price = $product->price;
    }
    //debug($_SESSION);
    //debug($ID);
    //debug($title);
    //debug($price);
    if(isset($_SESSION['cart'][$ID])){
      $_SESSION['cart'][$ID]['qty'] += $qty;
    }else{
      $_SESSION['cart'][$ID] = [
        'title' => $title,
        'qty' => $qty,
        'alias' => $product->alias,
        'price' => $price * $_SESSION['cart.currency']['value'],
        'img' => $product->img
      ];
    }
    $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
    $_SESSION['cart.summ'] = isset($_SESSION['cart.summ']) ? $_SESSION['cart.summ'] + $qty * $price * $_SESSION['cart.currency']['value'] : $qty * ($price * $_SESSION['cart.currency']['value']);

  }

}