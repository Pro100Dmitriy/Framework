<?php

namespace app\controllers;

use app\models\Cart;
use \RedBeanPHP\R as R;

class CartController extends AppController
{

  public function viewAction()
  {
    //debug($_GET);
  }

  public function addAction()
  {
    //debug($_GET);
    
    $id = !empty($_GET['id']) ? (int) $_GET['id'] : null;
    $mod_id = !empty($_GET['mod']) ? (int) $_GET['mod'] : null;
    $qty = !empty($_GET['qty']) ? (int) $_GET['qty'] : nul;;
    $mod = null;

    if($id){
      $product = R::findOne('product', 'id = ?', [$id]);
      if(!$product) return false;
      if($mod_id){
        $mod = R::findOne('modification', 'id = ? AND product_id = ?', [$mod_id, $id]);
      }
      //debug($mod);
    }

    $cart = new Cart();
    $cart->addToCart($product, $qty, $mod);
    if( $this->isAjax() ){
      $this->laodView('cart_model');
    }
    redirect();

  }

  public function showAction()
  {
    $this->laodView('cart_model');
  }

  public function deleteAction()
  {
    $id = $_GET['id'];
    if( isset($_SESSION['cart'][$id]) ){
      $cart = new Cart();
      $cart->deleteItem($id);
    }
    if( $this->isAjax() ){
      $this->laodView('cart_model');
    }
    redirect();
  }

  public function clearAction()
  {
    unset( $_SESSION['cart'] );
    unset( $_SESSION['cart.summ'] );
    unset( $_SESSION['cart.qty'] );
    unset( $_SESSION['cart.currency'] );
    if( $this->isAjax() ){
      $this->laodView('cart_model');
    }
    redirect();
  }

  
}